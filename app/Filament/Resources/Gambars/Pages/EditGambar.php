<?php

namespace App\Filament\Resources\Gambars\Pages;

use App\Filament\Resources\Gambars\GambarResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGambar extends EditRecord
{
    protected static string $resource = GambarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
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