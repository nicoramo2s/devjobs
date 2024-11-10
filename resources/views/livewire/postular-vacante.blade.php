<div class="bg-gray-100 p-5 mt-10 flex justify-center flex-col items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>
    @if (session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 p-2 font-bold my-5 text-sm">
            {{ session('mensaje') }}
        </div>
    @else
        <form wire:submit.prevent='postularme()' action="" class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de vida (PDF)')" />
                <x-text-input id="cv" type="file" accept=".pdf" wire:model='cv' class="block mt-1 w-full" />
            </div>

            @error('cv')
                @livewire('mostrar-alerta', ['message' => $message])
            @enderror

            <x-primary-button class="my-5">
                {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif
</div>
