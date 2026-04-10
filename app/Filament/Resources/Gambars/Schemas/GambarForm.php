<?php

namespace App\Filament\Resources\Gambars\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class GambarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('jenis')
                    ->options(['Foto Sekolah' => 'Foto Sekolah', 'Struktur Organisasi' => 'Struktur Organisasi', 'Logo Sekolah' => 'Logo Sekolah'])
                    ->required()
                    ->disabled(),
                FileUpload::make('gambar')
                    ->image()
                    ->imagePreviewHeight(250)
                    ->required()
                    ->disk('public')
                    ->directory('foto_sekolah')
                    ->visibility('public')
                    ->fetchFileInformation(false),
            ]);
    }
}