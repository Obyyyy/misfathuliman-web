<?php

namespace App\Filament\Resources\KerjaSamas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KerjaSamaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Mitra')
                    ->required()
                    ->maxLength(100),
                TextInput::make('deskripsi')
                    ->required()
                    ->maxLength(200),
                Select::make('label')
                    ->options(['Instansi Pemerintah' => 'Instansi Pemerintah', 'Perusahaan' => 'Perusahaan', 'Yayasan/Organisasi' => 'Yayasan/Organisasi', 'Lembaga Pendidikan' => 'Lembaga Pendidikan', 'Media/Komunikasi' => 'Media/Komunikasi', 'Layanan Kesehatan' => 'Layanan Kesehatan'])
                    ->label('Label Mitra')
                    ->required(),
                FileUpload::make('ikon_gambar')
                    ->image()
                    ->imagePreviewHeight(250)
                    ->disk('public')
                    ->directory('ikon_mitra')
                    ->visibility('public')
                    ->fetchFileInformation(false),
            ]);
    }
}