<?php

namespace App\Filament\Resources\VisiMisis;

use App\Filament\Resources\VisiMisis\Pages\CreateVisiMisi;
use App\Filament\Resources\VisiMisis\Pages\EditVisiMisi;
use App\Filament\Resources\VisiMisis\Pages\ListVisiMisis;
use App\Filament\Resources\VisiMisis\Schemas\VisiMisiForm;
use App\Filament\Resources\VisiMisis\Tables\VisiMisisTable;
use App\Models\VisiMisi;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VisiMisiResource extends Resource
{
    protected static ?string $model = VisiMisi::class;
    // protected static bool $shouldRegisterNavigation = true;
    // protected static ?string $modelLabel = 'Visi & Misi';
    // protected static ?string $pluralModelLabel = 'Visi & Misi';
    protected static ?string $breadcrumb = 'Visi & Misi';

    protected static ?string $slug = 'visi-misi';
    protected static ?string $navigationLabel = 'Visi & Misi';
    protected static string|UnitEnum|null $navigationGroup = 'Profil Sekolah';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCheckBadge;

    // protected ?string $heading = 'Custom Page Heading';
    // protected ?string $subheading = 'Berikut daftar Visi dan Misi';

    // public static function getRecordTitleAttribute(): ?string
    // {
    //     return 'judul';
    // }


    public static function form(Schema $schema): Schema
    {
        return VisiMisiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VisiMisisTable::configure($table);
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
            'index' => ListVisiMisis::route('/'),
            'create' => CreateVisiMisi::route('/create'),
            'edit' => EditVisiMisi::route('/{record}/edit'),
        ];
    }
}
