<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Messenger;
use App\Models\Messenger_statu;
use App\Models\Messenger_type;
use App\Models\Page;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
    public function solicitudes()
    {
        $page = Page::where('view', 'messengers.solicitudes')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('administrativo.messenger.solicitudes', compact('contador'));
    }

    public function recomendaciones()
    {
        $page = Page::where('view', 'messengers.recomendaciones')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('administrativo.messenger.recomendaciones', compact('contador'));
    }

    public function reclamos()
    {
        $page = Page::where('view', 'messengers.reclamos')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('administrativo.messenger.reclamos', compact('contador'));
    }

    public function solicitar()
    {
        $page = Page::where('view', 'messengers.solicitudes.solicitar')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        $soportes = User::role('administrativo')->get();
        $categorias = Category::all();

        return view('administrativo.messenger.solicitar', compact('soportes', 'categorias', 'contador'));
    }

    public function solicitudShow($id)
    {
        $page = Page::where('view', 'messengers.solicitudes.show')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        $solicitud = Messenger::find($id);

        return view('administrativo.messenger.solicitudShow', compact('contador', 'solicitud'));
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

        return redirect()->route('messengers.solicitudes')->with('success', 'Solicitud Registrada Exitosamente.');
    }
}
