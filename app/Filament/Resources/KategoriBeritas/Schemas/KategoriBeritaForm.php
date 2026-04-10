<?php

namespace App\Filament\Resources\KategoriBeritas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class KategoriBeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->live(onBlur: true) // ← generate slug saat pindah dari field judul
                    // ->live() // ← generate slug saat pindah dari field judul
                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                        if ($operation === 'create' or $operation === 'edit') { // ← hanya auto-generate saat create, bukan edit
                            $set('slug', Str::slug($state));
                        }
                    }),
                TextInput::make('slug')
                    ->required()
                    ->label('Slug Link')
                    ->unique(ignoreRecord: true)
                    ->disabled(),
            ]);
    }
}
