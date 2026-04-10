<?php

namespace App\Filament\Resources\ProfilGurus\Pages;

use App\Filament\Resources\ProfilGurus\ProfilGuruResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfilGurus extends ListRecords
{
    protected static string $resource = ProfilGuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
