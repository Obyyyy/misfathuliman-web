<?php

namespace App\Filament\Resources\Absensis\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AbsensisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nama Pengguna')
                    ->searchable(),
                TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('waktu_masuk')
                    ->time()
                    ->sortable(),
                TextColumn::make('lat_masuk')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lng_masuk')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('waktu_pulang')
                    ->time()
                    ->sortable(),
                TextColumn::make('lat_pulang')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lng_pulang')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'hadir' => 'success',
                        // 'Perusahaan' => 'primary',
                        'terlambat' => 'warning',
                        'izin' => 'info',
                        'sakit' => 'gray',
                        'alpha' => 'danger',
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('tanggal')
                    ->form([
                        DatePicker::make('dari')
                            ->label('Dari Tanggal')
                            ->default(today()->startOfMonth())
                            ->native(false),
                        DatePicker::make('sampai')
                            ->label('Sampai Tanggal')
                            ->default(today())
                            ->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['dari'],
                                fn($q) => $q->whereDate('tanggal', '>=', $data['dari'])
                            )
                            ->when(
                                $data['sampai'],
                                fn($q) => $q->whereDate('tanggal', '<=', $data['sampai'])
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['dari']) {
                            $indicators[] = 'Dari: ' . Carbon::parse($data['dari'])->translatedFormat('d F Y');
                        }
                        if ($data['sampai']) {
                            $indicators[] = 'Sampai: ' . Carbon::parse($data['sampai'])->translatedFormat('d F Y');
                        }

                        return $indicators;
                    }),

                // Filter status
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'hadir'     => 'Hadir',
                        'terlambat' => 'Terlambat',
                        'izin'      => 'Izin',
                        'sakit'     => 'Sakit',
                        'alpha'     => 'Alpha',
                    ]),
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
