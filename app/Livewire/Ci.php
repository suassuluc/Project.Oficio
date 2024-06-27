<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Oficio;

class Ci extends Component
{
    public function render()
    {
        return view('livewire.ci', [
            'oficio' => Oficio::where('tipo',3)->paginate()
        ]);
    }
}
