<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\User;
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

    public function solicitarStore()
    {



        return view('administrativo.messenger.solicitar', compact('contador'));
    }
}
