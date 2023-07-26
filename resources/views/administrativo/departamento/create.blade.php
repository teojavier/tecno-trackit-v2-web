@extends('layouts.sidebar')

@section('content')
    <div class="px-3 py-5">
        <div class="text-start flex">
            <h2 class="text-lg font-bold text-primary-dark dark:text-light">Departamentos / Crear ({{ $contador }})</h2>
        </div>
    </div>

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div>
            <div class="grid grid-cols-3 px-4">
                <div class="pr-3">
                    <label class="font-bold " for="">Nombre Departamento:</label>
                    <input class="rounded-lg focus:outline-none w-full text-black" type="text" name="name"
                        id="name">
                    @error('name')
                        <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                    @enderror
                </div>
                
            </div>
            <div class="mt-3 ml-3">
                <button onclick="enviarFormulario()"
                    class="rounded-lg px-3 py-2 bg-primary text-white font-bold dark:text-light transform transition hover:scale-105 duration-300 ease-in-out">
                    Guardar
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
