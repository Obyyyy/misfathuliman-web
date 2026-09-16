<?php

namespace App\Filament\Resources\ProfilGurus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\RestoreAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ForceDeleteBulkAction;

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
                TextColumn::make('roles.name')
                    ->label('Role Akun')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'super_admin' => 'danger',
                        'admin'       => 'warning',
                        'guru_staf'        => 'info',
                        default       => 'gray',
                    })
                    ->separator(','),
                TextColumn::make('profilGuru.jabatan')
                    ->label('Jabatan')
                    ->badge(),
                TextColumn::make('profilGuru.nama_jabatan')
                    ->label('Nama Jabatan')
                    ->searchable(),
                TextColumn::make('profilGuru.no_hp')
                    ->label('No Hp')
                    ->searchable()
                    ->placeholder('-')
                    ->toggleable(isToggledHiddenByDefault: true),
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
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),

                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->toolbarActions([
                    BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }
}