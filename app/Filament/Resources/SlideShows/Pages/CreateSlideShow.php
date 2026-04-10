<?php

namespace App\Filament\Resources\SlideShows\Pages;

use App\Filament\Resources\SlideShows\SlideShowResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSlideShow extends CreateRecord
{
    protected static string $resource = SlideShowResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data berhasil ditambahkan';
    }
}
