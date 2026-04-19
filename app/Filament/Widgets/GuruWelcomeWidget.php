<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class GuruWelcomeWidget extends Widget
{
    protected static ?int $sort = 1;
    protected int|string|array $columnSpan = 'full';
    protected string $view = 'filament.widgets.guru-welcome-widget';

    public static function canView(): bool
    {
        return Auth::user()->roles->pluck('name')
                ->intersect(['super_admin', 'admin', 'guru_staf', 'humas'])
                ->isNotEmpty();
    }
}