<x-filament-widgets::widget>
    <x-filament::section>
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">

            {{-- Foto profil --}}
            <div style="flex-shrink: 0;">
                @if (auth()->user()->foto)
                    <img src="{{ asset('storage/' . auth()->user()->foto) }}"
                        style="width: 72px; height: 72px; border-radius: 9999px; object-fit: cover; border: 3px solid rgb(var(--color-success-200));">
                @else
                    <div
                        style="width: 72px; height: 72px; border-radius: 9999px; background: rgb(var(--color-success-100)); display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 800; color: rgb(var(--color-success-700));">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif
            </div>

            {{-- Info --}}
            <div style="flex: 1;">
                <p style="font-size: 0.85rem; color: rgb(var(--gray-400)); margin-bottom: 0.25rem;">
                    Selamat datang 👋
                </p>
                <p style="font-size: 1.4rem; font-weight: 800; color: rgb(var(--gray-950)); margin-bottom: 0.25rem;">
                    {{ auth()->user()->name }}
                </p>
                <p style="font-size: 0.875rem; color: rgb(var(--gray-500));">
                    {{ auth()->user()->profilGuru?->jabatan ?? 'Guru' }}
                    @if (auth()->user()->profilGuru?->nama_jabatan)
                        · {{ auth()->user()->profilGuru->nama_jabatan }}
                    @endif
                </p>
            </div>

            {{-- Tanggal --}}
            <div style="text-align: right; flex-shrink: 0;">
                <p style="font-size: 0.75rem; color: rgb(var(--gray-400));">Hari ini</p>
                <p style="font-size: 1rem; font-weight: 700; color: rgb(var(--gray-700));">
                    {{ now()->translatedFormat('l') }}
                </p>
                <p style="font-size: 0.875rem; color: rgb(var(--gray-500));">
                    {{ now()->translatedFormat('d F Y') }}
                </p>
            </div>
        </div>

        {{-- Shortcut --}}
        {{-- Shortcut --}}
        <div
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 1.5rem;">

            @unless (auth()->user()->hasRole('humas'))
                <a href="{{ route('filament.admin.pages.absensi-page') }}"
                    style="display: flex; align-items: center; gap: 0.75rem; padding: 1rem; background: rgb(var(--color-success-500)); border-radius: 0.75rem; text-decoration: none; box-shadow: 0 2px 10px rgba(0,0,0,0.15);">
                    <span style="font-size: 1.5rem;">🕐</span>
                    <div>
                        <p style="font-weight: 700; color: rgb(var(--color-success-700)); font-size: 0.9rem; margin: 0;">
                            Absensi</p>
                        <p style="font-size: 0.75rem; color: rgb(var(--gray-500)); margin: 0;">Absen masuk & pulang</p>
                    </div>
                </a>
            @endunless

            <a href="{{ route('filament.admin.pages.edit-profil-by-guru') }}"
                style="display: flex; align-items: center; gap: 0.75rem; padding: 1rem; background: rgb(var(--color-primary-500)); border-radius: 0.75rem; text-decoration: none; box-shadow: 0 2px 10px rgba(0,0,0,0.15);">
                <span style="font-size: 1.5rem;">👤</span>
                <div>
                    <p style="font-weight: 700; color: rgb(var(--color-primary-700)); font-size: 0.9rem; margin: 0;">
                        Edit Profil</p>
                    <p style="font-size: 0.75rem; color: rgb(var(--gray-500)); margin: 0;">Ubah data profil saya</p>
                </div>
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
