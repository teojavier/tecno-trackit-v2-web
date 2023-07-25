<?php

namespace App\Http\Livewire\Administrativo;

use Livewire\Component;
use Livewire\WithPagination;

class ReclamosIndex extends Component
{

    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.administrativo.reclamos-index');
    }
}
