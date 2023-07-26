<?php

namespace App\Http\Livewire\Administrativo;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaIndex extends Component
{

    protected $listeners = ['eventDestroyCategoryAccept'];

    public $search = '';
    use WithPagination;

    public function eventDestroyCategory($id){
        $category = Category::find($id);
        $this->emit('event-destroy-category', $category);
    }

    public function eventDestroyCategoryAccept($id){
        $user = Category::find($id);
        $user->delete();
    }

    public function render()
    {
        $categorias = Category::where('name', 'LIKE' , '%' . $this->search . '%')
         ->orWhere('time', 'LIKE' , '%' . $this->search . '%')
         ->get();
        return view('livewire.administrativo.categoria-index', compact('categorias'));
    }
}
