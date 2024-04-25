<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Fundación Educar</title>
    
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      /* Anula el color predeterminado de los enlaces de Bootstrap */
      a {
          color: inherit !important;
          text-decoration: none !important;
      }
    </style>
  </head>
  <body class="bg-gray-100 text-gray-800">

    <header class="d-flex justify-content-between align-items-center p-5" style="background-color: rgba(196, 181, 253, var(--tw-bg-opacity));">
        <img src="{{ asset('images/logoGabineteSanacionConducta.png') }}" class="img-fluid" width="300" height="200">
        <img src="{{ asset('images/logoFundacionEducar.png') }}" class="img-fluid" width="300" height="200">
    </header>

    @if(auth()->check()) 
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <div class="mx-auto" id="navbarNav">
          <ul class="navbar-nav">
            @if (auth()->user()->hasRole('tutor'))
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">Inicio</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('registrarpaciente.index') }}" class="nav-link text-black" href="#">Registrar paciente</a>
              </li>
            @endif
            @if (auth()->user()->hasRole('administrador'))
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">Inicio</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('mntPsicologo.index') }}" class="nav-link" href="#">Registrar psicologo</a>
              </li>
            @endif
            @if (auth()->user()->hasRole('psicologo'))
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pacientes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#reservaModal">Agregar horarios</a>
              </li>
            @endif
            <li class="nav-item">
              <a href="{{ route('login.destroy') }}" class="nav-link active" aria-current="page">Cerrar Sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    @endif


    @yield('content')

    <!-- <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')
  </body>
</html>