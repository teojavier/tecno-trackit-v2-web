<?php

namespace App\Http\Livewire\Administrativo;

use App\Models\Mora;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class MoraIndex extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {
        $search = $this->search;

        $moras = Mora::join('messengers as MG', 'moras.messenger_id', '=', 'MG.id')
        ->join('users', 'MG.client_id', '=', 'users.id')      
        ->join('arrear_status as AR', 'moras.arrear_statu_id', '=', 'AR.id')      
        ->select(
            'moras.*',
            'users.name as client',
            'AR.name as arrear_statu'
        )
        ->where(function ($query) use ($search) {
            $query->whereRaw('LOWER("users"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("AR"."name") LIKE ?', ['%' . Str::lower($search) . '%']);
        })->orderBy('moras.id', 'asc')
        ->get();

        return view('livewire.administrativo.mora-index', compact('moras'));
    }
}
