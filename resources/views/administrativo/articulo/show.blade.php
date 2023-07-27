@extends('layouts.sidebar')

@section('content')
    <div class="px-3 py-5">
        <div class="text-start flex">
            <h2 class="text-lg font-bold text-primary-dark dark:text-light">Articulos / Mostrar ({{ $contador }})</h2>
        </div>
    </div>

    <div class="bg-white m-5 p-5 rounded-lg text-black">
        <div class="flex justify-between">
            <div>
                <h1 class="font-bold uppercase">{{ $articulo->title }}</h1>
            </div>
            <div>
                <h1 class="bg-primary rounded-lg mr-5 px-3 py-2 font-bold">{{ $cate->name }}</h1>
            </div>
        </div>
        <div class="mt-5">
            {!! $articulo->content !!}
        </div>
    </div>
@endsection
