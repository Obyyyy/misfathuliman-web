<?php

namespace App\Exports;

use App\Models\Absensi;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AbsensiExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithColumnFormatting, WithTitle, ShouldAutoSize
{
    public function __construct(
        protected ?string $bulan,
        protected ?string $tahun,
        protected ?int    $userId         = null,
        protected ?string $tanggalMulai   = null,
        protected ?string $tanggalSelesai = null,
    ) {}

    public function query()
    {
        $query = Absensi::query()->with(['user.profilGuru']);

        if ($this->tanggalMulai && $this->tanggalSelesai) {
            $query->whereBetween('tanggal', [$this->tanggalMulai, $this->tanggalSelesai]);
        } elseif ($this->bulan && $this->tahun) {
            $query->whereMonth('tanggal', (int) $this->bulan)
                  ->whereYear('tanggal', (int) $this->tahun);
        }

        if ($this->userId) {
            $query->where('user_id', $this->userId);
        }

        return $query->orderBy('tanggal')->orderBy('user_id');
    }

    public function headings(): array
    {
        return [
            'No',          // A
            'Nama',        // B
            'NIP',         // C  ← format teks agar tidak jadi notasi ilmiah
            'Jabatan',     // D
            'Tanggal',     // E
            'Hari',        // F
            'Jam Masuk',   // G
            'Jam Pulang',  // H
            'Status',      // I
            'Keterangan',  // J
        ];
    }

    protected int $rowNumber = 0;

    public function map($row): array
    {
        $this->rowNumber++;

        // Jabatan dari relasi profilGuru
        // Sesuaikan nama kolom jika berbeda di tabel profil_guru
        $jabatan = $row->user?->profilGuru?->jabatan ?? '-';

        // Nama hari dalam Bahasa Indonesia
        $hari = $row->tanggal
            ? Carbon::parse($row->tanggal)->translatedFormat('l')
            : '-';

        return [
            $this->rowNumber,                           // A - No
            $row->user?->name            ?? '-',        // B - Nama
            $row->user?->profilGuru->nip             ?? '-',        // C - NIP (diformat teks via columnFormats)
            $jabatan,                                   // D - Jabatan
            $row->tanggal?->format('d/m/Y') ?? '-',    // E - Tanggal
            $hari,                                      // F - Hari
            $row->waktu_masuk            ?? '-',        // G - Jam Masuk
            $row->waktu_pulang           ?? '-',        // H - Jam Pulang
            ucfirst($row->status         ?? '-'),       // I - Status
            $row->keterangan             ?? '-',        // J - Keterangan
        ];
    }


    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER,
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            // Baris header: bold, teks putih, background hijau tua
            1 => [
                'font'      => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill'      => ['fillType' => 'solid', 'startColor' => ['rgb' => '166534']],
                'alignment' => ['horizontal' => 'center'],
            ],
            // Kolom C (NIP): format teks + rata kiri
            'C' => [
                'numberFormat' => ['formatCode' => NumberFormat::FORMAT_NUMBER],
                'alignment'    => ['horizontal' => 'left'],
            ],
        ];
    }

    public function title(): string
    {
        if ($this->tanggalMulai && $this->tanggalSelesai) {
            $mulai   = Carbon::parse($this->tanggalMulai)->translatedFormat('d F Y');
            $selesai = Carbon::parse($this->tanggalSelesai)->translatedFormat('d F Y');
            return 'Absensi ' . $mulai . ' - ' . $selesai;
        }

        $bln = $this->bulan
            ? Carbon::create()->month((int) $this->bulan)->translatedFormat('F')
            : 'Semua';

        return 'Absensi ' . $bln . ' ' . ($this->tahun ?? date('Y'));
    }
}
