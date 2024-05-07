<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio Sesion</title>
    <link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}">
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
                <img src="{{ asset('images/logo gav.png') }}" alt="Logo" class="logo-gav">

                <form class="login" method="POST">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="Email" name="email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="password">
                    </div>
                    <input type="submit" class="button login__submit" value="Iniciar Sesión">
                        <i class="button__icon fas fa-chevron-right"></i>
                    </input>
                </form>
                <div class="social-login">
                    <img src="{{ asset('images/logof.png') }}" alt="Logo" class="logo-fun">
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
</body>
</html>