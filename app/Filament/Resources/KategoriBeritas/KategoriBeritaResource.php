<?php

namespace App\Filament\Resources\KategoriBeritas;

use App\Filament\Resources\KategoriBeritas\Pages\CreateKategoriBerita;
use App\Filament\Resources\KategoriBeritas\Pages\EditKategoriBerita;
use App\Filament\Resources\KategoriBeritas\Pages\ListKategoriBeritas;
use App\Filament\Resources\KategoriBeritas\Schemas\KategoriBeritaForm;
use App\Filament\Resources\KategoriBeritas\Tables\KategoriBeritasTable;
use App\Models\KategoriBerita;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class KategoriBeritaResource extends Resource
{
    protected static ?string $model = KategoriBerita::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;
    protected static string|UnitEnum|null $navigationGroup = 'Postingan Berita';
    protected static ?string $slug = 'kategori-berita';

    public static function form(Schema $schema): Schema
    {
        return KategoriBeritaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KategoriBeritasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKategoriBeritas::route('/'),
            'create' => CreateKategoriBerita::route('/create'),
            'edit' => EditKategoriBerita::route('/{record}/edit'),
        ];
    }
}