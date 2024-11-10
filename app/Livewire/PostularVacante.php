<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules = [
        "cv" => "required|mimes:pdf",
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        //Alamacenar el cv
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        //Crear la vacante
        $this->vacante->candidatos()->create([
            'user_id' => Auth::user()->id,
            'cv' => $datos['cv'],
        ]);

        //Crear notificacion y enviar email
        $this->vacante->reclutador->notify(new NuevoCandidato(
            $this->vacante->id,
            $this->vacante->titulo,
            Auth::user()->id
        ));
        // Mostrar una mensaje de OK
        session()->flash('mensaje', 'Se envio correctamente tu informacion, Buena Suerte!');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
