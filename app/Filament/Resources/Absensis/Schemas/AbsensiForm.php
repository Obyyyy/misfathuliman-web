<?php

namespace App\Filament\Resources\Absensis\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class AbsensiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    // ->relationship('user', 'name')
                    ->options(User::pluck('name', 'id'))
                    ->searchable()
                    ->label('Nama Guru/Staf')
                    ->required(),
                DatePicker::make('tanggal')
                    ->required(),
                TimePicker::make('waktu_masuk'),
                TextInput::make('lat_masuk')
                    ->numeric(),
                TextInput::make('lng_masuk')
                    ->numeric(),
                TimePicker::make('waktu_pulang'),
                TextInput::make('lat_pulang')
                    ->numeric(),
                TextInput::make('lng_pulang')
                    ->numeric(),
                Select::make('status')
                    ->options([
            'hadir' => 'Hadir',
            'terlambat' => 'Terlambat',
            'izin' => 'Izin',
            'sakit' => 'Sakit',
            'alpha' => 'Alpha',
        ])
                    ->default('hadir')
                    ->required(),
                Textarea::make('keterangan')
                    ->columnSpanFull(),
            ]);
    }
}
