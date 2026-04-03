<?php

namespace App\Filament\Resources\KerjaSamas\Pages;

use App\Filament\Resources\KerjaSamas\KerjaSamaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKerjaSamas extends ListRecords
{
    protected static string $resource = KerjaSamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
