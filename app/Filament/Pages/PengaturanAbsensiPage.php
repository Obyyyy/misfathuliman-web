<?php

namespace App\Filament\Pages;

use App\Models\PengaturanAbsensi;
use BackedEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class PengaturanAbsensiPage extends Page implements HasForms
{
    use InteractsWithForms;
    use HasPageShield;

    protected string $view = 'filament.pages.pengaturan-absensi';

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedClock;
    protected static ?string $navigationLabel = 'Pengaturan Jam Absensi';
    protected static ?string $title = 'Pengaturan Jam Absensi';
    protected static ?string $slug = 'pengaturan-absensi';
    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    public ?array $data = [];

    public function mount(): void
    {
        $pengaturan = PengaturanAbsensi::getPengaturan();

        $this->form->fill([
            'batas_hadir' => substr($pengaturan->batas_hadir, 0, 5),
            'jam_pulang_jumat' => substr($pengaturan->jam_pulang_jumat, 0, 5),
            'jam_pulang_sabtu' => substr($pengaturan->jam_pulang_sabtu, 0, 5),
            'jam_pulang_biasa' => substr($pengaturan->jam_pulang_biasa, 0, 5),
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
                TimePicker::make('batas_hadir')
                    ->label('Batas Hadir Masuk')
                    ->seconds(false)
                    ->required()
                    ->helperText(
                        'Lewat dari jam ini, status absensi menjadi Terlambat.'
                    ),

                TimePicker::make('jam_pulang_jumat')
                    ->label('Jam Batas Pulang Hari Jumat')
                    ->seconds(false)
                    ->required(),

                TimePicker::make('jam_pulang_sabtu')
                    ->label('Jam Batas Pulang Hari Sabtu')
                    ->seconds(false)
                    ->required(),

                TimePicker::make('jam_pulang_biasa')
                    ->label('Jam Batas Pulang Senin–Kamis')
                    ->seconds(false)
                    ->required(),
            ])
            ->statePath('data');
    }

    public function simpan(): void
    {
        $data = $this->form->getState();

        PengaturanAbsensi::getPengaturan()->update([
            'batas_hadir' => $data['batas_hadir'] . ':00',
            'jam_pulang_jumat' => $data['jam_pulang_jumat'] . ':00',
            'jam_pulang_sabtu' => $data['jam_pulang_sabtu'] . ':00',
            'jam_pulang_biasa' => $data['jam_pulang_biasa'] . ':00',
        ]);

        Notification::make()
            ->title('Pengaturan berhasil disimpan')
            ->success()
            ->send();
    }
}
