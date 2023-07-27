@extends('layouts.sidebar')

@section('content')
    <div class="px-3 py-5">
        <div class="text-start flex">
            <h2 class="text-lg font-bold text-primary-dark dark:text-light">Articulos / Crear ({{ $contador }})</h2>
        </div>
    </div>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">

                <form action="{{ route('articles.store') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-5">
                        <div class="col-span-3">
                            <label class="font-bold " for="">Título:</label>
                            <input class="rounded-lg focus:outline-none w-full text-black" type="text" name="title"
                                id="title">
                            @error('title')
                                <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                            @enderror
                        </div>
                        <div class="col-span-1 ml-6">
                            <label class="font-bold " for="">Categoria:</label>
                            <select name="category" id="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- Escoja una opcion --</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                            @enderror
                        </div>
                        <div class="col-span-1 mt-6 ml-6">
                            <button onclick="enviarFormulario()"
                                class="rounded-lg px-3 py-2 bg-primary text-white font-bold dark:text-light transform transition hover:scale-105 duration-300 ease-in-out">
                                Guardar
                            </button>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="font-bold " for="">Descripción:</label>
                        <textarea name="content" id="summary-ckeditor" cols="30" rows="10"></textarea>
                        @error('content')
                            <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                        @enderror
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('summary-ckeditor', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        function enviarFormulario() {
            document.getElementById("miFormulario").submit();
        }
    </script>
@endsection
