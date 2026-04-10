<?php

namespace App\Filament\Resources\ProfilGurus\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class ProfilGuruForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Akun Login')
                ->schema([
                    TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),
                    TextInput::make('username')
                        ->label('Username')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->alphaDash() // hanya huruf, angka, dash, underscore
                        ->rule('min:4', 'max:50')
                        ->validationMessages([
                            'min' => 'Username minimal 4 karakter.',
                            'max' => 'Username maksimal 50 karakter.'
                        ])
                        ->helperText('Digunakan untuk login. Hanya huruf, angka, - dan _')
                        ->prefix('@'),
                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),
                    TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->revealable()
                        ->dehydrateStateUsing(fn($state) => Hash::make($state))
                        ->dehydrated(fn($state) => filled($state))
                        ->required(fn(string $operation) => $operation === 'create')
                        ->helperText('Kosongkan jika tidak ingin mengubah password'),
                    FileUpload::make('foto')
                        ->label('Foto Profil')
                        ->image()
                        ->imagePreviewHeight(150)
                        ->disk('public')
                        ->directory('foto_guru')
                        ->visibility('public')
                        ->fetchFileInformation(false)
                        ->nullable(),
                ])->columns(2),
            Section::make('Data Kepegawaian')
                ->relationship('profilGuru')
                ->schema([
                    TextInput::make('nip')
                        ->label('NIP')
                        ->maxLength(50)
                        ->unique(table: 'profil_guru', ignoreRecord: true)
                        ->nullable(),
                    Select::make('pendidikan')
                        ->label('Tingkat Pendidikan')
                        ->options([
                            'SMA/SMK/MA'  => 'SMA/SMK/MA',
                            'Diploma (D3)'          => 'Diploma (D3)',
                            'Sarjana (S1)'          => 'Sarjana (S1)',
                            'Magister (S2)'          => 'Magister (S2)',
                            'Doktor (S3)'          => 'Doktor (S3)',
                        ])
                        ->required(),
                    Select::make('jabatan')
                        ->label('Jabatan')
                        ->options([
                            'Kepala Madrasah'       => 'Kepala Madrasah',
                            'Wakil Kepala Madrasah' => 'Wakil Kepala Madrasah',
                            'Guru Kelas'            => 'Guru Kelas',
                            'Guru Mata Pelajaran'   => 'Guru Mata Pelajaran',
                            'Staf Tata Usaha'       => 'Staf Tata Usaha',
                        ])
                        ->required()
                        ->live(),
                    TextInput::make('nama_jabatan')
                        ->label('Detail Jabatan')
                        ->placeholder(fn($get) => match ($get('jabatan')) {
                            'Guru Kelas'          => 'Contoh: Wali Kelas 1A',
                            'Guru Mata Pelajaran' => 'Contoh: Guru PJOK',
                            'Staf Tata Usaha'     => 'Contoh: Bendahara',
                            default               => 'Contoh: Wakamad Kemahasiswaan',
                        })
                        ->nullable(),
                    TextInput::make('no_hp')
                        ->label('No. HP / WhatsApp')
                        ->tel()
                        ->nullable()
                        ->placeholder('08xxxxxxxxxx'),
                    ])->columns(2),
        ]);
    }
}