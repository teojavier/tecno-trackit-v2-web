<?php

namespace App\Http\Livewire\Administrativo;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

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
        $search = $this->search;

        $usuarios = User::join('departments', 'departments.id', 'users.department_id')
        ->select(
            'users.*',
            'departments.name as department',
        )
        ->where(function ($query)  use ($search){
            $query->whereRaw('LOWER("users"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
            ->orWhereRaw('LOWER("users"."email") LIKE ?', ['%' . Str::lower($search) . '%'])
            ->orWhereRaw('LOWER("users"."phone") LIKE ?', ['%' . Str::lower($search) . '%'])
            ->orWhereRaw('LOWER("departments"."name") LIKE ?', ['%' . Str::lower($search) . '%']);
        })->orderBy('id', 'asc')
        ->get();

        return view('livewire..administrativo.usuario-index', compact('usuarios'));
    }
}
