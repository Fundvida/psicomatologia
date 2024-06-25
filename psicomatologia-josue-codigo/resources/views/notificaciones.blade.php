<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SISTEMA DE PSICOLOGÍA</title>

    <!-- Enlaces a los estilos CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Enlaces a los scripts JS del plugin de Calendario -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.js"></script>
    <!-- Importar el archivo de idioma español -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/es.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <style>
        /* Estilos adicionales para responsividad */
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
            margin-left: 250px;
            /* Ajustar el margen izquierdo del contenido principal para dejar espacio para la barra lateral */
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Ajuste para dispositivos móviles */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                /* Restablecer el margen izquierdo del contenido principal en dispositivos móviles */
            }
        }

        /* Estilos personalizados para la tabla de sesiones */
        .custom-table-container {
            border-radius: 20px;
            overflow: hidden;
        }

        .custom-table {
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            /* Sombreado */
        }

        .custom-table th,
        .custom-table td {
            padding: 12px;
            /* Aumenta el espacio interno de las celdas */
            text-align: center;
            /* Alinea el texto horizontalmente */
            vertical-align: middle;
            /* Alinea el texto verticalmente */
        }

        .custom-table tbody tr:hover {
            background-color: #f5f5f5;
            /* Resalta la fila al pasar el cursor */
        }

        .custom-table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
            /* Estilo alternativo para filas pares */
        }

        .custom-table tbody tr:nth-child(odd) {
            background-color: #ffffff;
            /* Estilo alternativo para filas impares */
        }

        .custom-table th {
            background-color: #cc848a;
            /* Color de fondo para encabezados */
            color: #fff;
            /* Color de texto para encabezados */
        }

        .custom-table th,
        .custom-table td {
            min-width: 100px;
            /* Anchura mínima de las columnas */
        }

        .action-icons i {
            cursor: pointer;
            font-size: 1.2rem;
            margin: 0 5px;
        }

        .btn-primary {
            background-color: #edb1b5;
            border-color: #edb1b5;
        }

        .btn-primary:hover {
            background-color: #cc848a;
            border-color: #cc848a;
        }

        .btn-primary:focus {
            color: #fff;
            background-color: #edb1b5;
            border-color: #edb1b5;
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

        /* Estilos para la ventana emergente de notificaciones */


        .notification-list {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 10px;
        }

        .notification-item2 {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
            cursor: pointer;
        }

        .notification-icon {
            background-color: #e9ecef;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
        }

        .notification-content {
            flex-grow: 1;
        }

        .notification-title {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }

        .notification-time {
            margin: 0;
            font-size: 12px;
            color: #6c757d;
        }

        .notification-item2:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .notification-item2.selected {
            background-color: #fff3cd;
            /* Color amarillo suave */
        }

        .notification-detail {
            display: none;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .notification-detail h3 {
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        .notification-detail p {
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .notification-detail .actions {
            margin-top: 15px;
        }

        .notification-detail .actions button {
            margin-right: 10px;
        }
    </style>
    <script>
        var userRole = '{{ $userRole }}';
        var routes = @json($routes);

        console.log('UserRole in script:', userRole); // Debugging
        console.log('Routes in script:', routes); // Debugging
    </script>
</head>

<body>
    <!-- Barra de navegación principal -->
    @include('components.navigationbar-user')

    <!-- Ventana emergente de notificaciones -->
    @include('components.notifications-user')

    <!-- Menú lateral -->
    @include('components.sidebar-user')

    <!-- Contenido principal -->

    <main class="main-content">
        <section class="py-1 d-flex justify-content-center align-items-center" id="sesiones">
            <div class="container px-5">
                <div class="container px-5 shadow-lg p-5 rounded mt-2">
                    <h2 class="display-3 text-center lh-1 mb-5 font-alt">Notificaciones</h2>
                    <p class="lead fw-normal text-center text-muted mb-4 ttNorms">Seleccione desde la lista lateral de notificaciones para ver más detalles</p>

                    <div class="notification-list">
                        <div class="notification-detail" id="notificationDetail">
                            <h3 class="font-alt" id="detailTitle"></h3>
                            <p class="notification-time" id="detailTime"></p>
                            <p id="detailContent"></p>
                            <div class="actions">
                                <button onclick="showPreviousMessage()">Ir al enlace</button>
                            </div>
                        </div>
                        <div class="notification-item2" data-id="1">
                            <span class="notification-icon"><i class="fas fa-clipboard-list"></i></span>
                            <div class="notification-content">
                                <p class="notification-title">Usted ha registrado una nueva sesión.</p>
                                <p class="notification-time">hace 13 horas 26 minutos</p>
                            </div>
                        </div>
                        @foreach($notifications as $notification)
                            <div class="notification-item2" data-id="{{ $notification->id }}">
                                <span class="notification-icon"><i class="fas fa-clipboard-list"></i></span>
                                <div class="notification-content">
                                    <p class="notification-title">{{ $notification->descripcion }}</p>
                                    <p class="notification-time">{{ $notification->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @endforeach
                        <!-- <div class="notification-item2">
                            <span class="notification-icon"><i class="fas fa-clipboard-list"></i></span>
                            <div class="notification-content">
                                <p class="notification-title">Usted tiene una nueva sesión programada.</p>
                                <p class="notification-time">hace 14 horas 31 minutos</p>
                            </div>
                        </div>
                        <div class="notification-item2">
                            <span class="notification-icon"><i class="fas fa-clipboard-list"></i></span>
                            <div class="notification-content">
                                <p class="notification-title">Un usuario ha realizado el pago de una sesión programada.</p>
                                <p class="notification-time">hace 15 horas 25 minutos</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
    </main>

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

        document.addEventListener('DOMContentLoaded', function() {
            const notificationItems = document.querySelectorAll('.notification-item2');
            const notificationDetail = document.getElementById('notificationDetail');
            const detailTitle = document.getElementById('detailTitle');
            const detailTime = document.getElementById('detailTime');
            const detailContent = document.getElementById('detailContent');

            notificationItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remover la clase 'selected' de todos los items
                    notificationItems.forEach(i => i.classList.remove('selected'));

                    // Agregar la clase 'selected' al item clickeado
                    this.classList.add('selected');

                    // Actualizar y mostrar los detalles
                    detailTitle.textContent = this.querySelector('.notification-title').textContent;
                    detailTime.textContent = this.querySelector('.notification-time').textContent;
                    detailContent.textContent = ""; // Aquí puedes agregar más contenido si lo tienes

                    notificationDetail.style.display = 'block';
                });
            });
        });

        function showPreviousMessage() {
            console.log('hola');
            console.log(userRole);
            if (!userRole || !routes) {
                console.error('UserRole or routes is undefined');
                return;
            }
            switch (userRole) {
                case 'Administrador':
                    window.location.href = routes.admin;
                    break;
                // case 'Tutor':
                //     window.location.href = ;
                //     break;
                case 'Paciente':
                    window.location.href = routes.paciente;
                    break;
                case 'Psicologo':
                    window.location.href = routes.psicologo;
                    break;
            }
        }
    </script>


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</body>

</html>

</body>

</html>