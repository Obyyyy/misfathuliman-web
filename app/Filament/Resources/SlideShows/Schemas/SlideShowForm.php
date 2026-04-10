<?php

namespace App\Filament\Resources\SlideShows\Schemas;

use App\Models\Berita;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;


class SlideShowForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('berita_id')
                    ->label('Berita')
                    ->options(Berita::pluck('judul', 'id'))
                    ->searchable()
                    ->required(),
                TextInput::make('urutan')
                    ->label('Urutan Slideshow')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(10),
            ]);
    }
}
