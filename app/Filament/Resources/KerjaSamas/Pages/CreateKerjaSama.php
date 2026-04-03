<?php

namespace App\Filament\Resources\KerjaSamas\Pages;

use App\Filament\Resources\KerjaSamas\KerjaSamaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKerjaSama extends CreateRecord
{
    protected static string $resource = KerjaSamaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data berhasil ditambahkan';
    }
}
