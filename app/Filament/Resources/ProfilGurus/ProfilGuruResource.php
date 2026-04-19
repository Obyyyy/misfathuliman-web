<?php

namespace App\Filament\Resources\ProfilGurus;

use App\Filament\Resources\ProfilGurus\Pages\CreateProfilGuru;
use App\Filament\Resources\ProfilGurus\Pages\EditProfilGuru;
use App\Filament\Resources\ProfilGurus\Pages\ListProfilGurus;
use App\Filament\Resources\ProfilGurus\Schemas\ProfilGuruForm;
use App\Filament\Resources\ProfilGurus\Schemas\ProfilGuruInfolist;
use App\Filament\Resources\ProfilGurus\Tables\ProfilGurusTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ProfilGuruResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedIdentification;
    protected static string|UnitEnum|null $navigationGroup = 'Guru & Staf';
    protected static ?string $slug = 'guru-staf';
    protected static ?string $navigationLabel = 'Data Guru';
    protected static ?string $breadcrumb = 'Data Guru';
    protected static ?string $modelLabel = 'Data Guru';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::role(['admin', 'guru_staf', 'super_admin'])->count();
    }

    public static function form(Schema $schema): Schema
    {
        return ProfilGuruForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProfilGuruInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilGurusTable::configure($table);
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
            'index' => ListProfilGurus::route('/'),
            'create' => CreateProfilGuru::route('/create'),
            // 'view' => ViewProfilGuru::route('/{record}'),
            'edit' => EditProfilGuru::route('/{record}/edit'),
        ];
    }
}
