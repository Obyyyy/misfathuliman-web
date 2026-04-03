<?php

namespace App\Filament\Resources\Gambars\Pages;

use App\Filament\Resources\Gambars\GambarResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGambar extends CreateRecord
{
    protected static string $resource = GambarResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data berhasil ditambahkan';
    }
}
