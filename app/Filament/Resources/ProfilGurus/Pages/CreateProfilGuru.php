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

    protected function afterCreate(): void
    {
        $this->dispatch('close-modal', id: 'create-profil-guru');
    }

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $record = parent::handleRecordCreation($data);
        return $record;
    }
}