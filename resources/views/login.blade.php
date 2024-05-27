<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio Sesion</title>

    <!-- Enlaces a los estilos CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('./vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('./vendors/base/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('./css/style.css')}}">
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
        .forgot-password {
        text-align: right;
        margin-right: 25px;
        }
        .forgot-password a {
        color: #ffffff;
        text-decoration: none;
        }
        .forgot-password a:hover {
        text-decoration: underline;
        }
        .login__field,
        .login__submit {
        width: 100%;
        }
        .login {
        display: flex;
        flex-direction: column;
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
                        <input type="text" class="login__input font-alt" placeholder="Email" name="email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input font-alt" placeholder="Password" name="password">
                    </div>
                    <input type="submit" class="button login__submit font-alt" value="Iniciar Sesión"></input>
                </form>
                <div class="forgot-password">
                    <a href="">¿Has olvidado tu contraseña?</a>
                </div>
                <div class="social-login">
                    <img src="{{ asset('images/logof.png') }}" alt="Logo" class="logo-fun">
                    <div class="social-icons">
                        <a href="https://www.instagram.com/gabinetedesanacion/" class="social-login__icon fab fa-instagram" target="_blank"></a>
                        <a href="https://www.facebook.com/profile.php?id=100089761086195" class="social-login__icon fab fa-facebook" target="_blank"></a>
                        <a href="https://www.tiktok.com/@gabinete_de_sanacion" class="social-login__icon fab fa-tiktok" target="_blank"></a>
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
