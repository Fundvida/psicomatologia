<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sesiones Programadas</title>

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

        /* Estilos personalizados para la tabla de sesiones */
        .custom-table-container {
            border-radius: 20px;
            overflow: hidden;
        }

        .custom-table {
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Sombreado */
        }

        .custom-table th,
        .custom-table td {
            padding: 12px; /* Aumenta el espacio interno de las celdas */
            text-align: center; /* Alinea el texto horizontalmente */
            vertical-align: middle; /* Alinea el texto verticalmente */
        }

        .custom-table tbody tr:hover {
            background-color: #f5f5f5; /* Resalta la fila al pasar el cursor */
        }

        .custom-table tbody tr:nth-child(even) {
            background-color: #f8f9fa; /* Estilo alternativo para filas pares */
        }

        .custom-table tbody tr:nth-child(odd) {
            background-color: #ffffff; /* Estilo alternativo para filas impares */
        }

        .custom-table th {
            background-color: #cc848a; /* Color de fondo para encabezados */
            color: #fff; /* Color de texto para encabezados */
        }

        .custom-table th,
        .custom-table td {
            min-width: 100px; /* Anchura mínima de las columnas */
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

    <!-- Ventana emergente de notificaciones -->
    <div id="notificationContainer" class="notification-container">
        <div class="notification">
            <div class="notification-header">
                <h5 class="mb-0 font-alt">Notificaciones</h5>
                <button id="markReadBtn" class="btn btn-link"><i class="fas fa-check"></i></button>
            </div>
            <hr class="my-2">
            <div class="notification-body">
                <!-- Contenedor adicional para cada notificación -->
                <div class="notification-item-container mb-2">
                    <button class="notification-item rounded bg-light py-2 px-3 border-0">
                        Usted ha registrado una nueva sesión.
                    </button>
                </div>
                <div class="notification-item-container mb-2">
                    <button class="notification-item rounded bg-light py-2 px-3 border-0">
                        Usted ha cancelado una sesión.
                    </button>
                </div>
                <div class="notification-item-container mb-2">
                    <button class="notification-item rounded bg-light py-2 px-3 border-0">
                        Usted tiene una nueva sesión programada.
                    </button>
                </div>
                <div class="notification-item-container mb-2">
                    <button class="notification-item rounded bg-light py-2 px-3 border-0">
                        Un usuario ha realizado el pago de una sesión programada.
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Menú lateral -->
    <div class="custom-sidebar" id="sidebar">
        <ul>
            <li class="custom-menu-item custom-font-alt">PACIENTES
                <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                    <li><a href="{{ route('listaPaciente') }}" style="color: #fff;">Pacientes</a></li>
                </ul>
            </li>
            <li class="custom-menu-item custom-font-alt">SESIONES
                <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                    <li><a href="{{ route('psicologo.sesiones') }}" style="color: #fff;">Sesiones</a></li>
                </ul>
                <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
                    <li><a href="#" style="color: #fff;">Mis Horarios</a></li>
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
    <section class="py-1 d-flex justify-content-center align-items-center" id="sesiones">

        <div class="container px-5">
            <div class="container px-5 text-center shadow-lg p-5 rounded mt-2">
                <!-- Título -->
                <h2 class="display-3 lh-1 mb-5 font-alt">Lista de Sesiones Programadas</h2>
                <p class="lead fw-normal text-muted mb-5 ttNorms" style="line-height: 1.5em;">Consulta las sesiones que tienes programadas para estar al tanto de tus compromisos y seguir el progreso de tus pacientes.</p>
                <!-- Tabla de pacientes -->
                <div class="custom-table-container shadow" style="height: 500px;">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora Inicio/Hora Fin</th>
                                    <th>CI Paciente</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellidos</th>
                                    <th>Descripción de la Sesión</th>
                                    <th>Diagnóstico</th>
                                    <th>Archivos Adjuntos</th>
                                    <th>Estado de la Sesión</th>
                                    <th>Estado de Pago</th>
                                    <th>Registrar Sesión</th>
                                    <th>Editar Sesión</th>
                                    <th>Cancelar Sesión</th>
                                    <th>Ver Comprobante</th>
                                    <th>Información Paciente</th>

                                </tr>
                            </thead>
                            <tbody id="sesiones-body">
                                <!-- Registro 1 -->
                                <tr>
                                    <td>2024-05-05</td>
                                    <td>09:00 - 10:00</td>
                                    <td>88888888</td>
                                    <td>Jessica</td>
                                    <td>Lopez</td>
                                    <td>Sesión de terapia individual</td>
                                    <td>Ansiedad leve</td>
                                    <td>Informe.pdf</td>
                                    <td>Pendiente</td>
                                    <td>Pendiente</td>
                                    <td class="action-icons">

                                    </td>
                                    <td class="action-icons">
                                        <i class="fas fa-edit text-primary" onclick="editarSesion()" title="Editar Sesión"></i>
                                    </td>
                                    <td class="action-icons">
                                        <i class="fas fa-times-circle text-danger" onclick="confirmarCancelar('')" title="Cancelar Sesión"></i>
                                    </td>
                                    <td class="action-icons">
                                        <i class="fa-solid fa-file-invoice-dollar" style="color: #d86464;" onclick="verComprobante()" title="Ver Comprobante"></i>
                                    </td>
                                    <td class="action-icons">
                                        <i class="fas fa-info-circle" style="color: #7c87e4;" onclick="mostrarInfo('2024-05-05', '09:00 - 10:00', '88888888', 'Jessica Lopez', 'Sesión de terapia individual', 'Ansiedad leve', 'Informe.pdf')" title="Ver Información"></i>
                                    </td>
                                </tr>
                                <!-- Registro 2 -->
                                <tr>
                                    <td>2024-05-06</td>
                                    <td>14:00 - 15:00</td>
                                    <td>77777777</td>
                                    <td>Matias</td>
                                    <td>Rojas</td>
                                    <td>Terapia de pareja</td>
                                    <td>Problemas de comunicación</td>
                                    <td>None</td>
                                    <td>Terminada</td>
                                    <td>Realizado</td>
                                    <td class="action-icons">
                                        <i class="fas fa-pen text-success" onclick="registrarSesion()" title="Registrar Sesión"></i>
                                    </td>
                                    <td class="action-icons">
                                        <i class="fas fa-edit text-primary" onclick="editarSesion()" title="Editar Sesión"></i>
                                    </td>
                                    <td class="action-icons">
                                        <i class="fas fa-times-circle text-danger" onclick="confirmarCancelar('')" title="Cancelar Sesión"></i>
                                    </td>
                                    <td class="action-icons">
                                        <i class="fa-solid fa-file-invoice-dollar" style="color: #d86464;" onclick="verComprobante()" title="Ver Comprobante"></i>
                                    </td>
                                    <td class="action-icons">
                                        <i class="fas fa-info-circle" style="color: #7c87e4;" onclick="mostrarInfo('2024-05-06', '14:00 - 15:00', '77777777', 'Matias Rojas', 'Terapia de pareja', 'Problemas de comunicación', 'None')" title="Ver Información"></i>
                                    </td>
                                </tr>
                                <!-- Registro 3 -->
                                <tr>
                                    <td>2024-05-07</td>
                                    <td>16:00 - 17:00</td>
                                    <td>1234567</td>
                                    <td>Juan</td>
                                    <td>Pérez</td>
                                    <td>Consulta psicológica</td>
                                    <td>Estrés laboral</td>
                                    <td>Informe.docx</td>
                                    <td>Cancelada</td>
                                    <td>Cancelado</td>
                                </tr>

                                <!-- Registro 4 -->
                                <tr>
                                    <td>2024-05-08</td>
                                    <td>09:00 - 10:00</td>
                                    <td>66666666</td>
                                    <td>Leonardo</td>
                                    <td>Torrez</td>
                                    <td>Sesión de terapia individual</td>
                                    <td>Ansiedad leve</td>
                                    <td>Informe.pdf</td>
                                    <td>Pendiente</td>
                                    <td>Realizado</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </section>
</main>

<div id="notification-container" class="notification-container">
    <div class="notification">
        <div class="notification-header">
            <i class="fas fa-info-circle"></i> Información
            <button id="close-btn">&times;</button>
        </div>
        <div class="notification-body">
            Usted tiene nuevas sesiones programadas!
        </div>
        <div class="notification-footer">
            <button id="go-btn">
                Ir <i class="fas fa-arrow-right"></i>
            </button>
        </div>

    </div>
</div>

<!-- Modal de Comprobante de Pago -->
<div class="modal fade" id="modalComprobantePago" tabindex="-1" aria-labelledby="modalComprobantePagoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title font-alt" id="modalComprobantePagoLabel">Comprobante de Pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="imagenComprobante" src="" alt="Comprobante de Pago" style="max-width: 100%;">
            </div>
            <div class="modal-footer justify-content-center font-alt">
                <button type="button" class="btn btn-primary" onclick="confirmarPago()" style="font-size: 20px;">
                    <i class="bi bi-download" style="font-size: 24px;"></i> DESCARGAR
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Detalles -->
<div class="modal fade" id="infoPacienteModal" tabindex="-1" aria-labelledby="infoPacienteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title font-alt" id="infoPacienteModalLabel">Información del Paciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Fecha:</strong> <span id="fecha"></span></p>
                <p><strong>Hora:</strong> <span id="hora"></span></p>
                <p><strong>CI:</strong> <span id="ci"></span></p>
                <p><strong>Paciente:</strong> <span id="paciente"></span></p>
                <p><strong>Descripción:</strong> <span id="descripcion"></span></p>
                <p><strong>Diagnóstico:</strong> <span id="diagnostico"></span></p>
                <p><strong>Archivo Adjunto:</strong> <span id="archivoAdjunto"></span></p>
            </div>

        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
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
    });
    // Evento para abrir el modal al hacer clic en el icono de pagar
    pagarIcon.addEventListener('click', function() {
            $('#pagoModal').modal('show'); // Bootstrap Modal
        });
</script>

<script>
    function confirmarCancelar(nombre) {
        Swal.fire({
            title: '<h2 class="text-center mb-4 font-alt">¿Estás seguro de Cancelar la Sesión?</h2>',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, cancelar',
            cancelButtonText: 'No',
            customClass: {
                title: 'swal-title', // Clase CSS para el título personalizado
            },
            // Permite que el HTML se muestre en la notificación
            allowHtml: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    '<h2 class="text-center mb-4 font-alt">Eliminado</h2>',
                    'La sesión ha sido cancelada.',
                    'success'
                )
            }
        });
    }
</script>

<script>

    function verComprobante() {
        // Aquí puedes obtener la URL de la imagen del comprobante de pago
        var urlComprobantePago = "{{ asset('images/comprobanteEjemplo.png') }}";

        // Cambia la imagen en el modal
        var imagenComprobante = document.getElementById("imagenComprobante");
        imagenComprobante.src = urlComprobantePago;

        // Muestra el modal
        var modal = new bootstrap.Modal(document.getElementById('modalComprobantePago'));
        modal.show();
    }

    function mostrarInfo(fecha, hora, ci, paciente, descripcion, diagnostico, archivoAdjunto) {
        // Inserta los datos del paciente en el modal
        document.getElementById('fecha').innerText = fecha;
        document.getElementById('hora').innerText = hora;
        document.getElementById('ci').innerText = ci;
        document.getElementById('paciente').innerText = paciente;
        document.getElementById('descripcion').innerText = descripcion;
        document.getElementById('diagnostico').innerText = diagnostico;
        document.getElementById('archivoAdjunto').innerText = archivoAdjunto;

        // Muestra el modal
        $('#infoPacienteModal').modal('show');
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


<script>
    $(document).ready(function() {
        $.ajax({
            url: '/psicologo/getSesiones',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#sesiones-body').empty();
            
            // Recorrer los datos y agregar filas a la tabla
            $.each(data, function(index,sesiones) {
                var fechaInicio = sesiones.fecha_hora_inicio.split(' ')[0]; // Obtenemos solo la parte de la fecha
                var horaInicio = sesiones.fecha_hora_inicio.split(' ')[1].slice(0, 5); // Obtenemos solo la parte de la hora y la cortamos para obtener HH:MM
                var horaFin = sesiones.fecha_hora_fin.split(' ')[1].slice(0, 5);
                var estado_pago = sesiones.isTerminado == 0? 'Pendiente': 'Realizado';
                var paciente_ci = sesiones.ci == null? 'No especificado': sesiones.ci;
                var estado_sesion = sesiones.calificacion? 'Realizado': 'Pendiente';
                var icon_cancel = sesiones.estado == 'activo'? `<i class="fas fa-times-circle text-danger" onclick="confirmarCancelar(${sesiones.sesion_id})" title="Cancelar Sesión"></i>`: `<p class="text-danger">Cancelado</p>`;

                $('#sesiones-body').append(`
                    <tr>
                        <td>${fechaInicio}</td>
                        <td>${horaInicio} - ${horaFin}</td>
                        <td>${paciente_ci}</td>
                        <td>${sesiones.name}</td>
                        <td>${sesiones.apellidos}</td>
                        <td>${sesiones.descripcion_sesion}</td>
                        <td>None</td>
                        <td>None</td>
                        <td>${estado_sesion}</td>
                        <td>${estado_pago}</td>
                        <td class="action-icons">
                            <i class="fas fa-pen text-success" onclick="registrarSesion()" title="Registrar Sesión"></i>
                        </td>
                        <td class="action-icons">
                            <i class="fas fa-edit text-primary" onclick="editarSesion()" title="Editar Sesión"></i>
                        </td>
                        <td class="action-icons">
                            ${icon_cancel}
                        </td>
                        <td class="action-icons">
                            <i class="fa-solid fa-file-invoice-dollar" style="color: #d86464;" onclick="verComprobante()" title="Ver Comprobante"></i>
                        </td>
                        <td class="action-icons">
                            <i class="fas fa-info-circle" style="color: #7c87e4;" onclick="mostrarInfo('${fechaInicio}', '${horaInicio} - ${horaFin}', '${paciente_ci}', '${sesiones.name} ${sesiones.apellidos}', '${sesiones.descripcion_sesion}', 'None', 'None')" title="Ver Información"></i>
                        </td>
                    </tr>
                `);
            });

            },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error al obtener sesiones:', textStatus, errorThrown);
        }
        });
    });

    function registrarSesion(){
        console.log('registrar sesion');
    }

    function editarSesion(){
        console.log('editar sesion');
    }

    function confirmarCancelar(sesion_id){
        console.log(sesion_id);
        Swal.fire({
            title: '<h2 class="text-center mb-2 font-alt">¿Estás seguro de Cancelar la Sesión?</h2>',
            html: `<p class="lead fw-normal text-muted mb-2 ttNorms" style="line-height: 1.5em;">Por favor, explícale al paciente el motivo de la cancelación:</p>
                   <input id="justificacion" class="swal2-input" placeholder="Escriba aquí..." type="text">`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, cancelar',
            cancelButtonText: 'No',
            customClass: {
                title: 'swal-title', // Clase CSS para el título personalizado
            },
            // Permite que el HTML se muestre en la notificación
            allowHtml: true,
            preConfirm: () => {
                return document.getElementById('justificacion').value;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const justificacion = result.value;
                var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    $.ajax({
                        url: '/paciente/cancelarSesion',
                        type: 'POST',
                        data: {
                            'sesion_id': sesion_id,
                            '_token': token,
                            'justificacion': justificacion
                        },
                        success: function(data) {
                            console.log("exito!!!!  ");
                            Swal.fire(
                                '<h2 class="text-center mb-4 font-alt">Eliminado</h2>',
                                `La sesión ha sido cancelada.<br>Motivo: ${justificacion}`,
                                'success'
                            )
                            setTimeout(function() {
                                window.location.reload();
                            }, 3000);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    }); 
            }
        });
    }
</script>
</body>
</html>

</body>
</html>
