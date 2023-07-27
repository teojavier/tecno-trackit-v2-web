<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Messenger;
use App\Models\Mora;
use App\Models\Page;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CMessegerController extends Controller
{
    public function solicitudes()
    {
        $page = Page::where('view', 'messengers.clientes.solicitudes')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('cliente.messenger.solicitudes', compact('contador'));
    }

    public function recomendaciones()
    {
        $page = Page::where('view', 'messengers.clientes.recomendaciones')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('cliente.messenger.recomendaciones', compact('contador'));
    }

    public function reclamos()
    {
        $page = Page::where('view', 'messengers.clientes.reclamos')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('cliente.messenger.reclamos', compact('contador'));
    }

    public function solicitar()
    {
        $page = Page::where('view', 'messengers.clientes.solicitudes.solicitar')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        $soportes = User::role('administrativo')->get();
        $categorias = Category::all();

        return view('cliente.messenger.solicitar', compact('soportes', 'categorias', 'contador'));
    }

    public function solicitarStore(Request $request)
    {
        $request->validate([
            'support' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $solicitud = Messenger::create([
            'description' => $request->description,
            'date_request' => Carbon::now(),
            'support_id' => $request->support,
            'client_id' => auth()->user()->id,
            'categorie_id' => $request->category,
            'messenger_type_id' => 1,
            'messenger_status_id' => 1,
            'table' => 'messengers',
            'redirect' => '/messengers/solicitudes',
        ]);

        Mora::create([
            'arrear_statu_id' => 1,
            'messenger_id' => $solicitud->id,
            'table' => 'moras',
            'redirect' => '/moras',
        ]);


        return redirect()->route('messengers.clientes.solicitudes')->with('success', 'Solicitud Registrada Exitosamente.');
    }

    public function recomendar()
    {
        $page = Page::where('view', 'messengers.clientes.recomendaciones.recomendar')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        $soportes = User::role('administrativo')->get();
        $categorias = Category::all();

        return view('cliente.messenger.recomendar', compact('soportes', 'categorias', 'contador'));
    }

    public function recomendarStore(Request $request)
    {
        $request->validate([
            'support' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $solicitud = Messenger::create([
            'description' => $request->description,
            'date_request' => Carbon::now(),
            'support_id' => $request->support,
            'client_id' => auth()->user()->id,
            'categorie_id' => $request->category,
            'messenger_type_id' => 2,
            'messenger_status_id' => 1,
            'table' => 'messengers',
            'redirect' => '/messengers/recomendaciones',
        ]);

        return redirect()->route('cliente.recomendaciones')->with('success', 'Recomendacion Registrada Exitosamente.');
    }

    public function reclamar()
    {
        $page = Page::where('view', 'messengers.clientes.reclamos.reclamar')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        $soportes = User::role('administrativo')->get();
        $categorias = Category::all();

        return view('cliente.messenger.reclamar', compact('soportes', 'categorias', 'contador'));
    }

    public function reclamarStore(Request $request)
    {
        $request->validate([
            'support' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $solicitud = Messenger::create([
            'description' => $request->description,
            'date_request' => Carbon::now(),
            'support_id' => $request->support,
            'client_id' => auth()->user()->id,
            'categorie_id' => $request->category,
            'messenger_type_id' => 3,
            'messenger_status_id' => 1,
            'table' => 'messengers',
            'redirect' => '/messengers/reclamos',
        ]);

        return redirect()->route('messengers.clientes.reclamos')->with('success', 'Reclamo Registrada Exitosamente.');
    }
}
