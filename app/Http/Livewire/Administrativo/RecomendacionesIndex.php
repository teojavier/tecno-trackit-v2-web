<?php

namespace App\Http\Livewire\Administrativo;

use Livewire\Component;
use Livewire\WithPagination;

class RecomendacionesIndex extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        return view('livewire.administrativo.recomendaciones-index');
    }
}
