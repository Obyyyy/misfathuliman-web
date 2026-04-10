<?php

namespace App\Filament\Resources\SlideShows;

use App\Filament\Resources\SlideShows\Pages\CreateSlideShow;
use App\Filament\Resources\SlideShows\Pages\EditSlideShow;
use App\Filament\Resources\SlideShows\Pages\ListSlideShows;
use App\Filament\Resources\SlideShows\Schemas\SlideShowForm;
use App\Filament\Resources\SlideShows\Tables\SlideShowsTable;
use App\Models\SlideShow;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SlideShowResource extends Resource
{
    protected static ?string $model = SlideShow::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBarsArrowDown;
    protected static string|UnitEnum|null $navigationGroup = 'Postingan Berita';
    protected static ?string $slug = 'slideshows';

    public static function form(Schema $schema): Schema
    {
        return SlideShowForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SlideShowsTable::configure($table);
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
            'index' => ListSlideShows::route('/'),
            'create' => CreateSlideShow::route('/create'),
            'edit' => EditSlideShow::route('/{record}/edit'),
        ];
    }
}