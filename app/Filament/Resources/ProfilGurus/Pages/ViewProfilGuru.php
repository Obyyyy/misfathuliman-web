<?php

namespace App\Filament\Resources\ProfilGurus\Pages;

use App\Filament\Resources\ProfilGurus\ProfilGuruResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProfilGuru extends ViewRecord
{
    protected static string $resource = ProfilGuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
