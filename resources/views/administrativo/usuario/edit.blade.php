@extends('layouts.sidebar')

@section('content')
    <div class="px-3 py-5">
        <div class="text-start flex">
            <h2 class="text-lg font-bold text-primary-dark dark:text-light">Usuarios / Editar ({{ $contador }})</h2>
        </div>
    </div>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        <div>
            <div class="grid grid-cols-3 px-4">
                <div class="pr-3">
                    <label class="font-bold " for="">Nombre Completo:</label>
                    <input class="rounded-lg focus:outline-none w-full text-black" type="text" name="name"
                        id="name" value="{{ $user->name }}">
                    @error('name')
                        <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                    @enderror
                </div>
                <div class="pr-3">
                    <label class="font-bold " for="">Correo:</label>
                    <input class="rounded-lg focus:outline-none w-full text-black" type="text" name="email"
                        id="email" value="{{ $user->email }}">
                    @error('email')
                        <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                    @enderror
                </div>
                <div class="pr-3">
                    <label class="font-bold " for="">Telefono:</label>
                    <input class="rounded-lg focus:outline-none w-full text-black" type="text" name="phone"
                        id="phone" value="{{ $user->phone }}">
                    @error('phone')
                        <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-3 px-4 pt-5">
                <div class="pr-3">
                    <label class="font-bold " for="">Contraseña:</label>
                    <input type="password" class="rounded-lg focus:outline-none w-full text-black" name="password"
                        id="password">
                    @error('password')
                        <span class="text-left text-red-500 ">Inserte Datos Correctos</span>
                    @enderror
                </div>
                <div class="col-span-1 mr-10">
                    <div class="relative z-0 w-full mb-6 group">
                        @foreach ($roles as $rol)
                            <div class="">
                                <label for="{{ $rol->name }}">
                                    <input id="{{ $rol->name }}" value="{{ $rol->id }}" type="radio"
                                        name="check[]" {{ $user->hasRole($rol->name) ? 'checked' : '' }}>
                                    {{ $rol->name }}
                                </label>
                            </div>
                        @endforeach
                        @error('check')
                            <span class="text-left text-red-500 ">Marca un rol</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-1 ml-3">
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
