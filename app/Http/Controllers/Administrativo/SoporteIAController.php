<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;

class SoporteIAController extends Controller
{
    public function index()
    {
        return view('administrativo.soporteia.chat');
    }

}
