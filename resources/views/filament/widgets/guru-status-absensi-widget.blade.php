<x-filament-widgets::widget>
    @php $absensi = $this->getAbsensiHariIni(); @endphp

    <x-filament::section heading="Status Absensi Hari Ini">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 1rem;">

            <div
                style="background: rgb(var(--color-success-50)); border: 1px solid rgb(var(--color-success-100)); border-radius: 0.75rem; padding: 1.25rem; text-align: center;">
                <p style="font-size: 0.75rem; color: rgb(var(--gray-500)); margin-bottom: 0.5rem;">Absen Masuk</p>
                @if ($absensi?->waktu_masuk)
                    <p style="font-size: 2rem; font-weight: 800; color: rgb(var(--color-success-600));">
                        {{ \Carbon\Carbon::parse($absensi->waktu_masuk)->format('H:i') }}
                    </p>
                    <x-filament::badge color="success">Sudah Masuk</x-filament::badge>
                @else
                    <p style="font-size: 2rem; font-weight: 800; color: rgb(var(--gray-300));">--:--</p>
                    <x-filament::badge color="danger">Belum Absen</x-filament::badge>
                @endif
            </div>

            <div
                style="background: rgb(var(--color-warning-50)); border: 1px solid rgb(var(--color-warning-100)); border-radius: 0.75rem; padding: 1.25rem; text-align: center;">
                <p style="font-size: 0.75rem; color: rgb(var(--gray-500)); margin-bottom: 0.5rem;">Absen Pulang</p>
                @if ($absensi?->waktu_pulang)
                    <p style="font-size: 2rem; font-weight: 800; color: rgb(var(--color-warning-600));">
                        {{ \Carbon\Carbon::parse($absensi->waktu_pulang)->format('H:i') }}
                    </p>
                    <x-filament::badge color="warning">Sudah Pulang</x-filament::badge>
                @else
                    <p style="font-size: 2rem; font-weight: 800; color: rgb(var(--gray-300));">--:--</p>
                    <x-filament::badge color="gray">Belum Pulang</x-filament::badge>
                @endif
            </div>

            <div
                style="background: rgb(var(--gray-50)); border: 1px solid rgb(var(--gray-100)); border-radius: 0.75rem; padding: 1.25rem; text-align: center;">
                <p style="font-size: 0.75rem; color: rgb(var(--gray-500)); margin-bottom: 0.5rem;">Status</p>
                @if ($absensi)
                    <div style="margin-top: 0.5rem;">
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
                    @if ($absensi->waktu_masuk && $absensi->waktu_pulang)
                        <div
                            style="margin-top: 0.75rem; padding: 0.5rem 0.75rem; background: rgb(var(--color-primary-50)); border: 1px solid rgb(var(--color-primary-100)); border-radius: 0.5rem; display: inline-block;">
                            <p style="font-size: 0.7rem; color: rgb(var(--gray-400)); margin: 0 0 0.1rem 0;">Durasi
                                Bekerja</p>
                            <p
                                style="font-size: 1rem; font-weight: 800; color: rgb(var(--color-primary-600)); margin: 0;">
                                ⏱
                                {{ \Carbon\Carbon::parse($absensi->waktu_masuk)->diff(\Carbon\Carbon::parse($absensi->waktu_pulang))->format('%H jam %I menit') }}
                            </p>
                        </div>
                    @endif
                @else
                    <x-filament::badge color="gray">Tidak Ada Data</x-filament::badge>
                @endif
            </div>

        </div>
    </x-filament::section>
</x-filament-widgets::widget>
