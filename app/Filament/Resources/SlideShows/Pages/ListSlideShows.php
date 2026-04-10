<?php

namespace App\Filament\Resources\SlideShows\Pages;

use App\Filament\Resources\SlideShows\SlideShowResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSlideShows extends ListRecords
{
    protected static string $resource = SlideShowResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
