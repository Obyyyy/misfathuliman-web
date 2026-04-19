<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AdminBeritaTerbaruWidget extends TableWidget
{
    protected static ?int $sort = 5;
    protected int|string|array $columnSpan = 'full';
    protected static ?string $heading = 'Berita Terbaru';

    public static function canView(): bool
    {
        return Auth::user()->roles->pluck('name')
                ->intersect(['super_admin', 'admin', 'humas'])
                ->isNotEmpty();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Berita::orderByDesc('tanggal'))
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('kategoriBerita.judul')
                    ->label('Kategori')
                    ->badge(),
                TextColumn::make('user.name')
                    ->label('Penulis'),
                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('views')
                    ->label('Views')
                    ->numeric()
                    ->sortable(),
            ])
            ->paginated(5);
    }
}