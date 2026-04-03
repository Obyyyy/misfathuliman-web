<?php

namespace App\Filament\Resources\KerjaSamas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Schemas\Components\Image;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KerjaSamasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable()
                    ->label('Nama Mitra'),
                TextColumn::make('deskripsi')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('label')
                    ->searchable()
                    ->label('Label Mitra')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Instansi Pemerintah' => 'success',
                        'Perusahaan' => 'primary',
                        'Yayasan/Organisasi' => 'warning',
                        'Lembaga Pendidikan' => 'info',
                        'Media/Komunikasi' => 'gray',
                        'Layanan Kesehatan' => 'danger',
                    }),
                ImageColumn::make('ikon_gambar')
                    ->circular()
                    ->label('Ikon Mitra')
                    ->disk('public'),
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
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}