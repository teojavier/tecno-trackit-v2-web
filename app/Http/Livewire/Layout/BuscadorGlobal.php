<?php

namespace App\Http\Livewire\Layout;

use App\Models\Article;
use App\Models\Category;
use App\Models\Department;
use App\Models\Messenger;
use App\Models\Mora;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;

class BuscadorGlobal extends Component
{
    public $search = '';

    public function render()
    {
        $search = $this->search;

        $usuarios = User::whereRaw('LOWER("users"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
        ->orWhereRaw('LOWER("users"."email") LIKE ?', ['%' . Str::lower($search) . '%'])
        ->orWhereRaw('LOWER("users"."phone") LIKE ?', ['%' . Str::lower($search) . '%'])
        ->select('id', 'table', 'redirect')
        ->get();

        $categorias = Category::whereRaw('LOWER("categories"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
        ->orWhere('categories.time', 'ILIKE', '%' . $search . '%')
        ->select('id', 'table', 'redirect')
        ->get();

        $departamentos = Department::whereRaw('LOWER("departments"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
        ->select('id', 'table', 'redirect')
        ->get();

        $solicitudes = Messenger::join('messengers_types as MT', 'messengers.messenger_type_id', '=', 'MT.id')
        ->join('messengers_status as MS', 'messengers.messenger_status_id', '=', 'MS.id')
        ->join('users as SU', 'messengers.support_id', '=', 'SU.id')
        ->join('users as CL', 'messengers.client_id', '=', 'CL.id')
        ->join('categories as CA', 'messengers.categorie_id', '=', 'CA.id')
        ->select('messengers.id', 'messengers.table', 'messengers.redirect')
        ->where('MT.id', 1)
        ->where(function ($query) use ($search) {
            $query->whereRaw('LOWER("MT"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("MS"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("SU"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("CL"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("messengers"."description") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("CA"."name") LIKE ?', ['%' . Str::lower($search) . '%']);
        })->get();

        $recomendaciones = Messenger::join('messengers_types as MT', 'messengers.messenger_type_id', '=', 'MT.id')
        ->join('messengers_status as MS', 'messengers.messenger_status_id', '=', 'MS.id')
        ->join('users as SU', 'messengers.support_id', '=', 'SU.id')
        ->join('users as CL', 'messengers.client_id', '=', 'CL.id')
        ->join('categories as CA', 'messengers.categorie_id', '=', 'CA.id')
        ->select('messengers.id', 'messengers.table', 'messengers.redirect')
        ->where('MT.id', 2)
        ->where(function ($query) use ($search) {
            $query->whereRaw('LOWER("MT"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("MS"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("SU"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("CL"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("messengers"."description") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("CA"."name") LIKE ?', ['%' . Str::lower($search) . '%']);
        })->get();

        $reclamos = Messenger::join('messengers_types as MT', 'messengers.messenger_type_id', '=', 'MT.id')
        ->join('messengers_status as MS', 'messengers.messenger_status_id', '=', 'MS.id')
        ->join('users as SU', 'messengers.support_id', '=', 'SU.id')
        ->join('users as CL', 'messengers.client_id', '=', 'CL.id')
        ->join('categories as CA', 'messengers.categorie_id', '=', 'CA.id')
        ->select('messengers.id', 'messengers.table', 'messengers.redirect')
        ->where('MT.id', 3)
        ->where(function ($query) use ($search) {
            $query->whereRaw('LOWER("MT"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("MS"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("SU"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("CL"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("messengers"."description") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("CA"."name") LIKE ?', ['%' . Str::lower($search) . '%']);
        })->get();

        $moras = Mora::join('messengers as MG', 'moras.messenger_id', '=', 'MG.id')
        ->join('users', 'MG.client_id', '=', 'users.id')      
        ->join('arrear_status as AR', 'moras.arrear_statu_id', '=', 'AR.id')      
        ->select('moras.id', 'moras.table', 'moras.redirect')
        ->where(function ($query) use ($search) {
            $query->whereRaw('LOWER("users"."name") LIKE ?', ['%' . Str::lower($search) . '%'])
                ->orWhereRaw('LOWER("AR"."name") LIKE ?', ['%' . Str::lower($search) . '%']);
        })->orderBy('moras.id', 'asc')
        ->get();

        $articulos = Article::join('categories', 'categories.id', 'articles.categorie_id' )
        ->whereRaw('LOWER("articles"."title") LIKE ?', ['%' . Str::lower($this->search) . '%'])
        ->orWhereRaw('LOWER("articles"."content") LIKE ?', ['%' . Str::lower($this->search) . '%'])
        ->select('articles.id', 'articles.table', 'articles.redirect')
        ->get();

        $resultados = $usuarios->union($categorias)->union($departamentos)->union($solicitudes)
        ->union($recomendaciones)->union($reclamos)->union($moras)->union($articulos);
        
        return view('livewire..layout.buscador-global', compact('resultados'));
    }
}
