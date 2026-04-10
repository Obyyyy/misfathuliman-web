<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use UnitEnum;

class TahunAjaran extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Tahun Ajaran';
    protected string $view = 'filament.pages.tahun-ajaran';
    protected static string|UnitEnum|null $navigationGroup = 'Settings';

    // protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?int $navigationSort = 100; // ← angka besar = posisi bawah

    public string $tahun_ajaran = '';

    public function mount(): void
    {
        $this->tahun_ajaran = Setting::get('tahun_ajaran', '2025');

        $this->form->fill([
            'tahun_ajaran' => $this->tahun_ajaran,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tahun_ajaran')
                    ->label('Tahun Ajaran Aktif')
                    ->required()
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(2100),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Setting::set('tahun_ajaran', $data['tahun_ajaran']);

        Notification::make()
            ->title('Tahun ajaran berhasil diperbarui')
            ->success()
            ->send();
    }

    public function saveAction(): Action
{
    return Action::make('save')
        ->label('Simpan')
        ->requiresConfirmation()
        ->modalHeading('Konfirmasi Perubahan Tahun Ajaran')
        ->modalDescription('Apakah Anda yakin ingin mengubah tahun ajaran aktif? Perubahan ini akan mempengaruhi data siswa dan kelas yang ditampilkan.')
        ->modalSubmitActionLabel('Ya, Simpan')
        ->modalCancelActionLabel('Batal')
        ->action(function () {
            $data = $this->form->getState();
            Setting::set('tahun_ajaran', $data['tahun_ajaran']);

            Notification::make()
                ->title('Tahun ajaran berhasil diperbarui')
                ->success()
                ->send();
        });
}
}