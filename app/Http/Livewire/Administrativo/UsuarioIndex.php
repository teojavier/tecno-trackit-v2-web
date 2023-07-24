<?php

namespace App\Http\Livewire\Administrativo;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsuarioIndex extends Component
{

    public $search = '';
    use WithPagination;

    public function render()
    {
        // $usuarios = User::where('idUser', auth()->user()->id)->where('name', 'LIKE' , '%' . $this->search . '%')->get();
        $usuarios = User::all();

        return view('livewire..administrativo.usuario-index', compact('usuarios'));
    }
}
