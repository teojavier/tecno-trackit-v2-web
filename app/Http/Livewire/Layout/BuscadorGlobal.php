<?php

namespace App\Http\Livewire\Layout;

use App\Models\Category;
use App\Models\User;
use Livewire\Component;

class BuscadorGlobal extends Component
{
    public $search = '';

    public function render()
    {
        //$resultados = User::all();
        $usuarios = User::where('name', 'LIKE' , '%' . $this->search . '%')
        ->orWhere('phone', 'LIKE' , '%' . $this->search . '%')
        ->orWhere('email', 'LIKE' , '%' . $this->search . '%')
        ->select('id', 'table', 'redirect')
        ->get();

        $categorias = Category::where('name', 'LIKE' , '%' . $this->search . '%')
        ->orWhere('time', 'LIKE' , '%' . $this->search . '%')
        ->select('id', 'table', 'redirect')
        ->get();

        $resultados = $usuarios->union($categorias);
        return view('livewire..layout.buscador-global', compact('resultados'));
    }
}
