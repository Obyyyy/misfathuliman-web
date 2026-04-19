<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AdminBeritaTerbaruWidget;
use App\Filament\Widgets\AdminRekapAbsensiWidget;
use App\Filament\Widgets\AdminStatsWidget;
use App\Filament\Widgets\GuruStatusAbsensiWidget;
use App\Filament\Widgets\GuruWelcomeWidget;
use App\Filament\Widgets\TanggalFilterWidget;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Support\Facades\Auth;

class Dashboard extends BaseDashboard
{
    protected string $view = 'filament.pages.dashboard';
    protected static ?string $navigationLabel = 'Beranda';
    protected static ?string $title = 'Beranda';

    public function getWidgets(): array
    {
        $role = Auth::user()->roles->pluck('name');

        if ($role->intersect(['super_admin', 'admin'])->isNotEmpty()) {
            return [
                TanggalFilterWidget::class,
                AdminStatsWidget::class,
                AdminRekapAbsensiWidget::class,
                AdminBeritaTerbaruWidget::class,
            ];
        }

        if ($role->contains('humas')) {
            return [GuruWelcomeWidget::class];
        }

        return [
            GuruWelcomeWidget::class,
            GuruStatusAbsensiWidget::class,
        ];
    }

    public function getColumns(): int|array
    {
        $role = Auth::user()->roles->pluck('name');
        return $role->intersect(['super_admin', 'admin'])->isNotEmpty() ? 2 : 1;
    }
}
