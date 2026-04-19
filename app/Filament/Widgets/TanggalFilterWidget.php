<?php

namespace App\Filament\Widgets;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class TanggalFilterWidget extends Widget
{
    // use InteractsWithForms;

    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';
    protected string $view = 'filament.widgets.tanggal-filter-widget';

    public string $tanggal = '';

    public static function canView(): bool
    {
        return Auth::user()->roles->pluck('name')
            ->intersect(['super_admin', 'admin'])
            ->isNotEmpty();
    }

    public function mount(): void
    {
        $this->tanggal = today()->toDateString();
    }

    public function updatedTanggal(): void
    {
        $this->dispatch('tanggalDiubah', tanggal: $this->tanggal);
    }
}
