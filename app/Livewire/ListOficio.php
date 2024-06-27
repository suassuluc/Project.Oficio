<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Oficio;
use App\Models\User;


class ListOficio extends Component
{

    public function render()
    {

        return view('livewire.list-oficio', [
            'oficio' => Oficio::where('tipo',1)->paginate()
        ]);
    }
}
