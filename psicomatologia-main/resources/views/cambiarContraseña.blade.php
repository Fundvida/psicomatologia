<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CAMBIAR CONTRASEÑA</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>

    </head>

    <style>

    </style>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <!-- Logo a la izquierda -->
                <a class="navbar-brand fw-bold" href="#page-top">
                    <img src="{{ asset('images/logo gav2.png') }}" alt="Logo" style="height: 100px">
                </a>
            </div>
        </nav>

        <section class="py-5 d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 100px); margin-top: 100px;">
            <div class="container px-5 text-center shadow-lg p-5 rounded mt-2">
                <!-- Título -->
                <h2 class="display-3 lh-1 mb-4 font-alt">Cuenta de Usuario</h2>

                <!-- Pestañas -->
                <ul class="nav nav-tabs justify-content-center mb-4">
                    <li class="nav-item">
                        <a class="nav-link" href="#">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Seguridad</a>
                    </li>
                </ul>

                <!-- Recuadro  -->
                <div class="p-4 rounded shadow-lg">
                    <!-- Título "Cambiar contraseña" -->
                    <h3 class="mb-4 font-alt">Cambiar contraseña</h3>

                    <!-- Campos para la contraseña -->
                    <div class="mb-3 text-start">
                        <label for="currentPassword" class="form-label">Contraseña Actual</label>
                        <input type="password" class="form-control" id="currentPassword">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="newPassword" class="form-label">Nueva contraseña</label>
                        <input type="password" class="form-control" id="newPassword">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="confirmPassword" class="form-label">Confirmar Nueva contraseña</label>
                        <input type="password" class="form-control" id="confirmPassword">
                    </div>


                    <!-- Botón "Cambiar contraseña" -->
                    <button type="button" class="btn btn-outline-primary btn-lg btn-paso1 rounded-pill fw-bold">Cambiar contraseña</button>
                </div>
            </div>
        </section>








        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script src="js/hoverDescription.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
