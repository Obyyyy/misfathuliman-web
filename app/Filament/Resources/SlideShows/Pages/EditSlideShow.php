<?php

namespace App\Filament\Resources\SlideShows\Pages;

use App\Filament\Resources\SlideShows\SlideShowResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSlideShow extends EditRecord
{
    protected static string $resource = SlideShowResource::class;

    protected function getHeaderActions(): array
    {
        return [
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
