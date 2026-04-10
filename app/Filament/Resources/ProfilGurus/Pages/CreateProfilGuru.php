<?php

namespace App\Filament\Resources\ProfilGurus\Pages;

use App\Filament\Resources\ProfilGurus\ProfilGuruResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProfilGuru extends CreateRecord
{
    protected static string $resource = ProfilGuruResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data berhasil ditambahkan';
    }
}