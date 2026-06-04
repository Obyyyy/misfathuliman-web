<?php

namespace App\Filament\Pages;

use App\Exports\AbsensiExport;
use App\Models\User;
use BackedEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Schemas\Schema;
use Maatwebsite\Excel\Facades\Excel;
use UnitEnum;

class ExportAbsensiPage extends Page
{
    use InteractsWithForms;
    use HasPageShield;

    protected string $view = 'filament.pages.export-absensi-page';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-arrow-down-tray';
    protected static ?string $navigationLabel = 'Export Absensi';
    protected static string|UnitEnum|null $navigationGroup = 'Guru & Staf';
    protected static ?string $title = 'Export Data Absensi';
    protected static ?string $slug = 'export-absensi';

    public ?string $bulan            = '';
    public ?string $tahun            = '';
    public ?int    $user_id          = null;
    public bool    $gunakan_rentang  = false;
    public ?string $tanggal_mulai    = null;
    public ?string $tanggal_selesai  = null;

    public function mount(): void
    {
        $this->bulan           = now()->format('m');
        $this->tahun           = now()->format('Y');
        $this->gunakan_rentang = false;
        $this->tanggal_mulai   = now()->startOfMonth()->toDateString();
        $this->tanggal_selesai = now()->toDateString();

        $this->form->fill([
            'bulan'           => $this->bulan,
            'tahun'           => $this->tahun,
            'user_id'         => null,
            'gunakan_rentang' => false,
            'tanggal_mulai'   => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([

            Toggle::make('gunakan_rentang')
                ->label('Gunakan Rentang Tanggal (bukan 1 bulan penuh)')
                ->live()
                ->columnSpanFull(),

            // --- Mode: Bulan penuh ---
            Section::make('Periode Bulan')
                ->description('Export seluruh data dalam satu bulan.')
                ->schema([
                    Select::make('bulan')
                        ->label('Bulan')
                        ->options([
                            '01' => 'Januari',  '02' => 'Februari', '03' => 'Maret',
                            '04' => 'April',    '05' => 'Mei',       '06' => 'Juni',
                            '07' => 'Juli',     '08' => 'Agustus',   '09' => 'September',
                            '10' => 'Oktober',  '11' => 'November',  '12' => 'Desember',
                        ])
                        ->required(fn ($get) => ! $get('gunakan_rentang')),

                    Select::make('tahun')
                        ->label('Tahun')
                        ->options(
                            collect(range(now()->year, now()->year - 4))
                                ->mapWithKeys(fn ($y) => [$y => $y])
                                ->toArray()
                        )
                        ->required(fn ($get) => ! $get('gunakan_rentang')),
                ])
                ->columns(2)
                ->visible(fn ($get) => ! $get('gunakan_rentang')),

            // --- Mode: Rentang Tanggal ---
            Section::make('Rentang Tanggal')
                ->description('Export data hanya dalam rentang tanggal tertentu.')
                ->schema([
                    DatePicker::make('tanggal_mulai')
                        ->label('Tanggal Mulai')
                        ->displayFormat('d/m/Y')
                        ->native(false)
                        ->required(fn ($get) => $get('gunakan_rentang'))
                        ->maxDate(fn ($get) => $get('tanggal_selesai') ?? now()),

                    DatePicker::make('tanggal_selesai')
                        ->label('Tanggal Selesai')
                        ->displayFormat('d/m/Y')
                        ->native(false)
                        ->required(fn ($get) => $get('gunakan_rentang'))
                        ->minDate(fn ($get) => $get('tanggal_mulai'))
                        ->maxDate(now()),
                ])
                ->columns(2)
                ->visible(fn ($get) => $get('gunakan_rentang')),

            // --- Filter Guru / Staf ---
            Select::make('user_id')
                ->label('Guru / Staf')
                ->placeholder('Semua Guru & Staf')
                ->options(
                    // Tampilkan NIP + Nama agar mudah dicari
                    User::all()->mapWithKeys(
                        fn ($u) => [$u->id => trim(($u->nip ? "[{$u->nip}] " : '') . $u->name)]
                    )->toArray()
                )
                ->searchable()
                ->nullable()
                ->columnSpanFull(),
        ]);
    }

    public function exportAction(): Action
    {
        return Action::make('export')
            ->label('Export Excel')
            ->icon('heroicon-o-arrow-down-tray')
            ->color('success')
            ->action(function () {
                $data = $this->form->getState();

                $userId         = $data['user_id'] ?? null;
                $gunakanRentang = $data['gunakan_rentang'] ?? false;

                if ($gunakanRentang) {
                    $mulai   = Carbon::parse($data['tanggal_mulai']);
                    $selesai = Carbon::parse($data['tanggal_selesai']);

                    $filename = 'absensi-'
                        . $mulai->format('d-m-Y')
                        . '-sd-'
                        . $selesai->format('d-m-Y')
                        . '.xlsx';

                    return Excel::download(
                        new AbsensiExport(
                            bulan: null,
                            tahun: null,
                            userId: $userId,
                            tanggalMulai: $mulai->toDateString(),
                            tanggalSelesai: $selesai->toDateString(),
                        ),
                        $filename
                    );
                }

                $bulan     = $data['bulan'];
                $tahun     = $data['tahun'];
                $namaBulan = Carbon::create()->month((int) $bulan)->translatedFormat('F');
                $filename  = 'absensi-' . strtolower($namaBulan) . '-' . $tahun . '.xlsx';

                return Excel::download(
                    new AbsensiExport(
                        bulan: $bulan,
                        tahun: $tahun,
                        userId: $userId,
                        tanggalMulai: null,
                        tanggalSelesai: null,
                    ),
                    $filename
                );
            });
    }
}
