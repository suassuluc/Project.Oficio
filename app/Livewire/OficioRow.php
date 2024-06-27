<?php

namespace App\Livewire;

use App\Models\Oficio;
use Livewire\Component;
use Carbon\Carbon;

class OficioRow extends Component
{
    public $oficio;

    public $ichecked;

    public $numero_counter = 0;

    public function processMark(Oficio $oficio)
    {
        if ($this->ichecked) {
            $this->oficio->autorizado = true;
            $currentYear = Carbon::now()->year;
            if (is_null($this->oficio->numero) || $this->oficio->numero == 0) {
                $this->numero_counter = Oficio::whereYear('created_at', $currentYear)->max('numero') + 1;
                $this->oficio->numero = $this->numero_counter;
            }
        } else {
            $this->oficio->autorizado = false;
            // $this->oficio->numero_oficio = null;
        }

        $this->oficio->save();
    }

    public function mount(Oficio $oficio)
    {
        $this->ichecked = $oficio->autorizado == 'sim' ? true : false;
    }
    public function render()
    {
        return view('livewire.oficio-row');
    }
}
