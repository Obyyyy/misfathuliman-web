<x-layout>
    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">

                <!-- Info kelas -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                    <div class="flex items-center space-x-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-green-100 dark:bg-green-900/40 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-primary-dark dark:text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Wali Kelas</p>
                            <p class="font-semibold text-sm sm:text-base text-gray-900 dark:text-white">
                                {{ $kelasSaat->guru->guru_nama }}
                            </p>
                        </div>
                    </div>

                    <!-- Total siswa & tombol kembali -->
                    <div class="flex items-center gap-3">
                        <span
                            class="inline-flex items-center px-3 py-1.5 rounded-full text-xs sm:text-sm font-semibold bg-green-100 dark:bg-green-900/50 text-primary-dark dark:text-green-400">
                            {{ count($siswa) }} Siswa
                        </span>
                        <a href="{{ route('siswa.index') }}"
                            class="inline-flex items-center px-3 py-1.5 rounded-full text-xs sm:text-sm font-medium border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors duration-150 cursor-pointer">
                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            Semua Kelas
                        </a>
                    </div>
                </div>

                <!-- Tabel siswa — desktop -->
                <div
                    class="hidden sm:block bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-900 border-b border-gray-100 dark:border-gray-700">
                                <th
                                    class="text-left px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 w-10">
                                    No
                                </th>
                                <th
                                    class="text-left px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Nama Siswa
                                </th>
                                <th
                                    class="text-left px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    NISN
                                </th>
                                <th
                                    class="text-left px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Jenis Kelamin
                                </th>
                                {{-- <th
                                    class="text-left px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400">
                                    Tahun Masuk
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse ($siswa as $i => $s)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">
                                    <td class="px-5 py-3.5 text-gray-400 dark:text-gray-500 text-xs">
                                        {{ $i + 1 }}
                                    </td>
                                    <td class="px-5 py-3.5">
                                        <div class="flex items-center space-x-3">
                                            <!-- Avatar inisial -->
                                            <div
                                                class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 text-xs font-bold
                                                {{ $s->siswa_gender === 'L'
                                                    ? 'bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400'
                                                    : 'bg-pink-100 dark:bg-pink-900/40 text-pink-600 dark:text-pink-400' }}">
                                                {{ strtoupper(substr($s->siswa_nama, 0, 1)) }}
                                            </div>
                                            <span class="font-medium text-gray-900 dark:text-white">
                                                {{ $s->siswa_nama }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3.5 text-gray-600 dark:text-gray-400 font-mono text-xs">
                                        {{ $s->siswa_nisn ? $s->siswa_nisn : '-' }}
                                    </td>
                                    <td class="px-5 py-3.5">
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium
                                            {{ $s->siswa_gender === 'L'
                                                ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400'
                                                : 'bg-pink-50 dark:bg-pink-900/30 text-pink-600 dark:text-pink-400' }}">
                                            {{ $s->siswa_gender === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </span>
                                    </td>
                                    {{-- <td class="px-5 py-3.5 text-gray-600 dark:text-gray-400">
                                        {{ $s->siswa_id }}
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="px-5 py-10 text-center text-gray-400 dark:text-gray-500 text-sm">
                                        Belum ada data siswa untuk kelas ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Kartu siswa — mobile -->
                <div class="sm:hidden space-y-3">
                    @forelse ($siswa as $i => $s)
                        <div
                            class="flex items-center space-x-4 bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-4">
                            <!-- Avatar -->
                            <div
                                class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 font-bold text-sm
                                {{ $s->siswa_gender === 'L'
                                    ? 'bg-blue-100 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400'
                                    : 'bg-pink-100 dark:bg-pink-900/40 text-pink-600 dark:text-pink-400' }}">
                                {{ strtoupper(substr($s->siswa_nama, 0, 1)) }}
                            </div>
                            <!-- Info -->
                            <div class="flex-1 min-w-0">
                                <p class="font-semibold text-sm text-gray-900 dark:text-white truncate">
                                    {{ $s->siswa_nama }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                                    NISN: {{ $s->siswa_nisn }}
                                </p>
                            </div>
                            <!-- Badge JK -->
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium flex-shrink-0
                                {{ $s->siswa_gender === 'L'
                                    ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400'
                                    : 'bg-pink-50 dark:bg-pink-900/30 text-pink-600 dark:text-pink-400' }}">
                                {{ $s->siswa_gender === 'L' ? 'L' : 'P' }}
                            </span>
                        </div>
                    @empty
                        <div class="text-center py-10 text-gray-400 dark:text-gray-500 text-sm">
                            Belum ada data siswa untuk kelas ini.
                        </div>
                    @endforelse
                </div>

            </div>
        </section>
    </main>
</x-layout>
