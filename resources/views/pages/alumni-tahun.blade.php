<x-layout>
    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">

                <!-- Info angkatan -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                    <div class="flex items-center space-x-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-amber-50 dark:bg-amber-900/20 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-amber-500 dark:text-amber-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Tahun Kelulusan</p>
                            <p class="font-extrabold text-lg sm:text-xl text-gray-900 dark:text-white">
                                Angkatan {{ $tahun }}
                            </p>
                        </div>
                    </div>

                    <!-- Total alumni & tombol kembali -->
                    <div class="flex items-center gap-3">
                        <span
                            class="inline-flex items-center px-3 py-1.5 rounded-full text-xs sm:text-sm font-semibold bg-amber-50 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400">
                            {{ count($alumni) }} Alumni
                        </span>
                        <a href="{{ route('alumni.index') }}"
                            class="inline-flex items-center px-3 py-1.5 rounded-full text-xs sm:text-sm font-medium border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-150 cursor-pointer">
                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            Semua Angkatan
                        </a>
                    </div>
                </div>

                <!-- Tabel alumni — desktop -->
                <div
                    class="hidden sm:block bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700">
                                <th
                                    class="text-left px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 w-10">
                                    No</th>
                                <th
                                    class="text-left px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Nama Alumni</th>
                                <th
                                    class="text-left px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    NIS</th>
                                <th
                                    class="text-left px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Jenis Kelamin</th>
                                <th
                                    class="text-left px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Tahun Lulus</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse ($alumni as $i => $a)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                    <td class="px-5 py-3.5 text-gray-400 dark:text-gray-500 text-xs">
                                        {{ $i + 1 }}
                                    </td>
                                    <td class="px-5 py-3.5">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 text-xs font-bold
                                                {{ $a['jenis_kelamin'] === 'L'
                                                    ? 'bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400'
                                                    : 'bg-pink-100 dark:bg-pink-900/40 text-pink-600 dark:text-pink-400' }}">
                                                {{ strtoupper(substr($a['nama'], 0, 1)) }}
                                            </div>
                                            <span
                                                class="font-medium text-gray-900 dark:text-white">{{ $a['nama'] }}</span>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3.5 text-gray-600 dark:text-gray-400 font-mono text-xs">
                                        {{ $a['nis'] }}
                                    </td>
                                    <td class="px-5 py-3.5">
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                            {{ $a['jenis_kelamin'] === 'L'
                                                ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400'
                                                : 'bg-pink-50 dark:bg-pink-900/30 text-pink-600 dark:text-pink-400' }}">
                                            {{ $a['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-3.5 text-gray-600 dark:text-gray-400">
                                        {{ $a['tahun_lulus'] }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="px-5 py-10 text-center text-gray-400 dark:text-gray-500 text-sm">
                                        Belum ada data alumni untuk angkatan ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Kartu alumni — mobile -->
                <div class="sm:hidden space-y-3">
                    @forelse ($alumni as $i => $a)
                        <div
                            class="flex items-center space-x-4 bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-4">
                            <div
                                class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-sm
                                {{ $a['jenis_kelamin'] === 'L'
                                    ? 'bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400'
                                    : 'bg-pink-100 dark:bg-pink-900/40 text-pink-600 dark:text-pink-400' }}">
                                {{ strtoupper(substr($a['nama'], 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-sm text-gray-900 dark:text-white truncate">
                                    {{ $a['nama'] }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                                    NIS: {{ $a['nis'] }} · Lulus {{ $a['tahun_lulus'] }}
                                </p>
                            </div>
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium flex-shrink-0
                                {{ $a['jenis_kelamin'] === 'L'
                                    ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400'
                                    : 'bg-pink-50 dark:bg-pink-900/30 text-pink-600 dark:text-pink-400' }}">
                                {{ $a['jenis_kelamin'] === 'L' ? 'L' : 'P' }}
                            </span>
                        </div>
                    @empty
                        <div class="text-center py-10 text-gray-400 dark:text-gray-500 text-sm">
                            Belum ada data alumni untuk angkatan ini.
                        </div>
                    @endforelse
                </div>

            </div>
        </section>
    </main>
</x-layout>
