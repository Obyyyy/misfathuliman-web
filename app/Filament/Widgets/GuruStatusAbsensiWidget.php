<?php

namespace App\Filament\Widgets;

use App\Models\Absensi;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class GuruStatusAbsensiWidget extends Widget
{
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';
    protected string $view = 'filament.widgets.guru-status-absensi-widget';

    public static function canView(): bool
    {
        return Auth::user()->roles->pluck('name')
                ->intersect(['super_admin', 'admin', 'guru_staf'])
                ->isNotEmpty();
    }

    public function getAbsensiHariIni(): ?Absensi
    {
        return Absensi::hariIni(Auth::user()->id);
    }
}
