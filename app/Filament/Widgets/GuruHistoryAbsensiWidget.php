<?php

namespace App\Filament\Widgets;

use App\Models\Absensi;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GuruHistoryAbsensiWidget extends TableWidget
{
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'full';
    protected static ?string $heading = 'Riwayat Absensi Bulan Ini';

    public static function canView(): bool
    {
        return Auth::user()->roles->pluck('name')
            ->intersect(['super_admin', 'admin', 'guru_staf'])
            ->isNotEmpty();
    }

    protected function getTableHeading(): string
    {
        return 'Riwayat Absensi — ' . Carbon::now()->translatedFormat('F Y');
    }

    public function table(Table $table): Table
{
    $userId = Auth::user()->id;

    $awalBulan = Carbon::now()->startOfMonth();
    $hariIni = Carbon::now();

    // Ambil nama tabel langsung dari Model Absensi
    $namaTabel = (new Absensi)->getTable();

    /*
     * Buat daftar tanggal dari awal bulan sampai hari ini.
     * Hari Minggu tidak dimasukkan.
     */
    $tanggal = [];

    $periode = $awalBulan->copy();

    while ($periode->lte($hariIni)) {

        // 0 = Minggu
        if ($periode->dayOfWeek !== Carbon::SUNDAY) {
            $tanggal[] = $periode->toDateString();
        }

        $periode->addDay();
    }

    /*
     * Buat query daftar tanggal.
     */
    $tanggalQuery = null;

    foreach ($tanggal as $tgl) {

        $query = DB::query()
            ->selectRaw('? AS tanggal', [$tgl]);

        if ($tanggalQuery === null) {
            $tanggalQuery = $query;
        } else {
            $tanggalQuery->unionAll($query);
        }
    }

    /*
     * Gabungkan daftar tanggal dengan tabel absensi.
     *
     * LEFT JOIN:
     * - Jika ada data absensi -> ambil data tersebut
     * - Jika tidak ada data -> tanggal tetap ditampilkan
     */
    $query = DB::query()
    ->fromSub($tanggalQuery, 'daftar_tanggal')
    ->leftJoin($namaTabel . ' as absensi_data', function ($join) use ($userId) {
        $join->on(
            'absensi_data.tanggal',
            '=',
            'daftar_tanggal.tanggal'
        )
        ->where(
            'absensi_data.user_id',
            '=',
            $userId
        );
    })
    ->select([
        'daftar_tanggal.tanggal',
        'absensi_data.waktu_masuk',
        'absensi_data.waktu_pulang',
        'absensi_data.status',
        'absensi_data.keterangan',
    ])
    ->selectRaw("
        COALESCE(
            absensi_data.id,
            -CAST(
                DATE_FORMAT(
                    daftar_tanggal.tanggal,
                    '%Y%m%d'
                ) AS UNSIGNED
            )
        ) AS id
    ")
    ->orderByDesc('daftar_tanggal.tanggal');

    return $table
        ->query(
            Absensi::query()
            ->fromSub($query, 'absensi')
        )
        ->defaultSort('tanggal', 'desc')
        ->columns([
            TextColumn::make('no')
                ->label('No')
                ->rowIndex(),

            TextColumn::make('tanggal')
                ->label('Tanggal')
                ->formatStateUsing(
                    fn ($state) =>
                        Carbon::parse($state)->translatedFormat('l, d M Y')
                ),

            TextColumn::make('waktu_masuk')
                ->label('Masuk')
                ->default('-')
                ->formatStateUsing(
                    fn ($state) =>
                        blank($state) || $state === '-'
                            ? '-'
                            : Carbon::parse($state)->format('H:i')
                ),

            TextColumn::make('waktu_pulang')
                ->label('Pulang')
                ->default('-')
                ->formatStateUsing(
                    fn ($state) =>
                        blank($state) || $state === '-'
                            ? '-'
                            : Carbon::parse($state)->format('H:i')
                ),

            TextColumn::make('status')
                ->label('Status')
                ->default('Belum Absen')
                ->badge()
                ->formatStateUsing(fn ($state) => match ($state) {
                    'hadir'     => 'Hadir',
                    'terlambat' => 'Terlambat',
                    'izin'      => 'Izin',
                    'sakit'     => 'Sakit',
                    'alpa'      => 'Alpa',
                    default     => 'Belum Absen',
                })
                ->color(fn ($state) => match ($state) {
                    'hadir'     => 'success',
                    'terlambat' => 'warning',
                    'izin'      => 'info',
                    'sakit'     => 'gray',
                    'alpa'      => 'danger',
                    default     => 'danger',
                }),

            TextColumn::make('keterangan')
                ->label('Keterangan')
                ->default('-')
                ->limit(30),
        ])
        ->paginated([10, 20, 30])
        ->defaultPaginationPageOption(10);
}
}
