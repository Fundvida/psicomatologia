<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SISTEMA DE PSICOLOGÍA</title>
    <!-- Enlaces a los estilos CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('./vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('./vendors/base/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('./css/style.css')}}">
    <link href="css/styles.css" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Google fonts-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-DhkJFhdWdZpDnSSV16rGKEZZtrI+QGPiGtXQyGdkiJ5Zs7gCyr+FAJy+tJfFgSf7KlFeagpK6ww+nqGpXovcaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Enlaces a los scripts JS del plugin de Calendario -->
    <!-- Enlaces a los scripts JS del plugin de Calendario -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.js"></script>
    <!-- Importar el archivo de idioma español -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/es.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js'></script>

    <style>
        /* Estilos adicionales */
        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 768px) {
            .container {
                max-width: 750px;
            }
        }

        @media (min-width: 992px) {
            .container {
                max-width: 970px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1170px;
            }
        }

        .main-content {
            margin-left: 250px; /* Ajustar el margen izquierdo del contenido principal para dejar espacio para la barra lateral */
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Ajuste para dispositivos móviles */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0; /* Restablecer el margen izquierdo del contenido principal en dispositivos móviles */
            }
        }

        /* NOTIFICACION */

        .notification-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .notification {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin-bottom: 10px; /* Espacio entre notificaciones */
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #7f8dba;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .notification-header button {
            border: none;
            background: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }

        .notification-body {
            padding: 10px;
        }

        .notification-footer {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: right;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .notification-footer button {
            background-color: #7f8dba;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .notification-footer button:hover {
            background-color: #616c96;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación principal -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand fw-bold me-auto" href="#page-top" style="margin-left: -80px;">
                <img src="{{ asset('images/logo gav2.png') }}" alt="Logo" style="height: 100px">
            </a>
            <ul class="navbar-nav ml-auto flex-row-reverse flex-md-row">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdownToggle">
                        <img src="images/faces/face28.jpg" alt="profile" class="img-fluid rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" id="profileDropdown" style="display: none; right: 0; left: auto;">

                        <form method="POST" action="" class="dropdown-item">
                            <button type="submit" class="btn btn-link text-dark" style="text-decoration: none;">
                                <i class="fas fa-cog text-primary"></i> <!-- Cambié la clase para el ícono de cierre de sesión -->
                                Configuración
                            </button>
                        </form>
                        <form method="POST" action="{{ route('cerrar_sesion') }}" class="dropdown-item">
                            @csrf
                            <button type="submit" class="btn btn-link text-dark" style="text-decoration: none;">
                                <i class="fas fa-power-off text-primary"></i> <!-- Cambié la clase para el ícono de cierre de sesión -->
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </li>
                <!-- Icono de campana para notificaciones -->
                <li class="nav-item">
                    <a class="nav-link" href="#" id="notificationIcon">
                        <i class="fas fa-bell"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var profileDropdown = document.getElementById('profileDropdown');
            var profileDropdownToggle = document.getElementById('profileDropdownToggle');

            profileDropdownToggle.addEventListener('click', function() {
                if (profileDropdown.style.display === 'none') {
                    profileDropdown.style.display = 'block';
                } else {
                    profileDropdown.style.display = 'none';
                }
            });
        });
    </script>

<!-- Menú lateral -->
<div class="custom-sidebar">
    <ul>
    <li class="custom-menu-item custom-font-alt">PACIENTES
        <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
        <li><a href="{{ route('listado.pacientes') }}" style="color: #fff;">Pacientes</a></li>
        </ul>
    </li>
    <li class="custom-menu-item custom-font-alt">SESIONES
        <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
        <li><a href="#" style="color: #fff;">Sesiones</a></li>
        </ul>
        <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
            <li><a href="{{ route('psicologo.horario') }}" style="color: #fff;">Mis Horarios</a></li>
        </ul>
    </li>
    <li class="custom-menu-item custom-font-alt">CALENDARIO
        <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
        <li><a href="#" style="color: #fff;">Calendario</a></li>
        </ul>
    </li>
    <li class="custom-menu-item custom-font-alt">CAMBIAR DATOS PERSONALES
        <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
        <li><a href="#" style="color: #fff;">Datos Personales</a></li>
        </ul>
    </li>
    <li class="custom-menu-item custom-font-alt">CAMBIAR CONTRASEÑA
        <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
        <li><a href="#" style="color: #fff;">Cambiar Contraseña</a></li>
        </ul>
    </li>
    </ul>
</div>

<!-- Contenido principal -->
<main class="main-content ">
    <section class="py-0 d-flex justify-content-center align-items-center" id="">
        <div class="container px-5 text-center shadow-lg p-5 rounded mt-2">
            <!-- Título -->
            <h2 class="display-3 lh-1 mb-5 font-alt">¡Bienvenido/a Psicólogo/a!</h2>
            <p class="lead fw-normal text-muted mb-5 ttNorms">¡Gracias por acceder al Sistema de Psicología!</p>
        </div>
    </section>
</main>
    
<div class="container">
    
    <div class="notification-container" id="notification-container">
        <!-- Aquí se agregarán las notificaciones -->
    </div>
</div>

<!-- Plantilla de notificación -->
<template id="notification-template">
    <div class="notification">
        <div class="notification-header">
            <i class="fas fa-info-circle"></i> Información
            <button class="close-btn">&times;</button>
        </div>
        <div class="notification-body">
            Usted tiene una sesión pendiente de pago
        </div>
        <!-- <div class="notification-footer">
            <button class="go-btn">
                Ir <i class="fas fa-arrow-right"></i>
            </button>
        </div> -->
    </div>
</template>
<!-- Enlaces a los scripts JS -->
<script src="{{asset('./vendors/base/vendor.bundle.base.js')}}"></script>
<script src="{{asset('./vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('./js/jquery.cookie.js')}}" type="text/javascript"></script>
<script src="{{asset('./js/off-canvas.js')}}"></script>
<script src="{{asset('./js/hoverable-collapse.js')}}"></script>
<script src="{{asset('./js/template.js')}}"></script>
<script src="{{asset('./js/todolist.js')}}"></script>
<script src="{{asset('./js/dashboard.js')}}"></script>

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

<script>
    function createNotification(message) {
        const container = document.getElementById('notification-container');
        const template = document.getElementById('notification-template');

        const clone = template.content.cloneNode(true);
        const notificationBody = clone.querySelector('.notification-body');
        notificationBody.innerHTML = message; // Asignar el contenido HTML al cuerpo de la notificación

        container.appendChild(clone);
    }
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('notification-container');
            const template = document.getElementById('notification-template');

            // Función para cerrar una notificación
            function closeNotification(notification) {
                notification.remove();
            }

            // Botón cerrar notificación
            container.addEventListener('click', function (event) {
                if (event.target.classList.contains('close-btn')) {
                    closeNotification(event.target.closest('.notification'));
                }
            });

            // Ejemplo de uso
            document.getElementById('add-notification').addEventListener('click', function () {
                createNotification('Nueva notificación');
            });
        });

        $(document).ready(function() {
        $.ajax({
            url: '/psicologo/getNotificaciones',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data)
                data.forEach(function(notification) {
                    const horaInicio = notification.fecha_hora_inicio.split(' ')[1].split(':').slice(0, 2).join(':');
                    const horaFin = notification.fecha_hora_fin.split(' ')[1].split(':').slice(0, 2).join(':');
                    const horaRango = `${horaInicio} - ${horaFin}`;

                    const message = `<h5 class="d-inline">Fecha: </h5> ${notification.fecha_hora_inicio.split(' ')[0]} <br>
                                 <h5 class="d-inline">Hora: </h5> ${horaRango}<br>
                                 <h5 class="d-inline">Descripcion: </h5><p>${notification.descripcion_sesion}</p>`;
                    createNotification(message);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    </script>
</body>
</html>
