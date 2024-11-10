<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    public $termino;
    public $salario;
    public $categoria;
    protected $listeners = ["terminosBusqueda" => "buscar"];

    public function buscar($termino, $salario, $categoria)
    {
        $this->termino = $termino;
        $this->salario = $salario;
        $this->categoria = $categoria;
    }

    public function render()
    {
        // $vacantes = Vacante::all();

        $vacantes = Vacante::when($this->termino, function ($query) {
                $query->where("titulo", "LIKE", "%" . $this->termino . "%");
            })
            ->when($this->termino, function ($query) {
                $query->orWhere("empresa", "LIKE", "%" . $this->termino . "%");
            })
            ->when($this->categoria, function ($query) {
                $query->where("categoria_id", "LIKE", "%" . $this->categoria . "%");
            })
            ->when($this->salario, function ($query) {
                $query->where("salario_id", "LIKE", "%" . $this->salario . "%");
            })
            ->paginate(10);

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
