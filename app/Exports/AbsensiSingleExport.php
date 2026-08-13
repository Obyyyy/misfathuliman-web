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
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Format detail vertikal untuk export 1 guru/staf.
 * Kolom tabel: Tanggal | Hari | Status | Jam Masuk | Jam Pulang | Keterangan
 *
 * Layout mengikuti template manual:
 * - Info Tgl Print / Departemen / Tgl Absensi / Nama
 * - Ringkasan jumlah hari per status
 * - Tabel kehadiran harian (Minggu ditandai baris oranye)
 * - Footer tanda tangan Kepala Madrasah
 */
class AbsensiSingleExport implements FromCollection, WithTitle, ShouldAutoSize, WithEvents
{
    protected User       $user;
    protected Collection $absensiList;
    protected array      $tanggalList = [];
    protected ?User      $kepalaMadrasah = null;

    // Rekap jumlah hari per status, dihitung di constructor
    protected array $rekap = [
        'hadir'      => 0,
        'izin'       => 0,
        'sakit'      => 0,
        'cuti'       => 0,
        'tidak_hadir'=> 0,
        'terlambat'  => 0,
    ];

    public function __construct(
        protected int     $userId,
        protected ?string $bulan          = null,
        protected ?string $tahun          = null,
        protected ?string $tanggalMulai   = null,
        protected ?string $tanggalSelesai = null,
    ) {
        [$mulai, $selesai] = $this->rentangTanggal();

        // Sekarang SEMUA tanggal disertakan (termasuk Minggu),
        // karena Minggu ditampilkan sebagai baris libur di tabel.
        foreach (CarbonPeriod::create($mulai, $selesai) as $tgl) {
            $this->tanggalList[] = $tgl->copy();
        }

        $this->user = User::with('profilGuru')->findOrFail($userId);

        $this->absensiList = Absensi::where('user_id', $userId)
            ->whereBetween('tanggal', [$mulai->toDateString(), $selesai->toDateString()])
            ->get()
            ->keyBy(fn ($a) => $a->tanggal->toDateString());

        // Cari Kepala Madrasah dari profilGuru yang jabatannya "Kepala Madrasah"
        $this->kepalaMadrasah = User::with('profilGuru')
            ->whereHas('profilGuru', fn ($q) => $q->where('jabatan', 'Kepala Madrasah'))
            ->first();

        $this->hitungRekap();
    }

    protected function rentangTanggal(): array
    {
        if ($this->tanggalMulai && $this->tanggalSelesai) {
            return [
                Carbon::parse($this->tanggalMulai)->startOfDay(),
                Carbon::parse($this->tanggalSelesai)->endOfDay(),
            ];
        }

        $mulai = Carbon::create($this->tahun, $this->bulan, 1)->startOfMonth();
        return [$mulai, $mulai->copy()->endOfMonth()];
    }

    protected function judulPeriode(): string
    {
        if ($this->tanggalMulai && $this->tanggalSelesai) {
            return Carbon::parse($this->tanggalMulai)->format('d/m/Y')
                . ' - '
                . Carbon::parse($this->tanggalSelesai)->format('d/m/Y');
        }

        $mulai = Carbon::create($this->tahun, $this->bulan, 1)->startOfMonth();
        return $mulai->format('d/m/Y') . ' - ' . $mulai->copy()->endOfMonth()->format('d/m/Y');
    }

    /**
     * Hitung jumlah hari per status berdasarkan data absensi yang benar-benar
     * tercatat di database (bukan menebak dari tanggal yang kosong).
     */
    protected function hitungRekap(): void
    {
        foreach ($this->absensiList as $absensi) {
            $status = strtolower($absensi->status ?? '');
            $key    = str_replace(' ', '_', $status); // "tidak hadir" -> "tidak_hadir"

            if (array_key_exists($key, $this->rekap)) {
                $this->rekap[$key]++;
            }
        }
    }

    public function collection(): Collection
    {
        $rows = collect();

        foreach ($this->tanggalList as $tgl) {
            $absensi = $this->absensiList->get($tgl->toDateString());

            $rows->push([
                $tgl->translatedFormat('d F Y'),
                $tgl->translatedFormat('l'),
                $absensi ? ucfirst($absensi->status) : '-',
                $absensi?->waktu_masuk  ? Carbon::parse($absensi->waktu_masuk)->format('H:i')  : '-',
                $absensi?->waktu_pulang ? Carbon::parse($absensi->waktu_pulang)->format('H:i') : '-',
                $absensi?->keterangan ?? '-',
            ]);
        }

        return $rows;
    }

    public function title(): string
    {
        return 'Absensi ' . $this->user->name;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet   = $event->sheet->getDelegate();
                $profil  = $this->user->profilGuru;
                $nama    = $this->user->name;
                $jabatan = $profil?->jabatan ?? '-';

                $kepala     = $this->kepalaMadrasah;
                $namaKepala = $kepala?->name ?? '';
                $nipKepala  = $kepala?->profilGuru?->nip ?? null;

                $totalRow = count($this->tanggalList);

                // =============================================
                // SISIPKAN 10 BARIS HEADER DI ATAS DATA
                // (baris 1 spacer, 2-4 info, 5-7 rekap, 8 spacer, 9 judul, 10 header tabel)
                // =============================================
                $sheet->insertNewRowBefore(1, 10);

                $warnaBorder = '538DD5';
                $warnaMinggu = 'DA9694';

                // ---- Baris 1: spacer ----
                $sheet->getRowDimension(1)->setRowHeight(6);

                // ---- Baris 2: Tgl Print ----
                $sheet->setCellValue('A2', 'Tgl Print:');
                $sheet->setCellValue('B2', now()->translatedFormat('l, d F Y'));
                $sheet->mergeCells('B2:F2');
                $sheet->getStyle('A2')->getFont()->setBold(true);

                // ---- Baris 3: Departemen | Nama ----
                $sheet->setCellValue('A3', 'Departemen');
                $sheet->setCellValue('B3', 'MIS Fathul Iman');
                $sheet->mergeCells('B3:C3');
                $sheet->setCellValue('D3', 'Nama');
                $sheet->setCellValue('E3', $nama);
                $sheet->mergeCells('E3:F3');
                $sheet->getStyle('A3')->getFont()->setBold(true);
                $sheet->getStyle('D3')->getFont()->setBold(true);

                // ---- Baris 4: Tgl Absensi | Jabatan ----
                $sheet->setCellValue('A4', 'Tgl Absensi');
                $sheet->setCellValue('B4', $this->judulPeriode());
                $sheet->mergeCells('B4:C4');
                $sheet->setCellValue('D4', 'Jabatan');
                $sheet->setCellValue('E4', $jabatan);
                $sheet->mergeCells('E4:F4');
                $sheet->getStyle('A4')->getFont()->setBold(true);
                $sheet->getStyle('D4')->getFont()->setBold(true);

                $sheet->getStyle('A2:F4')->applyFromArray([
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                    'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => $warnaBorder]]],
                ]);

                // ---- Baris 5-6 (merge vertikal): header rekap ----
                $rekapHeaders = ['Kehadiran (Hari)', 'Izin (Hari)', 'Sakit (Hari)', 'Cuti (Hari)', 'Tidak Hadir (Hari)', 'Terlambat (Hari)'];
                foreach ($rekapHeaders as $i => $h) {
                    $col = chr(65 + $i); // A, B, C, D, E, F
                    $sheet->setCellValue("{$col}5", $h);
                    $sheet->mergeCells("{$col}5:{$col}6");
                }
                $sheet->getStyle('A5:F6')->applyFromArray([
                    'font'      => ['bold' => true, 'size' => 9],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER, 'wrapText' => true],
                    'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => $warnaBorder]]],
                ]);

                // ---- Baris 7: nilai rekap ----
                $rekapValues = [
                    $this->rekap['hadir'],
                    $this->rekap['izin'],
                    $this->rekap['sakit'],
                    $this->rekap['cuti'],
                    $this->rekap['tidak_hadir'],
                    $this->rekap['terlambat'],
                ];
                foreach ($rekapValues as $i => $v) {
                    $col = chr(65 + $i);
                    $sheet->setCellValue("{$col}7", $v);
                }
                $sheet->getStyle('A7:F7')->applyFromArray([
                    'font'      => ['bold' => true, 'size' => 11],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                    'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => $warnaBorder]]],
                ]);

                // ---- Baris 8: spacer ----
                $sheet->getRowDimension(8)->setRowHeight(6);

                // ---- Baris 9: judul tabel ----
                $sheet->setCellValue('A9', 'Tabel Kehadiran');
                $sheet->mergeCells('A9:F9');
                $sheet->getStyle('A9:F9')->applyFromArray([
                    'font'      => ['bold' => true, 'size' => 11],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                    'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => $warnaBorder]]],
                ]);

                // =============================================
                // BARIS 10: HEADER TABEL
                // =============================================
                $headerRow = 10;
                $dataStart = 11;
                $dataEnd   = 10 + $totalRow;

                $headers = ['Tanggal', 'Hari', 'Status', 'Jam Masuk', 'Jam Pulang', 'Keterangan'];
                foreach ($headers as $i => $h) {
                    $sheet->setCellValueByColumnAndRow($i + 1, $headerRow, $h);
                }
                $sheet->getStyle("A{$headerRow}:F{$headerRow}")->applyFromArray([
                    'font'      => ['bold' => true, 'color' => ['rgb' => '000000'], 'size' => 10],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                    'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => $warnaBorder]]],
                ]);
                $sheet->getRowDimension($headerRow)->setRowHeight(20);

                // =============================================
                // STYLE + ISI KHUSUS BARIS DATA
                // =============================================
                if ($totalRow > 0) {
                    $sheet->getStyle("A{$dataStart}:F{$dataEnd}")->applyFromArray([
                        'borders'   => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => $warnaBorder]]],
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                        'font'      => ['size' => 10, 'color' => ['rgb' => '000000']],
                    ]);

                    foreach ($this->tanggalList as $i => $tgl) {
                        $row = $dataStart + $i;

                        // Baris Minggu: gabung kolom Hari s.d. Keterangan jadi satu sel,
                        // fill DA9694 dengan font hitam
                        if ($tgl->isSunday()) {
                            $sheet->mergeCells("B{$row}:F{$row}");
                            $sheet->setCellValue("B{$row}", 'Minggu');
                            $sheet->getStyle("B{$row}:F{$row}")->applyFromArray([
                                'font' => ['color' => ['rgb' => '000000']],
                                'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => $warnaMinggu]],
                            ]);
                            continue;
                        }
                    }
                }

                // =============================================
                // FOOTER: Tanda Tangan Kepala Madrasah
                // =============================================
                $footerRow1 = $dataEnd + 2;
                $footerRow2 = $footerRow1 + 1;
                $namaRow    = $footerRow2 + 4;
                $nipRow     = $namaRow + 1;

                $sheet->setCellValue("D{$footerRow1}", 'Palangka Raya, ' . now()->translatedFormat('d F Y'));
                $sheet->mergeCells("D{$footerRow1}:F{$footerRow1}");
                $sheet->getStyle("D{$footerRow1}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $sheet->setCellValue("D{$footerRow2}", 'Kepala Madrasah,');
                $sheet->mergeCells("D{$footerRow2}:F{$footerRow2}");
                $sheet->getStyle("D{$footerRow2}")->applyFromArray([
                    'font'      => ['bold' => true],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                $sheet->setCellValue("D{$namaRow}", $namaKepala);
                $sheet->mergeCells("D{$namaRow}:F{$namaRow}");
                $sheet->getStyle("D{$namaRow}")->applyFromArray([
                    'font'      => ['bold' => true, 'underline' => true],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                ]);

                if ($nipKepala) {
                    $sheet->setCellValue("D{$nipRow}", 'NIP. ' . $nipKepala);
                    $sheet->mergeCells("D{$nipRow}:F{$nipRow}");
                    $sheet->getStyle("D{$nipRow}")->applyFromArray([
                        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                    ]);
                    $sheet->getStyle("D{$nipRow}")
                        ->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
                }

                // =============================================
                // LEBAR KOLOM
                // =============================================
                $sheet->getColumnDimension('A')->setWidth(14);
                $sheet->getColumnDimension('B')->setWidth(12);
                $sheet->getColumnDimension('C')->setWidth(13);
                $sheet->getColumnDimension('D')->setWidth(12);
                $sheet->getColumnDimension('E')->setWidth(12);
                $sheet->getColumnDimension('F')->setWidth(30);

                $sheet->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
                $sheet->getPageSetup()->setFitToWidth(1);
            },
        ];
    }
}
