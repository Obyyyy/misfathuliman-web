<?php

namespace App\Filament\Resources\KategoriBeritas\Pages;

use App\Filament\Resources\KategoriBeritas\KategoriBeritaResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateKategoriBerita extends CreateRecord
{
    protected static string $resource = KategoriBeritaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['judul']);
        }
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data berhasil ditambahkan';
    }
}
