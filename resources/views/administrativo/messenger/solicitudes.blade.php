@extends('layouts.sidebar')

    @section('content')

    <div class="px-3 py-5">
        <div class="text-start flex">
            <h2 class="text-lg font-bold text-primary-dark dark:text-light">Mensajería / Solicitudes ({{$contador}})</h2>
        </div>
    </div>

    @livewire('administrativo.solicitudes-index')

    @endsection
