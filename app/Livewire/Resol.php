<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Oficio;

class Resol extends Component
{
    public function render()
    {
        return view('livewire.resol', [
            'oficio' => Oficio::where('tipo',2)->paginate()
        ]);
    }
}
