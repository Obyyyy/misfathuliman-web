<x-layout>
    <main>
        <x-hero-banner :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" />

        <!-- KONTEN UTAMA -->
        <section class="bg-gray-50 dark:bg-gray-950 transition-colors duration-300">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">

                <!-- Pengantar -->
                <div class="max-w-3xl mx-auto text-center mb-12 sm:mb-16">
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 leading-relaxed">
                        MIS Fathul Iman menjalin kerjasama dengan berbagai instansi dan lembaga dalam rangka
                        meningkatkan kualitas pendidikan, mengembangkan program sekolah, dan memperluas
                        kesempatan bagi peserta didik untuk tumbuh dan berprestasi.
                    </p>
                </div>

                <!-- ======== INSTANSI PEMERINTAH ======== -->
                <div class="mb-14">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-1 h-7 bg-primary-dark dark:bg-green-500 rounded-full"></div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-gray-900 dark:text-white">
                            Mitra Kerja Sama
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
                        @foreach ($mitras as $mitra)
                            <x-mitra-card :mitra="$mitra" />
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>
