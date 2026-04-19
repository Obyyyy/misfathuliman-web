<?php

namespace App\Filament\Pages;

use App\Models\Absensi;
use BackedEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;

class AbsensiPage extends Page
{
    use HasPageShield;

    protected string $view = 'filament.pages.absensi-page';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowRightEndOnRectangle;
    protected static ?string $navigationLabel = 'Presensi';
    protected static ?string $title = 'Halaman Presensi';

    // Koordinat sekolah (dari iframe maps kamu)
    const SEKOLAH_LAT = -2.2311686373879684;
    const SEKOLAH_LNG = 113.91769707454809;
    const RADIUS_METER = 1000; // 1.5 km
    const JAM_BATAS_PULANG = '10:30';

    public float $latitude    = 0;
    public float $longitude   = 0;
    public bool  $lokasiDidapat = false;

    public function getAbsensiHariIni(): ?Absensi
    {
        return Absensi::hariIni(Auth::id());
    }

    // Hitung jarak antara dua koordinat (Haversine formula) dalam meter
    private function hitungJarak(float $lat1, float $lng1, float $lat2, float $lng2): float
    {
        $r = 6371000; // radius bumi dalam meter
        $p = M_PI / 180;

        $a = 0.5 - cos(($lat2 - $lat1) * $p) / 2
            + cos($lat1 * $p) * cos($lat2 * $p)
            * (1 - cos(($lng2 - $lng1) * $p)) / 2;

        return 2 * $r * asin(sqrt($a));
    }

    private function dalamRadius(): bool
    {
        if (!$this->lokasiDidapat) return false;

        $jarak = $this->hitungJarak(
            $this->latitude,
            $this->longitude,
            self::SEKOLAH_LAT,
            self::SEKOLAH_LNG
        );

        return $jarak <= self::RADIUS_METER;
    }

    private function bolehAbsenPulang(): bool
    {
        return now()->format('H:i') >= self::JAM_BATAS_PULANG;
    }

    public function getJarakKeSekolah(): string
    {
        if (!$this->lokasiDidapat) return '';

        $jarak = $this->hitungJarak(
            $this->latitude,
            $this->longitude,
            self::SEKOLAH_LAT,
            self::SEKOLAH_LNG
        );

        if ($jarak >= 1000) {
            return number_format($jarak / 1000, 2) . ' km';
        }

        return number_format($jarak, 0) . ' m';
    }

    public function absenMasukAction(): Action
    {
        return Action::make('absenMasuk')
            ->label('Absen Masuk')
            ->color('success')
            ->icon('heroicon-o-arrow-right-circle')
            ->requiresConfirmation()
            ->modalHeading('Konfirmasi Absen Masuk')
            ->modalDescription('Pastikan lokasi GPS Anda sudah terdeteksi dengan benar sebelum melanjutkan.')
            ->modalSubmitActionLabel('Ya, Absen Masuk')
            ->disabled(fn() =>
                Absensi::sudahAbsenMasuk(Auth::id()) ||
                !$this->lokasiDidapat ||
                !$this->dalamRadius()
            )
            ->action(function () {
                if (!$this->lokasiDidapat) {
                    Notification::make()->title('Lokasi belum terdeteksi')->warning()->send();
                    return;
                }

                if (!$this->dalamRadius()) {
                    Notification::make()
                        ->title('Diluar area sekolah')
                        ->body('Anda harus berada dalam radius ' . (self::RADIUS_METER / 1000) . ' km dari sekolah.')
                        ->danger()
                        ->send();
                    return;
                }

                $waktuSekarang = now()->format('H:i:s');

                Absensi::updateOrCreate(
                    ['user_id' => Auth::id(), 'tanggal' => today()],
                    [
                        'waktu_masuk' => $waktuSekarang,
                        'lat_masuk'   => $this->latitude,
                        'lng_masuk'   => $this->longitude,
                        'status'      => Absensi::tentukanStatus($waktuSekarang),
                    ]
                );

                Notification::make()
                    ->title('Absen masuk berhasil')
                    ->body('Tercatat pukul ' . now()->format('H:i'))
                    ->success()
                    ->send();

                $this->dispatch('absensi-updated');
            });
    }

    public function absenPulangAction(): Action
    {
        return Action::make('absenPulang')
            ->label('Absen Pulang')
            ->color('warning')
            ->icon('heroicon-o-arrow-left-circle')
            ->requiresConfirmation()
            ->modalHeading('Konfirmasi Absen Pulang')
            ->modalDescription('Pastikan lokasi GPS Anda sudah terdeteksi dengan benar sebelum melanjutkan.')
            ->modalSubmitActionLabel('Ya, Absen Pulang')
            ->disabled(fn() =>
                !Absensi::sudahAbsenMasuk(Auth::id()) ||
                Absensi::sudahAbsenPulang(Auth::id()) ||
                !$this->lokasiDidapat ||
                !$this->dalamRadius() ||
                !$this->bolehAbsenPulang()
            )
            ->action(function () {
                if (!$this->lokasiDidapat) {
                    Notification::make()->title('Lokasi belum terdeteksi')->warning()->send();
                    return;
                }

                if (!$this->dalamRadius()) {
                    Notification::make()
                        ->title('Diluar area sekolah')
                        ->body('Anda harus berada dalam radius ' . (self::RADIUS_METER / 1000) . ' km dari sekolah.')
                        ->danger()
                        ->send();
                    return;
                }

                if (!$this->bolehAbsenPulang()) {
                    Notification::make()
                        ->title('Belum waktunya pulang')
                        ->body('Absen pulang baru bisa dilakukan mulai pukul ' . self::JAM_BATAS_PULANG . ' WIB.')
                        ->warning()
                        ->send();
                    return;
                }

                Absensi::where('user_id', Auth::id())
                    ->where('tanggal', today())
                    ->update([
                        'waktu_pulang' => now()->format('H:i:s'),
                        'lat_pulang'   => $this->latitude,
                        'lng_pulang'   => $this->longitude,
                    ]);

                Notification::make()
                    ->title('Absen pulang berhasil')
                    ->body('Tercatat pukul ' . now()->format('H:i'))
                    ->success()
                    ->send();

                $this->dispatch('absensi-updated');
            });
    }
}