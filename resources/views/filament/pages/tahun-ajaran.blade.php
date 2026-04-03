<x-filament-panels::page>
    <x-filament::section>
        <form wire:submit="save">
            {{ $this->form }}
        </form>

        <div style="margin-top: 0.5rem; padding-top: 1rem;">
            {{ $this->saveAction }}
        </div>
    </x-filament::section>
</x-filament-panels::page>
