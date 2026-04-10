<?php

namespace App\Filament\Pages;

use App\Models\ProfilGuru;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;  // ← versi Anda
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditProfilByGuru extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Profil Saya';
    protected static ?int $navigationSort = 99;
    protected string $view = 'filament.pages.edit-profil-by-guru';

    public string $name     = '';
    public string $email    = '';
    public string $username    = '';
    public string $password = '';
    public mixed $foto      = null;

    public ?string $nip          = null;
    public ?string $pendidikan   = null;
    public ?string $jabatan      = null;
    public ?string $nama_jabatan = null;
    public ?string $no_hp        = null;

    public function mount(): void
    {
        $user   = Auth::user();
        $profil = $user->profilGuru;

        $this->name  = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->foto = $user->foto ? [$user->foto] : null;

        if ($profil) {
            $this->nip          = $profil->nip;
            $this->pendidikan   = $profil->pendidikan;
            $this->jabatan      = $profil->jabatan;
            $this->nama_jabatan = $profil->nama_jabatan;
            $this->no_hp        = $profil->no_hp;
        }
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Akun Login')
                ->schema([
                    TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required(),
                    TextInput::make('username')
                        ->label('Username')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->alphaDash()
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
                        ->required(),
                    TextInput::make('password')
                        ->label('Password Baru')
                        ->password()
                        ->revealable()
                        ->nullable()
                        ->helperText('Kosongkan jika tidak ingin mengubah password'),
                    TextInput::make('no_hp')
                        ->label('No. HP / WhatsApp')
                        ->tel()
                        ->nullable(),
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
                // ->description('Hubungi admin untuk mengubah jabatan.')
                ->schema([
                    TextInput::make('nip')
                        ->label('NIP')
                        ->disabled(),
                    TextInput::make('pendidikan')
                        ->label('Tingkat Pendidikan')
                        ->disabled(),
                    TextInput::make('jabatan')
                        ->label('Jabatan')
                        ->disabled(),
                    TextInput::make('nama_jabatan')
                        ->label('Detail Jabatan')
                        ->required()
                        ->placeholder(fn($get) => match ($get('jabatan')) {
                            'Guru Kelas'          => 'Contoh: Wali Kelas 1A',
                            'Guru Mata Pelajaran' => 'Contoh: Guru PJOK',
                            'Staf Tata Usaha'     => 'Contoh: Bendahara',
                            default               => 'Contoh: Wakamad Kemahasiswaan',
                        }),
                ])->columns(2),
        ]);
    }

    public function save(): void
    {
        $user = \App\Models\User::find(Auth::id());

        // Konversi array foto ke string path
        $foto = is_array($this->foto)
            ? ($this->foto[array_key_first($this->foto)] ?? null)
            : $this->foto;

        // Simpan file baru ke storage jika foto adalah TemporaryUploadedFile
        if ($foto instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {

            // Hapus foto lama dari storage sebelum simpan yang baru
            if ($user->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->foto)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->foto);
            }

            $foto = $foto->store('foto_guru', 'public');
        }

        $updateData = [
            'name'     => $this->name,
            'email'    => $this->email,
            'username' => $this->username,
            'foto'     => $foto,
        ];

        if (filled($this->password)) {
            $updateData['password'] = Hash::make($this->password);
        }

        $user->update($updateData);

        ProfilGuru::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'no_hp'        => $this->no_hp,
                'nama_jabatan' => $this->nama_jabatan,
            ]
        );

        $this->password = '';

        Notification::make()
            ->title('Profil berhasil diperbarui')
            ->success()
            ->send();

        $this->redirect(static::getUrl());
    }
}
