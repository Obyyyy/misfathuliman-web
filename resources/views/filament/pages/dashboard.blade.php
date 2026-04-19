<x-filament-panels::page>

    @foreach ($this->getWidgets() as $widget)
        @php
            $needsReload = in_array($widget, [
                \App\Filament\Widgets\AdminStatsWidget::class,
                \App\Filament\Widgets\AdminRekapAbsensiWidget::class,
            ]);
        @endphp

        @if ($needsReload)
            <div x-data="{ visible: true }"
                x-on:tanggal-diubah.window="
                    visible = false;
                    $nextTick(() => {
                        setTimeout(() => visible = true, 50)
                    })
                ">
                <div x-show="visible" x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                    @livewire($widget, key($widget))
                </div>
            </div>
        @else
            @livewire($widget, key($widget))
        @endif
    @endforeach

</x-filament-panels::page>
