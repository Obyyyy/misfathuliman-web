<?php

namespace App\Filament\Resources\KerjaSamas;

use App\Filament\Resources\KerjaSamas\Pages\CreateKerjaSama;
use App\Filament\Resources\KerjaSamas\Pages\EditKerjaSama;
use App\Filament\Resources\KerjaSamas\Pages\ListKerjaSamas;
use App\Filament\Resources\KerjaSamas\Schemas\KerjaSamaForm;
use App\Filament\Resources\KerjaSamas\Tables\KerjaSamasTable;
use App\Models\KerjaSama;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class KerjaSamaResource extends Resource
{
    protected static ?string $model = KerjaSama::class;

    protected static ?string $breadcrumb = 'Kerja Sama';
    protected static ?string $slug = 'kerja-sama';
    protected static ?string $navigationLabel = 'Kerja Sama';
    protected static string|UnitEnum|null $navigationGroup = 'Profil Sekolah';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice;

    public static function form(Schema $schema): Schema
    {
        return KerjaSamaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KerjaSamasTable::configure($table);
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
            'index' => ListKerjaSamas::route('/'),
            'create' => CreateKerjaSama::route('/create'),
            'edit' => EditKerjaSama::route('/{record}/edit'),
        ];
    }
}
