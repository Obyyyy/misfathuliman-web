<?php

namespace App\Filament\Widgets;

use App\Models\Absensi;
use App\Models\Berita;
use App\Models\User;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class AdminStatsWidget extends BaseWidget
{
    use HasWidgetShield;
    // protected string $view = 'filament.widgets.admin-stats-widget';
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'full';

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
    }

    protected function getStats(): array
    {
        $tanggal     = $this->tanggal ?: today()->toDateString();
        $totalGuru   = User::count();
        $sudahAbsen  = Absensi::where('tanggal', $tanggal)->whereNotNull('waktu_masuk')->count();
        $belumAbsen  = $totalGuru - $sudahAbsen;
        $terlambat   = Absensi::where('tanggal', $tanggal)->where('status', 'terlambat')->count();
        $totalBerita = Berita::count();
        $label       = \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y');

        return [
            Stat::make('Total Guru & Staf', $totalGuru)
                ->description('Terdaftar di sistem')
                ->icon('heroicon-o-user-group')
                ->color('primary'),

            Stat::make('Sudah Absen Masuk', $sudahAbsen)
                ->description($label)
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Belum Absen', $belumAbsen)
                ->description('Dari ' . $totalGuru . ' total guru')
                ->icon('heroicon-o-x-circle')
                ->color($belumAbsen > 0 ? 'danger' : 'success'),

            Stat::make('Terlambat', $terlambat)
                ->description('Masuk setelah jam 07:00')
                ->icon('heroicon-o-clock')
                ->color($terlambat > 0 ? 'warning' : 'success'),

            Stat::make('Total Berita', $totalBerita)
                ->description('Dipublikasikan')
                ->icon('heroicon-o-newspaper')
                ->color('info'),
        ];
    }
}