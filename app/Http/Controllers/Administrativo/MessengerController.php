<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Page;
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
}
