<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Titulo vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model.live="titulo" :value="old('titulo')"
            placeholder="Titulo Vacante" />
        @error('titulo')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select wire:model.live="salario" id="salario"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
            <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
        @error('salario')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror

    </div>

    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select wire:model.live="categoria" id="categoria"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        @error('categoria')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror

    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model.live="empresa"
            :value="old('empresa')" placeholder="Empresa: ej. Netflix, Shopify, Uber..." />
        @error('empresa')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultima Dia Para Postularse')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model.live="ultimo_dia"
            :value="old('ultimo_dia')" />
        @error('ultimo_dia')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripcion del Puesto')" />
        <textarea wire:model.live="descripcion" id="descripcion"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1 h-72"
            placeholder="Descripcion general del puesto, experiencia..."></textarea>
        @error('descripcion')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model.live="imagen_nueva"
            accept="image/*" />

        <div class="flex gap-4 items-center">
            <div class="my-5 w-1/2">
                Imagen Actual:
                <img src="{{ asset('storage/public/vacantes/' . $imagen) }}" alt="{{ 'Imagen Vacante' . $titulo }}">
            </div>
            
            <div class="my-5 w-1/2">
                @if ($imagen_nueva)
                    Imagen Nueva:
                    <img src="{{ $imagen_nueva->temporaryUrl() }}">
                @endif
            </div>
        </div>

        @error('imagen_nueva')
            @livewire('mostrar-alerta', ['message' => $message])
        @enderror
    </div>

    <x-primary-button class="w-full justify-center">
        Guardar Cambios
    </x-primary-button>
</form>
