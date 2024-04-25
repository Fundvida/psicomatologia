<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio Sesion</title>
    <link rel="stylesheet" href="{{ asset('./assets/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Agrega estilos CSS personalizados si es necesario -->
    <style>
        .logo-gav {
            position: absolute;
            top: -20px;
            left: -10px;
            width: 270px; /* Ajusta el ancho según sea necesario */
            height: auto;
        }
        .logo-fun {
            position: absolute;
            top: 38px;
            left: -35px;
            width: 190px; /* Ajusta el ancho según sea necesario */
            height:auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <!-- Agrega el logo aquí -->
                <!-- <div class="logo-container">
                    <img src="{{ asset('assets/img/logo gav.png') }}" alt="Logo" class="logo-gav">
                </div> -->
                <form method="POST" action="">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="email" class="login__input" placeholder="Email" name="email" autocomplete="off">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" id="password" name="password">
                    </div>
                    <a href="#" data-toggle="modal" data-target="#ModalCreate" >Crear nueva cuenta</a>
                    <input type="submit" class="button login__submit" value="Iniciar Sesión">
                        <i class="button__icon fas fa-chevron-right"></i>
                    </input>
                </form>
                <div class="social-login">
                    <img src="{{ asset('assets/img/logof.png') }}" alt="Logo" class="logo-fun">
                    <div class="social-icons">
                        <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
    @include('auth.modal.create-user')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>