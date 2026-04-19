<?php

namespace App\Filament\Resources\VisiMisis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VisiMisiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('jenis')
                    ->options(['Visi' => 'Visi', 'Misi' => 'Misi', 'Tujuan' => 'Tujuan'])
                    ->required(),
                TextInput::make('judul')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
