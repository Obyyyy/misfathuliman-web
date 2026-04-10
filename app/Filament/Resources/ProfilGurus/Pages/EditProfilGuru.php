<?php

namespace App\Filament\Resources\ProfilGurus\Pages;

use App\Filament\Resources\ProfilGurus\ProfilGuruResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProfilGuru extends EditRecord
{
    protected static string $resource = ProfilGuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // ViewAction::make(),
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