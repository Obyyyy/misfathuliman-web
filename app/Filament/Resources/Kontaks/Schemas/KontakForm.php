<?php

namespace App\Filament\Resources\Kontaks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KontakForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->disabled(),
                TextInput::make('value')
                    ->label('Nilai')
                    ->required(),
            ]);
    }
}
