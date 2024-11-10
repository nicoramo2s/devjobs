<div class="p-10">
    <div class="mb-5">
        <h1 class="font-bold text-3xl text-gray-800 my-3">{{ $vacante->titulo }}</h1>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa: <span
                    class="normal-case font-normal">{{ $vacante->empresa }}</span></p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Ultimo dia para postularse: <span
                    class="normal-case font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span></p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoria: <span
                    class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span></p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario: <span
                    class="normal-case font-normal">{{ $vacante->salario->salario }}</span></p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-5">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/public/vacantes/' . $vacante->imagen) }}" alt="imagen {{ $vacante->titulo }}">
        </div>

        <div class="md:col-span-4">
            <h2 class="font-bold text-2xl mb-5">Descripcion del Puesto</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>
    @guest
        <div class="mt-5 border-dashed border p-5 bg-gray-50 text-center">
            ¿Deseas aplicar a esta vacante? <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obten una
                cuenta para aplicar a esta y otras vacantes </a>
        </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        @livewire('postular-vacante', ['vacante' => $vacante])
    @endcannot
</div>
