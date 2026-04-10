<x-layout>
    <main>
        <!-- =============================================
             PAGE HEADER
        ============================================= -->
        <section
            class="bg-gradient-to-br from-primary via-primary-dark to-green-900 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

                <!-- Breadcrumb -->
                <nav class="flex items-center gap-2 text-xs text-white/60 mb-6">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors duration-150">Beranda</a>
                    <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-white/90">Sambutan Kepala Madrasah</span>
                </nav>

                <!-- Judul halaman -->
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-1 h-8 rounded-full bg-amber-300"></div>
                    <p class="text-xs font-semibold uppercase tracking-widest text-amber-300">Kata Pengantar</p>
                </div>
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-snug">
                    Sambutan Kepala Madrasah
                </h1>
                <p class="mt-2 text-sm sm:text-base text-white/70 max-w-xl leading-relaxed">
                    MIS Fathul Iman Palangka Raya &mdash; Madrasah Ibtidaiyah Swasta yang berkomitmen mencetak generasi
                    Qur&rsquo;ani
                </p>
            </div>
        </section>

        <!-- =============================================
             ISI SAMBUTAN
        ============================================= -->
        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

                <div
                    class="bg-white dark:bg-gray-900 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden">

                    <!-- Header kartu: foto + identitas -->
                    <div
                        class="bg-gradient-to-r from-primary/10 via-green-50 to-transparent dark:from-green-900/20 dark:via-gray-800/50 dark:to-transparent px-6 sm:px-10 py-8 border-b border-gray-100 dark:border-gray-800">
                        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">

                            <!-- Foto / avatar fallback -->
                            <div class="flex-shrink-0 relative">
                                <img src="{{ asset('images/kepmad.png') }}" alt="Foto Kepala Madrasah"
                                    class="w-28 h-28 sm:w-32 sm:h-32 rounded-full object-cover object-center border-4 border-white dark:border-gray-700 shadow-lg"
                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                                <div
                                    class="hidden w-28 h-28 sm:w-32 sm:h-32 rounded-full bg-gradient-to-br from-primary to-primary-dark
                                            items-center justify-center border-4 border-white dark:border-gray-700 shadow-lg">
                                    <svg class="w-12 h-12 text-white/70" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
                                    </svg>
                                </div>
                                <!-- Badge dekoratif -->
                                <div
                                    class="absolute -bottom-1 -right-1 w-8 h-8 rounded-full bg-amber-400 border-2 border-white dark:border-gray-700 flex items-center justify-center shadow">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Identitas -->
                            <div class="text-center sm:text-left">
                                <p
                                    class="text-xs font-semibold uppercase tracking-widest text-primary-dark dark:text-green-400 mb-1">
                                    Kepala Madrasah
                                </p>
                                <h2
                                    class="text-xl sm:text-2xl font-extrabold text-gray-900 dark:text-white leading-snug">
                                    {{ $kepala['nama'] }}
                                </h2>
                                @if (!empty($kepala['nip']))
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">
                                        {{ $kepala['nip'] }}
                                    </p>
                                @endif
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    MIS Fathul Iman &mdash; Palangka Raya, Kalimantan Tengah
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Isi sambutan -->
                    <div class="px-6 sm:px-10 py-8 sm:py-10">

                        <!-- Kutipan Bismillah / pembuka -->
                        <div class="text-center mb-8">
                            <p
                                class="text-2xl sm:text-3xl font-serif text-gray-700 dark:text-gray-300 leading-relaxed tracking-wide">
                                بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم
                            </p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1 italic">
                                Dengan menyebut nama Allah Yang Maha Pengasih lagi Maha Penyayang
                            </p>
                            <div class="mt-4 flex items-center gap-3 justify-center">
                                <div
                                    class="h-px w-16 bg-gradient-to-r from-transparent to-primary/40 dark:to-green-700/40">
                                </div>
                                <div class="w-1.5 h-1.5 rounded-full bg-primary-dark dark:bg-green-500"></div>
                                <div
                                    class="h-px w-16 bg-gradient-to-l from-transparent to-primary/40 dark:to-green-700/40">
                                </div>
                            </div>
                        </div>

                        <!-- Teks sambutan lengkap -->
                        <div
                            class="prose prose-sm sm:prose-base max-w-none
                                    text-gray-700 dark:text-gray-300
                                    prose-headings:text-gray-900 dark:prose-headings:text-white
                                    prose-strong:text-gray-900 dark:prose-strong:text-white
                                    leading-relaxed space-y-4">

                            <p class="font-semibold text-gray-800 dark:text-gray-200">
                                Assalamu&rsquo;alaikum Warahmatullahi Wabarakatuh.
                            </p>

                            <p>
                                Puji syukur kehadirat Allah SWT yang telah memberikan rahmat dan hidayah-Nya kepada kita
                                semua. Shalawat serta salam senantiasa tercurahkan kepada junjungan kita Nabi Muhammad
                                SAW, beserta keluarga, sahabat, dan seluruh umatnya hingga akhir zaman.
                            </p>

                            <p>
                                Selamat datang di website resmi <strong>Madrasah Ibtidaiyah Swasta (MIS) Fathul Iman
                                    Palangka Raya</strong>. Kehadiran website ini merupakan salah satu wujud komitmen
                                kami dalam memberikan kemudahan akses informasi kepada seluruh warga madrasah, orang
                                tua/wali murid, serta masyarakat luas.
                            </p>

                            <p>
                                MIS Fathul Iman berdiri dengan tekad yang kuat untuk menjadi lembaga pendidikan Islam
                                yang unggul &mdash; tidak hanya dalam aspek akademik, tetapi juga dalam pembentukan
                                karakter dan akhlak mulia. Kami percaya bahwa pendidikan yang sejati adalah pendidikan
                                yang mampu menyentuh hati, membentuk jiwa, dan mempersiapkan generasi yang siap
                                menghadapi tantangan zaman tanpa melupakan akar keimanan mereka.
                            </p>

                            <p>
                                Madrasah kami berkomitmen memberikan pendidikan terbaik yang memadukan ilmu pengetahuan
                                dan nilai keislaman demi mencetak <strong>generasi Qur&rsquo;ani yang cerdas dan
                                    berakhlak mulia</strong>. Dengan kurikulum yang mengintegrasikan nilai-nilai Islam
                                dalam setiap aspek pembelajaran, kami berupaya agar setiap siswa tidak hanya mahir dalam
                                ilmu pengetahuan, tetapi juga kuat dalam iman dan taqwa.
                            </p>

                            <p>
                                Kami menyadari bahwa keberhasilan pendidikan tidak dapat dicapai oleh madrasah saja.
                                Diperlukan sinergi yang kuat antara madrasah, orang tua, dan seluruh komponen
                                masyarakat. Oleh karena itu, kami senantiasa membuka diri untuk bekerja sama dan
                                berdialog demi kemajuan bersama.
                            </p>

                            <p>
                                Kepada seluruh siswa-siswi MIS Fathul Iman, teruslah semangat dalam menuntut ilmu. Ilmu
                                adalah cahaya yang akan menerangi jalan kalian menuju masa depan yang gemilang. Kepada
                                para orang tua/wali murid, terima kasih atas kepercayaan yang telah diberikan kepada
                                kami. Kami berjanji untuk terus berupaya memberikan yang terbaik bagi putra-putri Bapak
                                dan Ibu.
                            </p>

                            <p>
                                Semoga Allah SWT senantiasa meridhoi setiap langkah dan ikhtiar kita bersama dalam
                                mendidik generasi Islam yang unggul, berprestasi, dan berakhlak mulia. Aamiin Ya Rabbal
                                &lsquo;Alamin.
                            </p>

                            <p class="font-semibold text-gray-800 dark:text-gray-200 pt-2">
                                Wassalamu&rsquo;alaikum Warahmatullahi Wabarakatuh.
                            </p>
                        </div>

                        <!-- Tanda tangan -->
                        <div
                            class="mt-10 flex flex-col items-end text-right border-t border-gray-100 dark:border-gray-800 pt-8">
                            <p class="text-xs text-gray-400 dark:text-gray-500">Palangka Raya, 2025</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">Kepala Madrasah,</p>

                            <!-- Placeholder area tanda tangan -->
                            {{-- <div
                                class="my-6 w-36 h-16 flex items-center justify-center border border-dashed border-gray-200 dark:border-gray-700 rounded-lg">
                                <span class="text-xs text-gray-300 dark:text-gray-600 italic">ttd</span>
                            </div> --}}

                            <p class="font-extrabold text-sm mt-2 text-gray-900 dark:text-white">
                                {{ $kepala['nama'] }}
                            </p>
                            @if (!empty($kepala['nip']))
                                <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">{{ $kepala['nip'] }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('img[data-src]').forEach(function(img) {
                    img.src = img.getAttribute('data-src');
                });
            });
        </script>
    @endpush
</x-layout>
