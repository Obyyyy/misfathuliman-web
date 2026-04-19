<x-filament-widgets::widget>
    <x-filament::section>
        <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">

            {{-- Kiri: Label + Input --}}
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div
                    style="
                    width: 2.5rem; height: 2.5rem;
                    border-radius: 0.6rem;
                    background: rgb(var(--color-primary-500));
                    display: flex; align-items: center; justify-content: center;
                    font-size: 1.1rem; flex-shrink: 0;
                ">
                    📅</div>
                <div>
                    <p
                        style="font-size: 0.72rem; font-weight: 600; color: rgb(var(--gray-400)); text-transform: uppercase; letter-spacing: 0.06em; margin: 0 0 0.2rem 0;">
                        Filter Tanggal Absensi
                    </p>
                    <input type="date" wire:model.live="tanggal" max="{{ today()->toDateString() }}"
                        style="
                            padding: 0.45rem 0.75rem;
                            border-radius: 0.5rem;
                            border: 1.5px solid rgb(var(--color-primary-400));
                            background: transparent;
                            color: rgb(var(--gray-900));
                            font-size: 0.875rem;
                            font-weight: 600;
                            outline: none;
                            cursor: pointer;
                            min-width: 160px;
                        ">
                </div>
            </div>

            {{-- Kanan: Tanggal terpilih --}}
            <div
                style="
                display: flex; align-items: center; gap: 0.5rem;
                padding: 0.6rem 1.1rem;
                background: rgb(var(--color-primary-50));
                border: 1.5px solid rgb(var(--color-primary-200));
                border-radius: 0.6rem;
            ">
                <span style="font-size: 0.8rem; color: rgb(var(--gray-400));">Menampilkan:</span>
                <span style="font-size: 0.9rem; font-weight: 700; color: rgb(var(--color-primary-600));">
                    {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}
                </span>
            </div>

        </div>
    </x-filament::section>
</x-filament-widgets::widget>
