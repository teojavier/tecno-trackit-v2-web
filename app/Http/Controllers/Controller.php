<?php

namespace App\Http\Controllers;

use App\Models\Messenger;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $results = Messenger::join('messengers_types as MT', 'MT.id', '=', 'messengers.messenger_type_id')
            ->select('MT.name as tipo', DB::raw('COUNT(*) as contador'))
            ->groupBy('MT.name')
            ->get();

        $results2 = Messenger::join('users as U', 'U.id', '=', 'messengers.client_id')
            ->join('departments as D', 'D.id', '=', 'U.department_id')
            ->select('D.name as departamento', DB::raw('COUNT(*) as contador'))
            ->groupBy('D.name')
            ->get();

        // Consulta 2
        $results3 = Messenger::join('users as U', 'U.id', '=', 'messengers.support_id')
            ->where('messengers.messenger_type_id', 1)
            ->select('U.name as soporte', DB::raw('COUNT(*) as contador'))
            ->groupBy('U.name')
            ->get();

        // Consulta 3
        $results4 = Messenger::join('categories as C', 'C.id', '=', 'messengers.categorie_id')
            ->join('messengers_types as MT', 'MT.id', '=', 'messengers.messenger_type_id')
            ->select('C.name as categoria', 'MT.name', DB::raw('COUNT(*) as contador'))
            ->groupBy('C.name', 'MT.name')
            ->orderBy('C.name')
            ->get();

        $users = User::count();

        $solicitudes = Messenger::where('messenger_type_id', 1)->count();
        $recomendaciones = Messenger::where('messenger_type_id', 2)->count();
        $reclamos = Messenger::where('messenger_type_id', 3)->count();

        $aceptados = Messenger::where('messenger_type_id', 1)->where('messenger_status_id', 2)->count();
        $finalizados = Messenger::where('messenger_type_id', 1)->where('messenger_status_id', 3)->count();



        return view('dashboard', compact('results', 'results2', 'results3', 'results4', 'users', 'solicitudes', 'recomendaciones', 'reclamos', 'aceptados', 'finalizados'));
    }
}
