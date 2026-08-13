<?php

namespace App\Exports;

use App\Models\Absensi;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AbsensiExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithTitle, ShouldAutoSize, WithEvents
{
    protected array      $tanggalList   = [];
    protected int        $jumlahTanggal = 0;
    protected int        $rowNumber     = 0;
    protected Collection $users;
    protected Collection $absensiMap;

    public function __construct(
        protected ?string $bulan,
        protected ?string $tahun,
        protected ?int    $userId            = null,
        protected ?string $tanggalMulai      = null,
        protected ?string $tanggalSelesai    = null,
        protected array   $kecualikanUserIds = [],
    ) {
        // Inisialisasi tanggalList di constructor agar headings() bisa
        // membaca daftar tanggal sebelum collection() dipanggil
        [$mulai, $selesai] = $this->rentangTanggal();
        foreach (CarbonPeriod::create($mulai, $selesai) as $tgl) {
            $this->tanggalList[] = $tgl->copy();
        }
        $this->jumlahTanggal = count($this->tanggalList);

        // Inisialisasi collection kosong agar map() tidak error sebelum collection() dipanggil
        $this->users      = collect();
        $this->absensiMap = collect();
    }

    protected function rentangTanggal(): array
    {
        if ($this->tanggalMulai && $this->tanggalSelesai) {
            $mulai   = Carbon::parse($this->tanggalMulai)->startOfDay();
            $selesai = Carbon::parse($this->tanggalSelesai)->endOfDay();
        } elseif ($this->bulan && $this->tahun) {
            $mulai   = Carbon::create($this->tahun, $this->bulan, 1)->startOfMonth();
            $selesai = $mulai->copy()->endOfMonth();
        } else {
            $mulai   = Carbon::now()->startOfMonth();
            $selesai = Carbon::now()->endOfMonth();
        }
        return [$mulai, $selesai];
    }

    protected function judulLaporan(): string
    {
        if ($this->tanggalMulai && $this->tanggalSelesai) {
            $mulai   = Carbon::parse($this->tanggalMulai)->translatedFormat('d F Y');
            $selesai = Carbon::parse($this->tanggalSelesai)->translatedFormat('d F Y');
            return $mulai . ' - ' . $selesai;
        }

        $bln = $this->bulan
            ? Carbon::create()->month((int) $this->bulan)->translatedFormat('F')
            : 'Semua Bulan';

        return 'Bulan ' . $bln . ' ' . ($this->tahun ?? date('Y'));
    }

    public function collection(): Collection
    {
        [$mulai, $selesai] = $this->rentangTanggal();

        $userQuery = User::with('profilGuru')
            ->whereHas('profilGuru')
            ->whereDoesntHave('roles', fn ($q) => $q->where('name', 'humas'))
            ->when(!empty($this->kecualikanUserIds), fn ($q) => $q->whereNotIn('id', $this->kecualikanUserIds))
            ->orderBy('name');

        if ($this->userId) {
            $userQuery->where('id', $this->userId);
        }

        $this->users = $userQuery->get();

        $absensiQuery = Absensi::query()
            ->whereBetween('tanggal', [$mulai->toDateString(), $selesai->toDateString()]);

        if ($this->userId) {
            $absensiQuery->where('user_id', $this->userId);
        }

        if (!empty($this->kecualikanUserIds)) {
            $absensiQuery->whereNotIn('user_id', $this->kecualikanUserIds);
        }

        $this->absensiMap = $absensiQuery->get()
            ->keyBy(fn ($a) => $a->user_id . '_' . $a->tanggal->toDateString());

        return $this->users;
    }

    /**
     * headings() menghasilkan baris sub-header (angka tanggal + kolom summary).
     * Karena tanggalList sudah diinisialisasi di constructor, ini selalu benar.
     */
    public function headings(): array
    {
        $row = ['NO', 'NAMA'];
        foreach ($this->tanggalList as $tgl) {
            $row[] = $tgl->format('j'); // angka tanggal: 13, 14, 15, ...
        }
        $row[] = 'Alpa';
        $row[] = 'Izin';
        $row[] = 'Sakit';
        $row[] = 'Cuti';
        $row[] = 'Jumlah Hadir';

        return [$row];
    }

    public function map($user): array
    {
        $this->rowNumber++;

        $alpa = $izin = $sakit = $cuti = $hadir = 0;
        $kolom = [];

        foreach ($this->tanggalList as $tgl) {
            // Hari Minggu: kosongkan sel, tidak dihitung ke keterangan apapun
            if ($tgl->isSunday()) {
                $kolom[] = '';
                continue;
            }

            $key     = $user->id . '_' . $tgl->toDateString();
            $absensi = $this->absensiMap->get($key);

            if (is_null($absensi)) {
                $kolom[] = '-';
                $alpa++;
            } else {
                switch (strtolower($absensi->status ?? '')) {
                    case 'hadir':
                    case 'terlambat':
                        $kolom[] = '✓';
                        $hadir++;
                        break;
                    case 'izin':
                        $kolom[] = 'i';
                        $izin++;
                        break;
                    case 'sakit':
                        $kolom[] = 's';
                        $sakit++;
                        break;
                    case 'cuti':
                        $kolom[] = 'c';
                        $cuti++;
                        break;
                    case 'alpa':
                        $kolom[] = 'a';
                        $alpa++;
                        break;
                    default:
                        $kolom[] = '?';
                }
            }
        }

        return array_merge(
            [$this->rowNumber, $user->name],
            $kolom,
            [
                $alpa  > 0 ? $alpa  : '-',
                $izin  > 0 ? $izin  : '-',
                $sakit > 0 ? $sakit : '-',
                $cuti  > 0 ? $cuti  : '-',
                $hadir > 0 ? $hadir : '-',
            ],
        );
    }

    public function styles(Worksheet $sheet): array
    {
        return []; // semua styling di AfterSheet
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $n     = $this->jumlahTanggal;

                // =============================================
                // DEFINISI KOLOM
                // A=NO, B=NAMA, C..C+n-1=tanggal, lalu summary
                // =============================================
                $colTanggalMulai = 3;              // C
                $colTanggalAkhir = 2 + $n;         // C + n - 1
                $colAlpa         = $colTanggalAkhir + 1;
                $colIzin         = $colAlpa + 1;
                $colSakit        = $colAlpa + 2;
                $colCuti         = $colAlpa + 3;
                $colJumlahHadir  = $colCuti + 1;
                $totalKolom      = $colJumlahHadir;

                $colLetter = fn (int $col) => \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col);

                // =============================================
                // SISIPKAN 2 BARIS DI ATAS (judul + header grup)
                // =============================================
                $sheet->insertNewRowBefore(1, 2);

                $totalBaris = 3 + count($this->users);

                // =============================================
                // BARIS 1: JUDUL LAPORAN
                // =============================================
                $sheet->setCellValue('A1', $this->judulLaporan());
                $sheet->mergeCells('A1:' . $colLetter($totalKolom) . '1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font'      => ['bold' => true, 'size' => 13, 'color' => ['rgb' => '166534']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                ]);
                $sheet->getRowDimension(1)->setRowHeight(26);

                // =============================================
                // BARIS 2: HEADER GRUP
                // =============================================
                $sheet->setCellValue('A2', 'NO');
                $sheet->setCellValue('B2', 'NAMA');
                $sheet->setCellValue($colLetter($colTanggalMulai) . '2', 'Tanggal');
                $sheet->setCellValue($colLetter($colAlpa) . '2', 'Keterangan');
                $sheet->setCellValue($colLetter($colJumlahHadir) . '2', 'Jumlah Hadir');

                // Merge header grup
                $sheet->mergeCells('A2:A3');
                $sheet->mergeCells('B2:B3');
                $sheet->mergeCells($colLetter($colTanggalMulai) . '2:' . $colLetter($colTanggalAkhir) . '2');
                $sheet->mergeCells($colLetter($colAlpa) . '2:' . $colLetter($colCuti) . '2');
                $sheet->mergeCells($colLetter($colJumlahHadir) . '2:' . $colLetter($colJumlahHadir) . '3');

                // Style baris 2 & 3 (header)
                $headerStyle = [
                    'font'      => ['bold' => true, 'color' => ['rgb' => 'FFFFFF'], 'size' => 10],
                    'fill'      => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '166534']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
                    'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => '4ADE80']]],
                ];
                $sheet->getStyle('A2:' . $colLetter($totalKolom) . '3')->applyFromArray($headerStyle);
                $sheet->getRowDimension(2)->setRowHeight(22);
                $sheet->getRowDimension(3)->setRowHeight(18);

                // =============================================
                // STYLE BARIS DATA (baris 4 ke bawah)
                // =============================================
                if (count($this->users) > 0) {
                    $dataRange = 'A4:' . $colLetter($totalKolom) . $totalBaris;

                    $sheet->getStyle($dataRange)->applyFromArray([
                        'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'D1D5DB']]],
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                        'font'      => ['size' => 10],
                    ]);

                    // Kolom Nama — rata kiri
                    $sheet->getStyle('B4:B' . $totalBaris)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

                    // Zebra stripe
                    for ($row = 4; $row <= $totalBaris; $row++) {
                        if ($row % 2 === 0) {
                            $sheet->getStyle('A' . $row . ':' . $colLetter($totalKolom) . $row)
                                ->getFill()->setFillType(Fill::FILL_SOLID)
                                ->getStartColor()->setRGB('F0FDF4');
                        }
                    }

                    // Kolom hari Minggu — latar merah muda
                    foreach ($this->tanggalList as $i => $tgl) {
                        if ($tgl->isSunday()) {
                            $col = $colLetter($colTanggalMulai + $i);
                            $sheet->getStyle($col . '3:' . $col . $totalBaris)
                                ->getFill()->setFillType(Fill::FILL_SOLID)
                                ->getStartColor()->setRGB('eb1c1c');
                        }
                    }

                    // Kolom Keterangan (Alpa–Cuti) — biru muda
                    $sheet->getStyle($colLetter($colAlpa) . '4:' . $colLetter($colCuti) . $totalBaris)
                        ->getFill()->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()->setRGB('EFF6FF');

                    // Kolom Jumlah Hadir — bold + hijau muda
                    $sheet->getStyle($colLetter($colJumlahHadir) . '4:' . $colLetter($colJumlahHadir) . $totalBaris)
                        ->applyFromArray([
                            'font' => ['bold' => true],
                            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'DCFCE7']],
                        ]);
                }

                // =============================================
                // LEBAR KOLOM
                // =============================================
                $sheet->getColumnDimension('A')->setWidth(5);
                $sheet->getColumnDimension('B')->setWidth(30);

                for ($i = 0; $i < $n; $i++) {
                    $sheet->getColumnDimension($colLetter($colTanggalMulai + $i))->setWidth(4.5);
                }

                foreach (range($colAlpa, $colCuti) as $c) {
                    $sheet->getColumnDimension($colLetter($c))->setWidth(6);
                }

                $sheet->getColumnDimension($colLetter($colJumlahHadir))->setWidth(13);

                $sheet->freezePane('C4');

                $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $sheet->getPageSetup()->setFitToWidth(1);
                $sheet->getPageSetup()->setFitToHeight(0);
            },
        ];
    }

    public function title(): string
    {
        return $this->judulLaporan();
    }
}
