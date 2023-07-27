<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Booking </title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
</head>

<body class="bg-white font-family-karla h-screen">

    <div class="w-full flex flex-wrap">



        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="{{ asset('image/agro.jpg') }}">
        </div>

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <a href="{{ url('/') }}" class="bg-gray-300 text-white font-bold text-xl p-4 rounded-lg">
                    <img class="w-10 h-10" src="{{ asset('image/logo.png') }}" alt="Logo">
                </a>
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">TrackIT - Agropartners</p>

                <form class="flex flex-col pt-3 md:pt-8" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg">Correo Electronico</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            placeholder="your@email.com"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Contraseña</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            placeholder="********"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <input type="submit" value="Iniciar Sesion"
                        class="bg-green-700 text-white font-bold text-lg hover:bg-green-500 p-2 mt-8 rounded-full">
                </form>
                <div class="text-center pt-12 pb-12">
                </div>
            </div>

        </div>
    </div>

</body>

</html>
