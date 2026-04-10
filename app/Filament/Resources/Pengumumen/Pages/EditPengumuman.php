<?php

namespace App\Filament\Resources\Pengumumen\Pages;

use App\Filament\Resources\Pengumumen\PengumumanResource;
use App\Models\Pengumuman;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPengumuman extends EditRecord
{
    protected static string $resource = PengumumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    // Saat pengumuman diaktifkan, nonaktifkan yang lain
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['aktif']) {
            Pengumuman::where('aktif', true)
                ->where('id', '!=', $this->record->id)
                ->update(['aktif' => false]);
        }
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data berhasil diubah';
    }
}