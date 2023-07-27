@extends('layouts.sidebar')

    @section('content')

    <div class="px-3 py-5">
        <div class="text-start flex">
            <h2 class="text-lg font-bold text-primary-dark dark:text-light">Mensajería / Cliente / Solicitudes / Ver ({{$contador}})</h2>
        </div>
    </div>
    <div class="text-center">
        <h2 class="text-2xl font-bold text-primary-dark dark:text-light mb-3">Solicitud #ID -> {{ $solicitud->id }}</h2>
    </div>

    @livewire('cliente.solicitudes-show', [$solicitud->id])

    @endsection
