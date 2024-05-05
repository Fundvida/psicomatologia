<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AGENDAR CITA</title>
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
        /* Estilos personalizados para el textarea */

    </style>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <!-- Logo a la izquierda -->
                <a class="navbar-brand fw-bold" href="#page-top">
                    <img src="{{ asset('images/logo gav2.png') }}" alt="Logo" style="height: 100px">
                </a>

                <!-- Botón para colapsar el navbar en dispositivos pequeños -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menú
                    <i class="bi-list"></i>
                </button>

                <!-- Contenido del navbar: enlaces y botón de enviar feedback
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-4 my-lg-1">
                        <li class="nav-item mb-3 me-3">
                            <a class="btn btn-outline-primary btn-lg btn-paso1 rounded-pill fw-bold" href="#features">ÁREA DE MIEMBROS</a>
                        </li>
                    </ul>
                </div>-->
            </div>
        </nav>

            <!-- Contenido principal -->
            <section class="py-5 d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 100px); margin-top: 100px;" id="agendarCita2">
                <div class="container px-5 text-center shadow-lg p-5 rounded mt-2">
                    <!-- Título "Agende su cita inicial" -->
                    <h2 class="display-3 lh-1 mb-3 font-alt">Agende su cita</h2>
                    <!-- Descripción "complete sus datos" -->
                    <p class="lead fw-normal text-muted mb-5 ttNorms">Complete el formulario para programar su consulta.</p>
                    <!-- Pasos de secuencia -->
                    <div class="row mb-5">
                        <div class="col">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-1-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-2-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-3-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-4-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-5-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr class="my-5 mx-auto" style="border: 1px solid #000000; width: 100%;">

                    <h2 class="text-start mb-4 font-alt">Seleccione el Psicólogo</h2>

                    <!-- Descripción "Seleccione el servicio por el que está interesado/a." alineada a la izquierda -->
                    <p class="text-start lead fw-normal text-muted mb-5 ttNorms">Por favor revisa la lista y selecciona al Psicólogo en disponibilidad de su preferencia.</p>

                    <div class="table-responsive mb-5">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Disponibilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Psicólogo 1</td>
                                    <td>Sí</td>
                                    <td><button class="btn btn-primary btn-paso1 fw-bold btn-select-psicologo">Seleccionar</button></td>
                                </tr>
                                <tr>
                                    <td>Psicólogo 2</td>
                                    <td>No</td>
                                    <td><button class="btn btn-primary btn-paso1 fw-bold btn-select-psicologo">Seleccionar</button></td>
                                </tr>
                                <tr>
                                    <td>Psicólogo 3</td>
                                    <td>No</td>
                                    <td><button class="btn btn-primary btn-paso1 fw-bold btn-select-psicologo">Seleccionar</button></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="text-start">
                                <!-- Botón para volver al paso anterior -->
                                <button type="button" class="btn btn-outline-secondary btn-lg btn-paso1 rounded-pill fw-bold" style="background-color: #FFFFFF; border-color: #EDB1B5; border-width: 4px; color: #000000;">Volver</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-end">
                                <!-- Botón para enviar al siguiente paso -->
                                <button type="submit" class="btn btn-outline-primary btn-lg btn-paso1 rounded-pill fw-bold">Siguiente Paso</button>
                            </div>
                        </div>
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
