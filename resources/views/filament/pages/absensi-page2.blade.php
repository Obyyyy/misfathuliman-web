<x-filament-panels::page>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (!navigator.geolocation) return;
            navigator.geolocation.getCurrentPosition(
                function(pos) {
                    @this.set('latitude', pos.coords.latitude);
                    @this.set('longitude', pos.coords.longitude);
                    @this.set('lokasiDidapat', true);
                },
                function(err) {
                    console.warn('GPS error:', err.message);
                }, {
                    enableHighAccuracy: true,
                    timeout: 10000
                }
            );
        });
    </script>

    @php $absensi = $this->getAbsensiHariIni(); @endphp

    {{-- Status Lokasi --}}
    {{-- Status Lokasi --}}
    <x-filament::section>
        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem;">

            @if ($lokasiDidapat)
                <p style="color: #16a34a; font-weight: 600; font-size: 0.875rem;">
                    ✅ Lokasi terdeteksi: {{ number_format($latitude, 6) }}, {{ number_format($longitude, 6) }}
                </p>

                @php
                    $dalamRadius = $this->dalamRadius();
                    $jarak = $this->getJarakKeSekolah();
                @endphp

                <div
                    style="
                padding: 0.5rem 1rem;
                border-radius: 0.6rem;
                font-size: 0.875rem;
                font-weight: 700;
                background: {{ $dalamRadius ? '#f0fdf4' : '#fef2f2' }};
                border: 1.5px solid {{ $dalamRadius ? '#86efac' : '#fca5a5' }};
                color: {{ $dalamRadius ? '#15803d' : '#dc2626' }};
            ">
                    {{ $dalamRadius ? '✅ Dalam area sekolah' : '❌ Di luar area sekolah' }}
                    — {{ $jarak }} dari sekolah
                </div>
            @else
                <p style="color: #d97706; font-weight: 600; font-size: 0.875rem;">
                    ⏳ Mendeteksi lokasi GPS... (izinkan akses lokasi di browser)
                </p>
            @endif

        </div>
    </x-filament::section>

    {{-- Google Maps --}}
    @if ($lokasiDidapat)
        <div style="margin-top: 1rem;">
            <x-filament::section heading="Lokasi Anda Saat Ini">
                <div style="border-radius: 0.75rem; overflow: hidden; height: 300px;">
                    <iframe width="100%" height="100%" frameborder="0" referrerpolicy="no-referrer-when-downgrade"
                        src="https://maps.google.com/maps?q={{ $latitude }},{{ $longitude }}&z=17&output=embed"
                        allowfullscreen>
                    </iframe>
                </div>
                <div style="margin-top: 0.75rem;">
                    <a href="https://maps.google.com/?q={{ $latitude }},{{ $longitude }}" target="_blank"
                        style="font-size: 0.75rem; color: #2563eb; text-decoration: none;">
                        🔗 Buka di Google Maps
                    </a>
                </div>
            </x-filament::section>
        </div>
    @endif

    {{-- Absen Masuk & Pulang --}}
    <div
        style="margin-top: 1rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1rem;">

        {{-- Absen Masuk --}}
        <x-filament::section heading="Absen Masuk">
            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                @if ($absensi?->waktu_masuk)
                    <p style="font-size: 2rem; font-weight: 800; color: #16a34a;">
                        {{ \Carbon\Carbon::parse($absensi->waktu_masuk)->format('H:i') }}
                    </p>
                    @if ($absensi->lat_masuk && $absensi->lng_masuk)
                        <a href="https://maps.google.com/?q={{ $absensi->lat_masuk }},{{ $absensi->lng_masuk }}"
                            target="_blank" style="font-size: 0.75rem; color: #2563eb; text-decoration: none;">
                            📍 Lihat lokasi absen masuk
                        </a>
                    @endif
                    <x-filament::badge color="success">Sudah Absen Masuk</x-filament::badge>
                @else
                    <p style="font-size: 0.875rem; color: #6b7280;">Belum absen masuk hari ini.</p>
                    {{ $this->absenMasukAction }}
                @endif
            </div>
        </x-filament::section>

        {{-- Absen Pulang --}}
        <x-filament::section heading="Absen Pulang">
            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                @if (!$absensi?->waktu_pulang && $absensi?->waktu_masuk)
                    @if (now()->format('H:i') < '10:30')
                        <p style="font-size: 0.8rem; color: #d97706; font-weight: 600;">
                            ⏰ Absen pulang tersedia mulai pukul 10.30 WIB
                        </p>
                    @endif
                @endif
                @if ($absensi?->waktu_pulang)
                    <p style="font-size: 2rem; font-weight: 800; color: #d97706;">
                        {{ \Carbon\Carbon::parse($absensi->waktu_pulang)->format('H:i') }}
                    </p>
                    @if ($absensi->lat_pulang && $absensi->lng_pulang)
                        <a href="https://maps.google.com/?q={{ $absensi->lat_pulang }},{{ $absensi->lng_pulang }}"
                            target="_blank" style="font-size: 0.75rem; color: #2563eb; text-decoration: none;">
                            📍 Lihat lokasi absen pulang
                        </a>
                    @endif
                    <x-filament::badge color="warning">Sudah Absen Pulang</x-filament::badge>
                @else
                    <p style="font-size: 0.875rem; color: #6b7280;">
                        @if (!$absensi?->waktu_masuk)
                            Silakan absen masuk terlebih dahulu.
                        @else
                            Belum absen pulang hari ini.
                        @endif
                    </p>
                    {{ $this->absenPulangAction }}
                @endif
            </div>
        </x-filament::section>

    </div>

    {{-- Status Hari Ini --}}
    @if ($absensi)
        <div style="margin-top: 1rem;">
            <x-filament::section heading="Status Hari Ini">
                <div style="display: flex; flex-wrap: wrap; gap: 2rem;">
                    <div>
                        <p style="font-size: 0.75rem; color: #9ca3af;">Tanggal</p>
                        <p style="font-weight: 600; margin-top: 0.25rem;">
                            {{ $absensi->tanggal->translatedFormat('l, d F Y') }}
                        </p>
                    </div>
                    <div>
                        <p style="font-size: 0.75rem; color: #9ca3af;">Status</p>
                        <div style="margin-top: 0.25rem;">
                            <x-filament::badge :color="match ($absensi->status) {
                                'hadir' => 'success',
                                'terlambat' => 'warning',
                                'izin' => 'info',
                                'sakit' => 'gray',
                                default => 'danger',
                            }">
                                {{ ucfirst($absensi->status) }}
                            </x-filament::badge>
                        </div>
                    </div>
                    @if ($absensi->waktu_masuk && $absensi->waktu_pulang)
                        <div>
                            <p style="font-size: 0.75rem; color: #9ca3af;">Durasi Kerja</p>
                            <p style="font-weight: 600; margin-top: 0.25rem;">
                                {{ \Carbon\Carbon::parse($absensi->waktu_masuk)->diff(\Carbon\Carbon::parse($absensi->waktu_pulang))->format('%H jam %I menit') }}
                            </p>
                        </div>
                    @endif
                </div>
            </x-filament::section>
        </div>
    @endif

</x-filament-panels::page>
