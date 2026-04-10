<?php

namespace App\Filament\Resources\ProfilGurus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProfilGurusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(fn($record) => $record->fotoUrl()),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('username')
                    ->label('Username')
                    ->searchable()
                    ->copyable(), // klik untuk copy
                    // ->prefix('@'),
                // TextColumn::make('profilGuru.nip')
                //     ->label('NIP')
                //     ->searchable(),
                // TextColumn::make('profilGuru.pendidikan')
                //     ->label('Pendidikan')
                //     ->badge(),
                TextColumn::make('profilGuru.jabatan')
                    ->label('Jabatan')
                    ->badge(),
                TextColumn::make('profilGuru.nama_jabatan')
                    ->label('Nama Jabatan')
                    ->searchable(),
                TextColumn::make('profilGuru.no_hp')
                    ->label('No Hp')
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
