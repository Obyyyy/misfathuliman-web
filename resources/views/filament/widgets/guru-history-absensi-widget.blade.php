<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Riwayat Absensi Bulan Ini
        </x-slot>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Waktu Masuk</th>
                        <th class="px-4 py-2">Waktu Pulang</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($this->getRiwayatBulanIni() as $item)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-2">
                                {{ $item['tanggal']->translatedFormat('l, d M Y') }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $item['waktu_masuk'] ?? '-' }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $item['waktu_pulang'] ?? '-' }}
                            </td>
                            <td class="px-4 py-2">
                                @php
                                    $statusColor = match ($item['status']) {
                                        'hadir' => 'success',
                                        'terlambat' => 'warning',
                                        'izin' => 'info',
                                        'sakit' => 'info',
                                        'alpa' => 'danger',
                                        default => 'gray',
                                    };
                                    $statusLabel = match ($item['status']) {
                                        'hadir' => 'Hadir',
                                        'terlambat' => 'Terlambat',
                                        'izin' => 'Izin',
                                        'sakit' => 'Sakit',
                                        'alpa' => 'Alpa',
                                        default => 'Belum Absen',
                                    };
                                @endphp
                                <x-filament::badge :color="$statusColor">
                                    {{ $statusLabel }}
                                </x-filament::badge>
                            </td>
                            <td class="px-4 py-2 text-gray-500">
                                {{ $item['keterangan'] ?? '-' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                Belum ada data absensi bulan ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
