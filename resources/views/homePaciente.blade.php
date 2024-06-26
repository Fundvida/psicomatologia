<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>SISTEMA DE PSICOLOGÍA</title>

    <!-- Enlaces a los estilos CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('./vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('./vendors/base/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('./css/style.css')}}">

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


    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>

    <!-- Enlaces a los scripts JS del plugin de Calendario -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.js"></script>
    <!-- Importar el archivo de idioma español -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/es.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
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
        /* Estilos para la ventana emergente de notificaciones */
        .notification-container {
            position: fixed;
            top: 70px;
            right: 10px;
            z-index: 1000;
            display: none;
        }

        .notification {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            max-width: 300px;
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .notification-header h5 {
            margin-bottom: 0;
        }

        .notification-body {
            padding: 10px;
        }

        .notification-item-container {
            border-radius: 10px;
            background-color: #f9c5d1;
            padding: 4px;
        }

        .notification-item {
            padding: 8px 0;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .notification-item:hover {
            background-color: transparent !important;
        }

        .show {
            display: block !important;
        }

        /* Estilos para el parrafo*/

        .welcome-container {
            background: linear-gradient(to bottom right, #ffffff, #f0f8ff);
            max-width: 1000px;
            border-radius: 2rem;
            box-shadow: 0 1rem 3rem rgba(0,0,0,0.1);
        }
        .welcome-message {
            font-size: 1.2rem;
            line-height: 2;
            color: #333;
        }
        .welcome-text {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            text-align: justify;
            padding: 0 1rem;
            line-height: 1.8;
        }
        .font-alt {
            font-family: 'Newsreader', serif;
            color: #e17777;
        }
        .lead {
            font-size: 1.5rem;
            font-weight: 300;
            color: #e17777;
        }
        .font-weight-bold {
            font-weight: 700!important;
            color: #000000;
        }
        .text-primary {
            color: #e17777!important;
        }
        .display-4 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
        }
        @media (min-width: 768px) {
            .welcome-container {
                padding: 3rem!important;
            }
            .display-4 {
                font-size: 3rem;
            }
        }
    </style>
</head>
<body>
    <!-- Barra de navegación principal -->
    @include('components.navigationbar-user')

    <!-- Ventana emergente de notificaciones -->
    @include('components.notifications-user')

    <!-- Menú lateral -->
    @include('components.sidebar-user')

    <!-- Contenido principal -->
    <main class="main-content ">
        <section class="py-0 d-flex justify-content-center align-items-center" id="">
            <div class="container px-4 text-center shadow-lg p-5 rounded-lg welcome-container">
                <!-- Título -->
                <h2 class="display-4 lh-1 mb-5 font-alt text-primary">¡Bienvenido/a Paciente!</h2>
                <div class="welcome-message">
                    <p class="lead mb-5 text-dark">¡Bienvenido al Gabinete de Psicología!</p>
                    <p class="welcome-text">Estamos encantados de tenerte aquí y queremos que te sientas cómodo desde el primer momento.</p>
                    <p class="welcome-text">Nuestro objetivo es brindarte un espacio seguro y confidencial donde puedas explorar tus pensamientos, emociones y experiencias de una manera que te ayude a crecer y prosperar.</p>
                    <p class="welcome-text">Queremos recordarte que estás en un entorno libre de juicios, donde no hay respuestas correctas o incorrectas. Tu bienestar es nuestra prioridad, y estamos aquí para apoyarte en tu viaje hacia una vida más saludable y satisfactoria.</p>
                </div>
            </div>
        </section>
    </main>

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
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener referencias a elementos DOM
            const notificationIcon = document.getElementById('notificationIcon');
            const notificationContainer = document.getElementById('notificationContainer');
            const markReadBtn = document.getElementById('markReadBtn');
            const notificationItems = document.querySelectorAll('.notification-item');
            const pagarIcon = document.querySelector('.fas.fa-money-bill');

            notificationIcon.addEventListener('click', function() {
                notificationContainer.classList.toggle('show');
            });

            markReadBtn.addEventListener('click', function() {
                notificationItems.forEach(item => {
                    item.classList.remove('bg-light');
                });
            });

            // Agregar evento clic a cada notificación
            notificationItems.forEach(item => {
                item.addEventListener('click', function() {
                    item.classList.remove('bg-light');
                });
            });


            // Evento para abrir el modal al hacer clic en el icono de pagar
            pagarIcon.addEventListener('click', function() {
                $('#pagoModal').modal('show'); // Bootstrap Modal
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
        // Función para cargar las notificaciones
        function loadNotifications() {
            fetch('/notificaciones')
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const notificationBody = document.getElementById('notificationBody');
                    notificationBody.innerHTML = '';

                    data.forEach(notification => {
                        const notificationItem = document.createElement('div');
                        notificationItem.className = 'notification-item-container mb-2';
                        notificationItem.innerHTML = `
                            <button class="notification-item rounded bg-light py-2 px-3 border-0">
                                ${notification.descripcion}
                            </button>
                        `;
                        notificationBody.appendChild(notificationItem);
                    });
                });
        }

        loadNotifications();

        setInterval(loadNotifications, 60000); // Recargar cada 60 segundos
    });
    </script>
</body>
</html>
