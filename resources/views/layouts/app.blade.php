<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Laravel App</title>
    
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
  </head>
  <body class="bg-gray-100 text-gray-800">

    <nav class="bg-purple-300 flex justify-between items-center px-10 py-10">
      <img src="{{ asset('images/logoGabineteSanacionConducta.png') }}" alt="Imagen 1" width="300" height="200">
      <img src="{{ asset('images/logoFundacionEducar.png') }}" alt="Imagen 2" width="300" height="200">
    </nav>

    <nav class="flex py-5 bg-purple-300 text-white">

      <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
      @if(auth()->check())
        <li class="mx-8">
          <p class="text-xl">Bienvenido <b>{{ auth()->user()->name }}</b></p>
        </li>
        <li>
          <a href="{{ route('login.destroy') }}" class="font-bold
          py-3 px-4 rounded-md bg-red-500 hover:bg-red-600">Cerrar Sesión</a>
        </li>
      @else
        
      @endif
      </ul>

    </nav>


    @yield('content')


  </body>
</html>