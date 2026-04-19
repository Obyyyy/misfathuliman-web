<?php

namespace App\Filament\Resources\VisiMisis\Pages;

use App\Filament\Resources\VisiMisis\VisiMisiResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EditVisiMisi extends EditRecord
{
    protected static string $resource = VisiMisiResource::class;

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

    // public function getTitle(): string
    // {
    //     $name = $this->record?->judul ?? '-';
    //     return 'Edit Data "' . ($name ? Str::limit($name, 30).'"' : '');
    // }

    // public function getBreadcrumbs(): array
    // {
    //     $name = $this->record?->judul ?? '—';
    //     return [
    //         route('filament.admin.resources.visi-misi.index') => 'Visi & Misi',
    //         Str::limit($name, 25),
    //         'Edit'
    //     ];
    // }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Data berhasil diubah';
    }

}