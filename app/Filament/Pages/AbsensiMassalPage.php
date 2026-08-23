<?php

namespace App\Filament\Pages;

use App\Models\Absensi;
use App\Models\User;
use BackedEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class AbsensiMassalPage extends Page
{
    use InteractsWithForms;
    use HasPageShield;

    protected string $view = 'filament.pages.absensi-massal';

    protected static string|BackedEnum|null $navigationIcon  = 'heroicon-o-user-group';
    protected static string|UnitEnum|null   $navigationGroup = 'Guru & Staf';
    protected static ?string $navigationLabel = 'Absensi Massal';
    protected static ?string $title           = 'Absensi Massal';
    protected static ?string $slug            = 'absensi-massal';

    /**
     * @var array<string, mixed>
     */
    public array $data = [];

    /**
     * Batasi akses halaman ini hanya untuk Admin.
     * Jika role Anda hanya "admin" (tanpa super_admin), tinggal hapus 'super_admin' di array ini.
     */
    // public static function canAccess(): bool
    // {
    //     return Auth::user()?->hasAnyRole(['super_admin', 'admin']) ?? false;
    // }

    public function mount(): void
    {
        $this->form->fill([
            'status'          => 'hadir',
            'skip_minggu'     => true,
            'timpa_data_lama' => false,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Pilih Guru/Staf & Rentang Tanggal')
                    ->columns(2)
                    ->schema([
                        Select::make('user_ids')
                            ->label('Nama Guru/Staf')
                            ->helperText('Bisa pilih lebih dari satu.')
                            ->options(User::query()->orderBy('name')->pluck('name', 'id'))
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpanFull(),

                        DatePicker::make('tanggal_mulai')
                            ->label('Tanggal Mulai')
                            ->displayFormat('d/m/Y')
                            ->native(false)
                            ->required(),

                        DatePicker::make('tanggal_selesai')
                            ->label('Tanggal Selesai')
                            ->displayFormat('d/m/Y')
                            ->native(false)
                            ->required()
                            ->minDate(fn ($get) => $get('tanggal_mulai')),

                        Toggle::make('skip_minggu')
                            ->label('Lewati Hari Minggu')
                            ->helperText('Jika aktif, tanggal yang jatuh pada hari Minggu tidak akan diisi.')
                            ->default(true)
                            ->columnSpanFull(),
                    ]),

                Section::make('Data Absensi yang Akan Diisi')
                    ->description('Data ini akan diterapkan ke semua guru/staf dan semua tanggal yang dipilih di atas.')
                    ->columns(2)
                    ->schema([
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
                            ->required()
                            ->live()
                            ->columnSpanFull(),

                        TimePicker::make('waktu_masuk')
                            ->label('Jam Masuk')
                            ->required()
                            ->seconds(false)
                            ->visible(fn ($get) => in_array($get('status'), ['hadir', 'terlambat'])),

                        TimePicker::make('waktu_pulang')
                            ->label('Jam Pulang')
                            ->required()
                            ->seconds(false)
                            ->visible(fn ($get) => in_array($get('status'), ['hadir', 'terlambat'])),

                        Textarea::make('keterangan')
                            ->label('Keterangan')
                            ->columnSpanFull(),

                        Toggle::make('timpa_data_lama')
                            ->label('Timpa data yang sudah ada')
                            ->helperText('Jika aktif, absensi yang sudah tercatat pada tanggal & guru yang sama akan DIGANTI. Jika tidak aktif, tanggal yang sudah ada datanya akan dilewati (tidak diubah).')
                            ->default(false)
                            ->columnSpanFull(),
                    ]),
            ])
            ->statePath('data');
    }

    public function simpanAction(): Action
    {
        return Action::make('simpan')
            ->label('Simpan Absensi Massal')
            ->icon('heroicon-o-check-circle')
            ->color('success')
            ->requiresConfirmation()
            ->action(function () {
                $data = $this->form->getState();

                $userIds        = $data['user_ids'] ?? [];
                $tanggalMulai   = Carbon::parse($data['tanggal_mulai'])->startOfDay();
                $tanggalSelesai = Carbon::parse($data['tanggal_selesai'])->startOfDay();
                $skipMinggu     = (bool) ($data['skip_minggu'] ?? true);
                $timpaDataLama  = (bool) ($data['timpa_data_lama'] ?? false);

                $status      = $data['status'];
                $bisaJam     = in_array($status, ['hadir', 'terlambat']);
                $waktuMasuk  = $bisaJam ? ($data['waktu_masuk'] ?? null) : null;
                $waktuPulang = $bisaJam ? ($data['waktu_pulang'] ?? null) : null;
                $keterangan  = $data['keterangan'] ?? null;

                if (empty($userIds)) {
                    Notification::make()
                        ->title('Pilih minimal satu guru/staf terlebih dahulu')
                        ->danger()
                        ->send();

                    return;
                }

                $totalDiisi    = 0;
                $totalDilewati = 0;

                foreach (CarbonPeriod::create($tanggalMulai, $tanggalSelesai) as $tanggal) {
                    if ($skipMinggu && $tanggal->isSunday()) {
                        continue;
                    }

                    foreach ($userIds as $userId) {
                        $payload = [
                            'status'       => $status,
                            'waktu_masuk'  => $waktuMasuk,
                            'waktu_pulang' => $waktuPulang,
                            'keterangan'   => $keterangan,
                        ];

                        if ($timpaDataLama) {
                            Absensi::updateOrCreate(
                                [
                                    'user_id' => $userId,
                                    'tanggal' => $tanggal->toDateString(),
                                ],
                                $payload
                            );
                            $totalDiisi++;
                            continue;
                        }

                        $sudahAda = Absensi::where('user_id', $userId)
                            ->where('tanggal', $tanggal->toDateString())
                            ->exists();

                        if ($sudahAda) {
                            $totalDilewati++;
                            continue;
                        }

                        Absensi::create(array_merge($payload, [
                            'user_id' => $userId,
                            'tanggal' => $tanggal->toDateString(),
                        ]));
                        $totalDiisi++;
                    }
                }

                $pesan = "{$totalDiisi} data absensi berhasil disimpan.";
                if ($totalDilewati > 0) {
                    $pesan .= " {$totalDilewati} data dilewati karena sudah ada dan opsi \"Timpa data yang sudah ada\" tidak diaktifkan.";
                }

                Notification::make()
                    ->title('Absensi Massal Selesai')
                    ->body($pesan)
                    ->success()
                    ->send();

                $this->form->fill([
                    'status'          => 'hadir',
                    'skip_minggu'     => true,
                    'timpa_data_lama' => false,
                ]);
            });
    }
}
