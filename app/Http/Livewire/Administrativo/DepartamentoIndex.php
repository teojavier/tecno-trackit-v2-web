<?php

namespace App\Http\Livewire\Administrativo;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartamentoIndex extends Component
{
    protected $listeners = ['eventDestroyDepartmentAccept'];

    public $search = '';
    use WithPagination;

    public function eventDestroyDepartment($id){
        $Deparment = Department::find($id);
        $this->emit('event-destroy-department', $Deparment);
    }

    public function eventDestroyDepartmentAccept($id){
        $user = Department::find($id);
        $user->delete();
    }
    
    public function render()
    {
        $departamentos = Department::where('name', 'LIKE' , '%' . $this->search . '%')
        ->get();
        return view('livewire.administrativo.departamento-index', compact('departamentos'));
    }
}
