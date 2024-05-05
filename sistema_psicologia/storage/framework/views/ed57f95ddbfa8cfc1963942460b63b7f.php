<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio Sesion</title>
    <link rel="stylesheet" href="<?php echo e(asset('./assets/css/style.css')); ?>">
    <!-- Agrega estilos CSS personalizados si es necesario -->
    <style>
        .logo {


            position: absolute;
            top: -20px;
            left: -10px;
            width: 270px; /* Ajusta el ancho según sea necesario */
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <!-- Agrega el logo aquí -->
                <img src="<?php echo e(asset('images/logo gav.png')); ?>" alt="Logo" class="logo">

                <form class="login" method="POST">
                    <?php echo csrf_field(); ?>
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
                    <h3>FUNDACIÓN EDUCAR PARA LA VIDA</h3>
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
<?php /**PATH C:\laragon\www\sistema_psicologia\resources\views/login.blade.php ENDPATH**/ ?>