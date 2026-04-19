{{-- resources/views/filament/pages/export-absensi-page.blade.php --}}
<x-filament-panels::page>
    <x-filament::section heading="Filter Data Export">
        <form wire:submit="export">
            {{ $this->form }}

            <div style="margin-top: 1.5rem;">
                {{ $this->exportAction }}
            </div>
        </form>
    </x-filament::section>
</x-filament-panels::page>
