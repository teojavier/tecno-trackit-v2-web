@extends('layouts.sidebar')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/soporteia.css') }}">

    <div class="px-3 py-5">
        <div class="text-start flex">
            <h2 class="text-lg font-bold text-primary-dark dark:text-light">
                Soporte IA{{-- Usuarios / Crear ({{ $contador }}) --}}
            </h2>
        </div>
    </div>
    <div class="flex flex-row justify-between dark:bg-dark px-10 h-full chat-main">
        <!-- message -->
        @livewire('administrativo.chat-content')
        <!-- end message -->
        <div class="w-2/5 border-l-2 px-5">
            <div class="flex flex-col">
                <div class="font-semibold text-xl py-4">Mern Stack Group</div>
                <img src="https://source.unsplash.com/L2cxSuKWbpo/600x600" class="object-cover rounded-xl h-64"
                    alt="" />
                <div class="font-semibold py-4">GPT3.5 Modelo Davinci</div>
                <div class="font-light">
                    Conectado con: <span class="font-semibold">OpenAI</span>
                    <br/> Aqui puedes realizar cualquier consulta
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
