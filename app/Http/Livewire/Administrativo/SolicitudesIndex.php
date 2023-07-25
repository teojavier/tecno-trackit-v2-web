<?php

namespace App\Http\Livewire\Administrativo;

use App\Models\Messenger;
use Livewire\Component;
use Livewire\WithPagination;

class SolicitudesIndex extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {

        $solicitudes = Messenger::join('messengers_types as MT', 'messengers.messenger_type_id', '=', 'MT.id')
        ->join('messengers_status as MS', 'messengers.messenger_status_id', '=', 'MS.id')
        ->join('users as SU', 'messengers.support_id', '=', 'SU.id')
        ->join('users as CL', 'messengers.client_id', '=', 'CL.id')
        ->join('categories as CA', 'messengers.categorie_id', '=', 'CA.id')
        ->select(
            'messengers.*',
            'MT.name as type',
            'MS.name as status',
            'SU.name as support',
            'CL.name as client',
            'CA.name as categorie'
        )
        ->where('MT.id', 1)
        ->get();

        return view('livewire.administrativo.solicitudes-index', compact('solicitudes'));
    }
}
