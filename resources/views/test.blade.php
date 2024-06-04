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
    <div class="custom-sidebar">
        <ul>
        <li class="custom-menu-item custom-font-alt">PACIENTES
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
            <li><a href="{{ route('listaPaciente') }}" style="color: #fff;">Pacientes</a></li>
            </ul>
        </li>
        <li class="custom-menu-item custom-font-alt">SESIONES
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
            <li><a href="#" style="color: #fff;">Lista de Sesiones</a></li>
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
        <li class="custom-menu-item custom-font-alt">NOTIFICACIONES
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
            <li><a href="#" style="color: #fff;">Aviso de Pagos</a></li>
            </ul>
        </li>
        </ul>
    </div>

<!-- Contenido principal -->

<main class="main-content ">
    <section class="py-1 d-flex justify-content-center align-items-center" id="sesiones">

        <div class="container px-5">
            <div class="container px-5 shadow-lg p-5 rounded mt-2">
                <!-- Título -->
                <h2 class="display-3 text-center lh-1 mb-5 font-alt">Lista de Sesiones Programadas</h2>
                <p class="lead fw-normal text-center text-muted mb-4 ttNorms" style="line-height: 1.5em;">Consulta las sesiones que tienes programadas para estar al tanto de tus compromisos y seguir el progreso de tus pacientes.</p>

                <!-- Formulario emergente para registrar sesión -->
                <div class="modal fade" id="formularioRegistroSesionModal" tabindex="-1" aria-labelledby="formularioRegistroModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title font-alt">Registrar Sesión</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="registroSesionForm">
                                    <div class="mb-3">
                                        <label for="buscarPaciente" class="form-label">Buscar Paciente<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="buscarPaciente" placeholder="Ingrese nombre o CI del paciente">
                                        <div id="resultadosBusqueda"></div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="fechaSesion" class="form-label">Fecha de la Sesión<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="fechaSesion" required>
                                            <div id="error-fechaSesion" class="text-danger d-none">Este campo es obligatorio</div>
                                        </div>
                                        <div class="col">
                                            <label for="horaSesion" class="form-label">Hora Inicio de la Sesión<span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" id="horaSesion" required>
                                            <div id="error-horaSesion" class="text-danger d-none">Este campo es obligatorio</div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="motivoSesion" class="form-label">Motivo de la Sesión<span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="motivoSesion" rows="3" required></textarea>
                                        <div id="error-motivoSesion" class="text-danger d-none">Este campo es obligatorio</div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary" onclick="registrarSesion()">Registrar Sesión</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function registrarSesion() {
                        var form = document.getElementById("registroSesionForm");
                        var isValid = true;

                        // Limpiar los mensajes de error
                        clearErrorMessages();

                        // Validar campos vacíos
                        var buscarPaciente = document.getElementById("buscarPaciente").value.trim();
                        var fechaSesion = document.getElementById("fechaSesion").value.trim();
                        var horaSesion = document.getElementById("horaSesion").value.trim();
                        var motivoSesion = document.getElementById("motivoSesion").value.trim();

                        if (buscarPaciente === "") {
                            isValid = false;
                            showErrorMessage("error-buscarPaciente", "Este campo es obligatorio");
                        }

                        if (fechaSesion === "") {
                            isValid = false;
                            showErrorMessage("error-fechaSesion", "Este campo es obligatorio");
                        }

                        if (horaSesion === "") {
                            isValid = false;
                            showErrorMessage("error-horaSesion", "Este campo es obligatorio");
                        }

                        if (motivoSesion === "") {
                            isValid = false;
                            showErrorMessage("error-motivoSesion", "Este campo es obligatorio");
                        }

                        if (isValid) {
                            // Aquí puedes agregar la lógica para enviar los datos al servidor utilizando AJAX o un formulario tradicional
                            Swal.fire({
                                icon: 'success',
                                title: '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                                text: 'La sesión se ha registrado exitosamente.',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK',
                                customClass: {
                                    title: 'swal-title'
                                },
                                allowHtml: true
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: '<h2 class="text-center mb-4 font-alt">Error</h2>',
                                text: 'Por favor, complete todos los campos obligatorios.',
                                confirmButtonColor: '#d33',
                                confirmButtonText: 'OK',
                                customClass: {
                                    title: 'swal-title'
                                },
                                allowHtml: true
                            });
                        }
                    }

                    function showErrorMessage(elementId, message) {
                        var errorElement = document.getElementById(elementId);
                        errorElement.textContent = message;
                        errorElement.classList.remove("d-none");
                    }

                    function clearErrorMessages() {
                        var errorElements = document.querySelectorAll(".text-danger");
                        errorElements.forEach(function(element) {
                            element.textContent = "";
                            element.classList.add("d-none");
                        });
                    }
                </script>

                <script>
                    function mostrarFormularioSesion() {
                        $('#formularioRegistroSesionModal').modal('show');
                    }
                </script>

                <!-- Modal para editar sesión -->
                <div class="modal fade" id="editarSesionModal" tabindex="-1" aria-labelledby="editarSesionModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title font-alt">Editar Sesión</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editarSesionForm">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="editarFechaSesion" class="form-label">Fecha de la Sesión<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="editarFechaSesion" placeholder="YYYY-MM-DD" required>
                                        </div>
                                        <div class="col">
                                            <label for="editarHoraInicio" class="form-label">Hora Inicio<span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" id="editarHoraInicio" placeholder="HH:MM" required>
                                        </div>
                                        <div class="col">
                                            <label for="editarHoraFin" class="form-label">Hora Fin<span class="text-danger">*</span></label>
                                            <input type="time" class="form-control" id="editarHoraFin" placeholder="HH:MM" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="editarCIPaciente" class="form-label">CI Paciente<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="editarCIPaciente" placeholder="Número de CI" required>
                                        </div>
                                        <div class="col">
                                            <label for="editarNombrePaciente" class="form-label">Nombre(s)<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="editarNombrePaciente" placeholder="Nombre(s) del paciente" required>
                                        </div>
                                        <div class="col">
                                            <label for="editarApellidosPaciente" class="form-label">Apellidos<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="editarApellidosPaciente" placeholder="Apellidos del paciente" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editarDescripcionSesion" class="form-label">Descripción de la Sesión<span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="editarDescripcionSesion" rows="3" placeholder="Detalles de la sesión" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editarDiagnostico" class="form-label">Diagnóstico<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="editarDiagnostico" placeholder="Diagnóstico del paciente" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editarArchivosAdjuntos" class="form-label">Archivos Adjuntos</label>
                                        <input type="file" class="form-control" id="editarArchivosAdjuntos" multiple>
                                        <small class="form-text text-muted">Archivos actuales: <span id="archivosActuales"></span></small>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="editarEstadoSesion" class="form-label">Estado de la Sesión<span class="text-danger">*</span></label>
                                            <select class="form-select" id="editarEstadoSesion" required>
                                                <option value="Pendiente">Pendiente</option>
                                                <option value="Terminada">Terminada</option>
                                                <option value="Cancelada">Cancelada</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="editarEstadoPago" class="form-label">Estado de Pago<span class="text-danger">*</span></label>
                                            <select class="form-select" id="editarEstadoPago" required>
                                                <option value="Pendiente">Pendiente</option>
                                                <option value="Realizado">Realizado</option>
                                                <option value="Cancelado">Cancelado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary" onclick="guardarCambiosSesion()">Editar Sesión</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function editarSesion(fecha, horaInicio, horaFin, ci, nombre, apellidos, descripcion, diagnostico, archivos, estadoSesion, estadoPago) {
                        // Rellenar los campos del modal con los datos actuales como placeholders
                        document.getElementById('editarFechaSesion').value = fecha;
                        document.getElementById('editarHoraInicio').value = horaInicio;
                        document.getElementById('editarHoraFin').value = horaFin;
                        document.getElementById('editarCIPaciente').value = ci;
                        document.getElementById('editarNombrePaciente').value = nombre;
                        document.getElementById('editarApellidosPaciente').value = apellidos;
                        document.getElementById('editarDescripcionSesion').value = descripcion;
                        document.getElementById('editarDiagnostico').value = diagnostico;
                        document.getElementById('archivosActuales').textContent = archivos;
                        document.getElementById('editarEstadoSesion').value = estadoSesion;
                        document.getElementById('editarEstadoPago').value = estadoPago;

                        // Abrir el modal
                        var modal = new bootstrap.Modal(document.getElementById('editarSesionModal'));
                        modal.show();
                    }

                    function guardarCambiosSesion() {
                        var form = document.getElementById("editarSesionForm");
                        var isValid = true;

                        // Limpiar los mensajes de error
                        clearErrorMessages();

                        // Validar campos vacíos (puedes agregar más campos según sea necesario)
                        var campos = [
                            'editarFechaSesion', 'editarHoraInicio', 'editarHoraFin', 'editarCIPaciente',
                            'editarNombrePaciente', 'editarApellidosPaciente', 'editarDescripcionSesion',
                            'editarDiagnostico', 'editarEstadoSesion', 'editarEstadoPago'
                        ];

                        campos.forEach(function(campo) {
                            var valor = document.getElementById(campo).value.trim();
                            if (valor === "") {
                                isValid = false;
                                showErrorMessage("error-" + campo, "Este campo es obligatorio");
                            }
                        });

                        if (isValid) {
                            // Mostrar alerta de confirmación corta
                            Swal.fire({
                                icon: 'question',
                                title: '<h2 class="text-center mb-4 font-alt">¿Guardar cambios de la Sesión?</h2>',
                                text: 'Asegúrese de que todos los cambios realizados sean correctos antes de guardar.',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Sí, confirmar',
                                cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Aquí puedes agregar la lógica para enviar los datos al servidor
                                    // Si la operación es exitosa, muestra la alerta de éxito
                                    Swal.fire({
                                        icon: 'success',
                                        title: '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                                        text: 'La sesión se ha actualizado exitosamente.',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'OK',
                                        customClass: {
                                            title: 'swal-title'
                                        },
                                        allowHtml: true
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Cerrar el modal después de guardar los cambios
                                            var modal = bootstrap.Modal.getInstance(document.getElementById('editarSesionModal'));
                                            modal.hide();
                    }
                });
            }
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: '<h2 class="text-center mb-4 font-alt">Error</h2>',
            text: 'Por favor, complete todos los campos obligatorios.',
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK',
            customClass: {
                title: 'swal-title'
            },
            allowHtml: true
        });
    }
}
                </script>

                <div class="text-end mb-2">
                    <button class="btn btn-outline-primary btn-lg btn-paso1 fw-bold" onclick="mostrarFormularioSesion()" style="font-size: 20px; padding: 12px 14px;">
                        <i class="fa-solid fa-notes-medical fs-3 me-1"></i> Agregar Sesión
                    </button>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <h4 class="text-start font-alt">Filtros de Búsqueda</h4>
                    </div>
                </div>
                <!-- Filtros y barra de búsqueda -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <input type="date" class="form-control" id="filtroFecha" placeholder="Fecha">
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <input type="text" class="form-control" id="filtroNombre" placeholder="Nombre del Paciente">
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <input type="text" class="form-control" id="filtroCI" placeholder="CI del Paciente">
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary btn-block" onclick="filtrarPacientes()">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>

                <hr class="my-4">
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
                            <tbody>
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
                                        <i class="fas fa-edit text-primary" onclick="editarSesion('2024-05-05', '09:00', '10:00', '88888888', 'Jessica', 'Lopez', 'Sesión de terapia individual', 'Ansiedad leve', 'Informe.pdf', 'Pendiente', 'Pendiente')" title="Editar Sesión"></i>
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
                                    <td><a href="#" onclick="mostrarArchivosModal('Matias Rojas')">Archivos (2)</a></td>
                                    <td>Terminada</td>
                                    <td>Realizado</td>
                                    <td class="action-icons">
                                        <i class="fas fa-pen text-success" onclick="registrarSesion()" title="Registrar Sesión"></i>
                                    </td>
                                    <td class="action-icons">
                                        <i class="fas fa-edit text-primary" onclick="editarSesion('2024-05-06', '14:00', '15:00', '77777777', 'Matias', 'Rojas', 'Terapia de pareja', 'Problemas de comunicación', 'Archivos (2)', 'Terminada', 'Realizado')" title="Editar Sesión"></i>
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

                    <!-- Modal para mostrar archivos adjuntos-->
                    <div class="modal fade" id="archivosModal" tabindex="-1" aria-labelledby="archivosModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="archivosModalLabel">Archivos Adjuntos</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul id="archivosList" class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>consulta.pdf</span>
                                            <a href="path/to/consulta.pdf" download class="btn btn-outline-secondary btn-sm">Descargar</a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>consulta.docx</span>
                                            <a href="path/to/consulta.docx" download class="btn btn-outline-secondary btn-sm">Descargar</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function mostrarArchivosModal(nombrePaciente) {
                            // Aquí puedes actualizar el contenido del modal si es necesario
                            var modal = new bootstrap.Modal(document.getElementById('archivosModal'), {
                                keyboard: false
                            });
                            modal.show();
                        }
                    </script>

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
            title: '<h2 class="text-center mb-2 font-alt">¿Estás seguro de Cancelar la Sesión?</h2>',
            html: `<p class="lead fw-normal text-muted mb-2 ttNorms" style="line-height: 1.5em;">Por favor, explique al paciente el motivo de la cancelación de la sesión:</p>
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
                Swal.fire(
                    '<h2 class="text-center mb-4 font-alt">Eliminado</h2>',
                    `La sesión ha sido cancelada.<br>Motivo: ${justificacion}`,
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



</body>
</html>

</body>
</html>
