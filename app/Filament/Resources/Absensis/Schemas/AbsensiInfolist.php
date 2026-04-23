<?php

namespace App\Filament\Resources\Absensis\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;

class AbsensiInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2) // grid 2 kolom
            ->components([

                // Baris 1 — full width
                Section::make('Informasi Absensi')
                    ->columnSpanFull() // paksa full width
                    ->columns(2)
                    ->schema([
                        TextEntry::make('user.name')
                            ->label('Nama Guru/Staf'),
                        TextEntry::make('tanggal')
                            ->label('Tanggal')
                            ->date('l, d F Y'),
                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn($state) => match ($state) {
                                'hadir'     => 'success',
                                'terlambat' => 'warning',
                                'izin'      => 'info',
                                'sakit'     => 'gray',
                                'alpha'     => 'danger',
                                default     => 'gray',
                            }),
                        TextEntry::make('keterangan')
                            ->label('Keterangan')
                            ->placeholder('-'),
                    ]),

                // Baris 2 — masing-masing 1 kolom (sejajar)
                Section::make('Absen Masuk')
                    ->schema([
                        TextEntry::make('waktu_masuk')
                            ->label('Jam Masuk')
                            ->placeholder('-')
                            ->formatStateUsing(fn($state) =>
                                $state ? \Carbon\Carbon::parse($state)->format('H:i') : '-'
                            ),
                        TextEntry::make('lokasi_masuk')
                            ->label('Koordinat Masuk')
                            ->placeholder('-')
                            ->state(fn($record) =>
                                $record->lat_masuk && $record->lng_masuk
                                    ? number_format($record->lat_masuk, 6) . ', ' . number_format($record->lng_masuk, 6)
                                    : '-'
                            ),
                        View::make('filament.infolists.components.peta-masuk')
                            ->visible(fn($record) => $record->lat_masuk && $record->lng_masuk),
                    ]),

                Section::make('Absen Pulang')
                    ->schema([
                        TextEntry::make('waktu_pulang')
                            ->label('Jam Pulang')
                            ->placeholder('-')
                            ->formatStateUsing(fn($state) =>
                                $state ? \Carbon\Carbon::parse($state)->format('H:i') : '-'
                            ),
                        TextEntry::make('lokasi_pulang')
                            ->label('Koordinat Pulang')
                            ->placeholder('-')
                            ->state(fn($record) =>
                                $record->lat_pulang && $record->lng_pulang
                                    ? number_format($record->lat_pulang, 6) . ', ' . number_format($record->lng_pulang, 6)
                                    : '-'
                            ),
                        View::make('filament.infolists.components.peta-pulang')
                            ->visible(fn($record) => $record->lat_pulang && $record->lng_pulang),
                    ]),

            ]);
    }
}
