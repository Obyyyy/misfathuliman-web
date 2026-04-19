<?php

namespace App\Filament\Widgets;


use App\Models\Absensi;
use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AdminRekapAbsensiWidget extends TableWidget
{
    protected static ?int $sort = 4;
    protected int|string|array $columnSpan = 'full';
    protected static ?string $heading = 'Rekap Absensi Hari Ini';

    public static function canView(): bool
    {
        return Auth::user()->roles->pluck('name')
                ->intersect(['super_admin', 'admin'])
                ->isNotEmpty();
    }

    public string $tanggal = '';

    protected $listeners = ['tanggalDiubah' => 'updateTanggal'];

    public function mount(): void
    {
        $this->tanggal = today()->toDateString();
    }

    public function updateTanggal(string $tanggal): void
    {
        $this->tanggal = $tanggal;
        $this->resetTable();
    }

    protected function getTableHeading(): string
    {
        $label = $this->tanggal
            ? \Carbon\Carbon::parse($this->tanggal)->translatedFormat('l, d F Y')
            : 'Hari Ini';

        return 'Rekap Absensi — ' . $label;
    }

    public function table(Table $table): Table
    {
        $tanggal = $this->tanggal ?: today()->toDateString();

        return $table
            ->query(
                User::with([
                    'profilGuru',
                    'absensiTanggal' => fn($q) => $q->where('tanggal', $tanggal),
                ])
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('profilGuru.jabatan')
                    ->label('Jabatan')
                    ->badge(),
                TextColumn::make('absensiTanggal.waktu_masuk')
                    ->label('Masuk')
                    ->default('-')
                    ->formatStateUsing(fn($state) =>
                        $state !== '-' ? \Carbon\Carbon::parse($state)->format('H:i') : '-'
                    ),
                TextColumn::make('absensiTanggal.waktu_pulang')
                    ->label('Pulang')
                    ->default('-')
                    ->formatStateUsing(fn($state) =>
                        $state !== '-' ? \Carbon\Carbon::parse($state)->format('H:i') : '-'
                    ),
                TextColumn::make('absensiTanggal.status')
                    ->label('Status')
                    ->default('Belum Absen')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'hadir'       => 'success',
                        'terlambat'   => 'warning',
                        'izin'        => 'info',
                        'sakit'       => 'gray',
                        'Belum Absen' => 'danger',
                        default       => 'danger',
                    }),
            ])
            ->paginated(10);
    }
}
