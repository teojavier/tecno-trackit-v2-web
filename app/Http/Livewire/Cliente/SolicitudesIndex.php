<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Messenger;
use App\Models\Mora;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class SolicitudesIndex extends Component
{
    public $search = '';
    use WithPagination;

    public function render()
    {

        $search = $this->search;

        $solicitudes = Messenger::join('messengers_types as MT', 'messengers.messenger_type_id', '=', 'MT.id')
        ->join('messengers_status as MS', 'messengers.messenger_status_id', '=', 'MS.id')
        ->join('users as SU', 'messengers.support_id', '=', 'SU.id')
        ->join('users as CL', 'messengers.client_id', '=', 'CL.id')
        ->join('categories as CA', 'messengers.categorie_id', '=', 'CA.id')
        ->leftJoin('moras as MO', 'messengers.id', '=', 'MO.messenger_id')
        ->leftJoin('arrear_status as AR', 'MO.arrear_statu_id', '=', 'AR.id')
        
        ->select(
            'messengers.*',
            'MT.name as type',
            'MS.name as status',
            'SU.name as support',
            'CL.name as client',
            'CA.name as categorie',
            'AR.name as arrear_statu'
        )
        ->where('MT.id', 1)
        ->where('messengers.client_id', auth()->user()->id)
        ->where(function ($query) use ($search) {
            $query->whereRaw('LOWER("MT"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("MS"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("SU"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("CL"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("messengers"."description") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("CA"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("AR"."name") LIKE ?', ['%' . Str::lower($search) . '%']);
        })->orderBy('messengers.messenger_status_id', 'asc')->orderBy('messengers.date_request', 'asc')
        ->get();

        return view('livewire..cliente.solicitudes-index', compact('solicitudes'));
    }
}
