<?php

namespace App\Livewire;

use App\Models\Vacante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarVacantes extends Component
{
    use WithPagination;

    #[On('eliminarVacante')]
    public function eliminarVacante(Vacante $vacanteId)
    {
        $vacanteId->delete();
    }
    public function render()
    {
        $vacantes = Vacante::where('user_id', Auth::user()->id)->paginate(10);
        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes,
        ]);
    }
}
