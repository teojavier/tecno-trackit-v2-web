<?php

namespace App\Http\Livewire\Administrativo;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsuarioIndex extends Component
{

    protected $listeners = ['eventDestroyUserAccept'];

    public $search = '';
    use WithPagination;

    public function eventDestroyUser($id){
        $user = User::find($id);
        $this->emit('event-destroy-user', $user);
    }

    public function eventDestroyUserAccept($id){
        $user = User::find($id);
        $user->delete();
    }

    public function render()
    {
         $usuarios = User::where('name', 'LIKE' , '%' . $this->search . '%')
         ->orWhere('email', 'LIKE' , '%' . $this->search . '%')
         ->orWhere('phone', 'LIKE' , '%' . $this->search . '%')
         ->get();

        return view('livewire..administrativo.usuario-index', compact('usuarios'));
    }
}
