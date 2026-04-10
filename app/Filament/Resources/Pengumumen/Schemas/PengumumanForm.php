<?php

namespace App\Filament\Resources\Pengumumen\Schemas;

use App\Models\Berita;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PengumumanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('berita_id')
                    ->label('Berita')
                    ->options(Berita::pluck('judul', 'id'))
                    ->searchable()
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('aktif')
                    ->required(),
            ]);
    }
}