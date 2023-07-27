@extends('layouts.sidebar')

@section('content')
    <div class="px-3 py-5">
        <div class="text-start flex">
            <h2 class="text-lg font-bold text-primary-dark dark:text-light">Mensajeria / Clientes / Recomendaciones / recomendar
                ({{ $contador }})</h2>
        </div>
    </div>

    <form action="{{ route('messengers.recomendaciones.recomendar.store') }}" method="POST">
        @csrf
        <div>
            <div class="grid grid-cols-3 px-4">
                <div class="pr-3">
                    <label class="font-bold " for="">Soporte:</label>
                    <select name="support" id="support" 
                        class="m-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">-- Escoja una opcion --</option>
                        @foreach ($soportes as $soporte)
                        <option value="{{ $soporte->id }}">{{ $soporte->name }}</option>
                        @endforeach
                    </select>
                    @error('support')
                        <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                    @enderror
                </div>
                <div class="pr-3">
                    <label class="font-bold " for="">Categoria:</label>
                    <select name="category" id="category" 
                        class="m-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">-- Escoja una opcion --</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                        @endforeach
                    </select>
                    @error('support')
                        <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-3 px-4 pt-5">
                <div class="pr-3 col-span-2">
                        <label class="font-bold " for="">Descripción:</label>
                        <textarea class="w-full" name="description" id="" cols="30" rows="5"></textarea>
                    @error('description')
                        <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                    @enderror
                </div>

            </div>
            <div class="mt-1 ml-3">
                <button onclick="enviarFormulario()"
                    class="rounded-lg px-3 py-2 bg-primary text-white font-bold dark:text-light transform transition hover:scale-105 duration-300 ease-in-out">
                    Solicitar
                </button>
            </div>
        </div>
    </form>

    <script>
        function enviarFormulario() {
            document.getElementById("miFormulario").submit();
        }
    </script>
@endsection
