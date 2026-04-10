<x-filament-panels::page>
    <x-filament::section>
        <form wire:submit="save">
            {{ $this->form }}
        </form>
    </x-filament::section>

    <div>
        <x-filament::button wire:click="save">
            Simpan Perubahan
        </x-filament::button>
    </div>
</x-filament-panels::page>
