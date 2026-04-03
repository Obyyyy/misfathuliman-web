<?php

namespace App\Filament\Resources\KerjaSamas\Pages;

use App\Filament\Resources\KerjaSamas\KerjaSamaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKerjaSama extends EditRecord
{
    protected static string $resource = KerjaSamaResource::class;

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
