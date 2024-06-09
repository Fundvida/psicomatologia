<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="css/styles.css" rel="stylesheet" />
    <!--CSS for anime css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        .btn-primary {
            background-color: #edb1b5;
            border-color: #edb1b5;
        }

        .btn-primary:hover {
            background-color: #cc848a;
            border-color: #cc848a;
        }

        .payment-options {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .option {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            width: 200px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .option:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }

        .option i {
            font-size: 3rem;
            margin-bottom: 15px;
            transition: color 0.3s;
        }

        .option h3 {
            margin: 10px 0;
            color: #444;
            font-family: 'Kanit', sans-serif;
            transition: color 0.3s;
        }

        .option p {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 0;
            transition: color 0.3s;
        }

        .option input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
            margin: 0;
            padding: 0;
            border: none;
            cursor: pointer;
        }

        /* Este es el cambio clave */
        .option:has(input:checked) {
            background-color: #edb1b5;
            color: white;
            box-shadow: 0 6px 8px rgba(237, 177, 181, 0.5);
        }

        .option:has(input:checked) i,
        .option:has(input:checked) h3,
        .option:has(input:checked) p {
            color: white;
        }

        /**.errorForm */
        .error-form {
            font-style: italic;
            color: red;
            font-weight: bold;
            font-size: small;
        }

        /** CARDS BOOTSTRAP */
        .testimonial-card .card-up {
            height: 70px;
            overflow: hidden;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
        }

        .aqua-gradient {
            /* background: linear-gradient(40deg, #2096ff, #05ffa3) !important; */
            /* background: linear-gradient(40deg,#9d3fb7,#cd99dc); */
            background: linear-gradient(40deg, #1f7f85, #d2e5e6);
        }

        .resumen-campos {
            font-size: 0.8rem;
        }

        .testimonial-card .avatar {
            width: 120px;
            margin-top: -60px;
            overflow: hidden;
            border: 5px solid #fff;
            border-radius: 50%;
        }

        /**Multi-step */
        .upe-mutistep-form .step {
            display: none;
        }

        .upe-mutistep-form .step-header .steplevel {
            position: relative;
            flex: 1;
            padding-bottom: 30px;
        }

        .upe-mutistep-form .step-header .steplevel.active {
            font-weight: 600;
        }

        .upe-mutistep-form .step-header .steplevel.finish {
            font-weight: 600;
            color: #009688;
        }

        .upe-mutistep-form .step-header .steplevel::before {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            z-index: 9;
            width: 20px;
            height: 20px;
            background-color: #d5efed;
            border-radius: 50%;
            border: 3px solid #ecf5f4;
        }

        .upe-mutistep-form .step-header .steplevel.active::before {
            background-color: #3fbdb4;
            border: 3px solid #d5f9f6;
        }

        .upe-mutistep-form .step-header .steplevel.finish::before {
            background-color: #3fbdb4;
            border: 3px solid #3fbdb4;
        }

        .upe-mutistep-form .step-header .steplevel::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 8px;
            width: 100%;
            height: 3px;
            background-color: #f3f3f3;
        }

        .upe-mutistep-form .step-header .steplevel.active::after {
            background-color: #a7ede8;
        }

        .upe-mutistep-form .step-header .steplevel.finish::after {
            background-color: #009688;
        }

        .upe-mutistep-form .step-header .steplevel:last-child:after {
            display: none;
        }

        /**Calendario */
        #calendario {
            max-width: 100%;
            /* width:100%; */
            /* height: 100%; */
            margin: 5px auto;
        }

        @media (max-width:1920px) {
            #calendario {

                max-width: 100%;
                width: 80%;

                /* margin: 0px; */
            }

            .calendario-container {
                margin-left: 0rem;
                margin-right: 0rem;
                padding: 0 0;
            }

            /* Remove underline from day names */
            .fc .fc-col-header-cell-cushion {
                text-decoration: none;
            }

            /* Change cursor to pointer when hovering over events */
            .fc .fc-event {
                cursor: pointer;
            }

            .fc-dayGridDay.fc-day {
                height: 50px;
                /* Set your desired height */
            }

            .fc table {
                font-size: 0.8em;
            }

            .fc .fc-timegrid-slot {
                height: 0.5em;
            }
        }

        @media (max-width: 768px) {
            #calendario {
                max-width: 100%;
                margin: 0px;
            }

            /* .calendario-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            } */

            .fc table {
                font-size: 0.8em;
            }

            .fc .fc-daygrid-day-top {
                font-size: 12px;
                /* Smaller font for day names */
            }

            .fc-dayGridDay.fc-day {
                height: 100px;
                /* Set your desired height */
            }

            .fc .fc-timegrid-slot-label {
                font-size: 10px;
                /* Smaller font for time labels */
            }

            .fc .fc-timegrid-event {
                font-size: 8px;
                /* Smaller font for event text */
            }
        }
    </style>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

</head>


<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-2">
            <!-- Logo a la izquierda -->
            <a class="navbar-brand fw-bold" href="#page-top">
                <img src="{{ asset('images/logo gav2.png') }}" alt="Logo" style="height: 100px">
            </a>

            <!-- Botón para colapsar el navbar en dispositivos pequeños -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menú
                <i class="bi-list"></i>
            </button>

            <!-- Contenido del navbar: enlaces y botón de enviar feedback -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto me-4 my-4 my-lg-1">
                    <li class="nav-item mb-3 me-3">
                        <a class="btn btn-outline-primary btn-lg btn-paso1 rounded-pill fw-bold" href="#features">ÁREA
                            DE MIEMBROS</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <!-- Contenido principal -->

    <section class="py-5 d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 100px); margin-top: 100px;" id="agendarCita">
        <div class="container px-5 text-center shadow-lg p-2 rounded mt-2">
            <!-- Título "Agende su cita inicial" -->
            <h2 class="display-3 lh-1 mb-3 font-alt">Agende su cita</h2>
            <!-- Descripción "complete sus datos" -->
            <p class="lead fw-normal text-muted mb-2 ttNorms">Complete el formulario para programar su consulta.
            </p>
            <div class="upe-mutistep-form" id="Upemultistepsform">

                <div class="step-header">
                    <!-- Pasos de secuencia -->
                    <div class="row mb-2">
                        <div class="col steplevel" data-target="#step-user">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar levelnumber" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-1-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col steplevel" data-target="#step-servicio">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar levelnumber" role="progressbar" style="width: 0%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-2-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col steplevel" data-target="#step-psicologo">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar levelnumber" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-3-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col steplevel" data-target="#step-horario">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar levelnumber" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-4-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col steplevel" data-target="#step-schedule">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar levelnumber" role="progressbar" style="width: 0%;"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-4-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col steplevel" data-target="#step-adicional">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar levelnumber" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-5-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col steplevel" data-target="#step-pago">
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar levelnumber" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-6-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col steplevel" data-target="#step-resumen" data-route="{{ url('login') }}" id='stepfinal'>
                            <div class="progress" style="height: 45px;">
                                <div class="progress-bar levelnumber" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                    <i class="bi bi-7-circle-fill fs-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-2 mx-auto" style="border: 1px solid #000000; width: 100%;">
                <!-- Formulario para agendar cita -->
                <div class="bs-stepper-content">
                    <form id="stepperForm">
                        <!-- Datos de Contacto -->
                        <x-wizard.step-user></x-wizard.step-user>
                        <x-wizard.step-servicio></x-wizard.step-servicio>
                        <x-wizard.step-psicologo></x-wizard.step-psicologo>
                        <x-wizard.step-horario></x-wizard.step-horario>
                        <x-wizard.step-adicional></x-wizard.step-adicional>
                        <x-wizard.step-pago></x-wizard.step-pago>
                        <x-wizard.step-resumen></x-wizard.step-resumen>

                        {{-- <div id="step-schedule" class="content step" role="tabpanel"
                            aria-labelledby="schedule-step-trigger"></div> --}}


                        <!-- Botón de enviar al siguiente paso -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="text-start">
                                    <!-- Botón para volver al paso anterior -->
                                    <button type="button" class="btn btn-outline-secondary btn-lg btn-paso1 rounded-pill fw-bold" style="background-color: #FFFFFF; border-color: #EDB1B5; border-width: 4px; color: #000000;" id="prevBtn" onclick="nextPrev(-1)">Volver</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-end">
                                    <!-- Botón para enviar al siguiente paso -->
                                    <button type="button" class="btn btn-outline-primary btn-lg btn-paso1 rounded-pill fw-bold" id="nextBtn" onclick="nextPrev(1)">Siguiente Paso</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="{{ asset('custom/js/validation.js') }}"></script>

    <script src="{{ asset('custom/js/wizard.js') }}"></script>

    <script src="{{ asset('custom/js/calendario.js') }}" defer></script>
    <script src="{{ asset('custom/js/pago.js') }}" defer></script>

    <script>
        // Función para alternar la visibilidad de la contraseña
        document.getElementById('toggle-password').addEventListener('click', function() {
            var passwordInput = document.getElementById('contrasena');
            var passwordIcon = document.querySelector('#toggle-password i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('bi-eye');
                passwordIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('bi-eye-slash');
                passwordIcon.classList.add('bi-eye');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>