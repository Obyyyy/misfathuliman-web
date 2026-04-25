<?php

namespace App\Filament\Resources\Absensis\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AbsensiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Informasi Absensi')
                ->columnSpanFull()
                ->schema([
                    Select::make('user_id')
                        ->options(User::pluck('name', 'id'))
                        ->searchable()
                        ->label('Nama Guru/Staf')
                        ->required(),
                    DatePicker::make('tanggal')
                        ->label('Tanggal')
                        ->required(),
                    Select::make('status')
                        ->label('Status')
                        ->options([
                            'hadir'     => 'Hadir',
                            'terlambat' => 'Terlambat',
                            'izin'      => 'Izin',
                            'sakit'     => 'Sakit',
                            'alpha'     => 'Alpha',
                        ])
                        ->default('hadir')
                        ->required(),
                    Textarea::make('keterangan')
                        ->label('Keterangan')
                        ->columnSpanFull(),
                ]),

            Section::make('Absen Masuk')
                ->columns(2)
                ->schema([
                    TimePicker::make('waktu_masuk')
                        ->label('Jam Masuk')
                        ->seconds(false),
                    \Filament\Schemas\Components\View::make('filament.forms.components.lokasi-button-masuk'),
                    TextInput::make('lat_masuk')
                        ->label('Latitude Masuk')
                        ->numeric()
                        ->readOnly(),
                    TextInput::make('lng_masuk')
                        ->label('Longitude Masuk')
                        ->numeric()
                        ->readOnly(),
                ]),

            Section::make('Absen Pulang')
                ->columns(2)
                ->schema([
                    TimePicker::make('waktu_pulang')
                        ->label('Jam Pulang')
                        ->seconds(false),
                    \Filament\Schemas\Components\View::make('filament.forms.components.lokasi-button-pulang'),
                    TextInput::make('lat_pulang')
                        ->label('Latitude Pulang')
                        ->numeric()
                        ->readOnly(),
                    TextInput::make('lng_pulang')
                        ->label('Longitude Pulang')
                        ->numeric()
                        ->readOnly(),
                ]),
            ]);
    }
}