<?php

namespace App\Filament\Resources\Beritas\Schemas;

use App\Models\KategoriBerita;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->label('Judul Berita')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    )
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->required()
                    ->label('Slug Link')
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),
                Select::make('kategori_id')
                    ->label('Kategori Berita')
                    ->options(KategoriBerita::pluck('judul', 'id'))
                    ->searchable()
                    ->required(),
                DatePicker::make('tanggal')
                    ->required()
                    ->default(now()),
                FileUpload::make('thumbnail')
                    ->image()
                    ->imagePreviewHeight(250)
                    ->label('Foto Thumbnail')
                    ->disk('public')
                    ->directory('berita')
                    ->visibility('public')
                    ->fetchFileInformation(false)
                    ->afterStateHydrated(function ($component, $state) {
                        if ($state) {
                            $component->state([$state]);
                        }
                    }),
                    // ->imageResizeMode('cover'),
                    // ->imageCropAspectRatio('16:9'),
                RichEditor::make('konten')
                    ->required()
                    ->label('Konten Berita')
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('berita/konten'),
                // Section::make('Pengaturan Tampilan')
                // ->schema([
                //     Toggle::make('is_popup')
                //         ->label('Tampilkan sebagai Popup Pengumuman')
                //         ->helperText('Popup akan muncul saat pengunjung pertama membuka website')
                //         ->live(),
                //     DatePicker::make('popup_sampai')
                //         ->label('Tampilkan Popup Sampai Tanggal')
                //         ->helperText('Kosongkan jika tidak ada batas waktu')
                //         ->visible(fn ($get) => $get('is_popup')),
                //     Toggle::make('is_slide')
                //         ->label('Tampilkan di Hero Slideshow')
                //         ->helperText('Berita akan muncul di slideshow halaman utama')
                //         ->live(),
                //     TextInput::make('slide_urutan')
                //         ->label('Urutan Slide')
                //         ->numeric()
                //         ->visible(fn ($get) => $get('is_slide')),
                // ])->columns(2),
            ]);
    }
}
