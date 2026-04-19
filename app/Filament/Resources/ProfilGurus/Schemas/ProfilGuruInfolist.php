<?php

namespace App\Filament\Resources\ProfilGurus\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProfilGuruInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('User'),
                TextEntry::make('roles.name')
                    ->label('Role')
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'super_admin' => 'danger',
                        'admin'       => 'warning',
                        'guru_staf'        => 'info',
                        default       => 'gray',
                    }),
                // TextEntry::make('profilGuru.nip')
                //     ->label('NIP')
                //     ->placeholder('-'),
                TextEntry::make('profilGuru.pendidikan')
                    ->label('Pendidikan')
                    ->badge(),
                TextEntry::make('profilGuru.jabatan')
                    ->label('Jabatan')
                    ->badge(),
                TextEntry::make('profilGuru.nama_jabatan')
                    ->label('Nama Jabatan')
                    ->placeholder('-'),
                TextEntry::make('profilGuru.no_hp')
                    ->label('No HP')
                    ->placeholder('-'),
                // TextEntry::make('created_at')
                //     ->dateTime()
                //     ->placeholder('-'),
                // TextEntry::make('updated_at')
                //     ->dateTime()
                //     ->placeholder('-'),
            ]);
    }
}
