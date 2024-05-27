<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>PSICÓLOGOS</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('./vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('./vendors/base/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('./css/style.css')}}">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google fonts-->
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
        /* Estilos personalizados para la tabla */
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

        /* Boton Estado togledown */
        .custom-dropdown-toggle {
            background-color: #727FAB;
            color: white;
            border: none;
            border-radius: 0.25rem;
            padding: 0.2rem 1rem;
            font-size: 1rem;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .custom-dropdown-toggle:hover {
            background-color: #5e699f;
        }
        .custom-dropdown-toggle:active {
            background-color: #4d5680;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.2) inset;
        }

    </style>
</head>

<body id="page-top">
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
        <li class="custom-menu-item custom-font-alt">PSICÓLOGOS
            <ul class="custom-sub-menu lead fw-normal text-muted ttNorms">
            <li><a href="{{ route('listaPsicologo') }}" style="color: #fff;">Psicologos</a></li>
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
    <main class="main-content">
        <section class="py-1 d-flex justify-content-center align-items-center" id="psicologos">
            <div class="container px-5">
                <div class="container px-5 shadow-lg p-5 rounded mt-2">

                    <!-- Título -->
                    <h2 class="display-3 text-center lh-1 mb-5 font-alt">Listado de Psicólogos</h2>

                    <!-- Formulario emergente para registrar psicólogo -->
                    <div class="modal fade" id="formularioRegistroModal" tabindex="-1" aria-labelledby="formularioRegistroModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title font-alt">Registrar Psicólogo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="nombres" class="form-label">Nombres<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="nombres">
                                                <div id="error-nombres" class="text-danger d-none">Este campo es obligatorio</div>
                                            </div>
                                            <div class="col">
                                                <label for="apellidos" class="form-label">Apellidos<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="apellidos">
                                                <div id="error-apellidos" class="text-danger d-none">Este campo es obligatorio</div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" id="fechaNacimiento">
                                        </div>
                                        <div class="mb-3">
                                            <label for="fechaFuncion" class="form-label">Fecha función título provisión nacional</label>
                                            <input type="date" class="form-control" id="fechaFuncion">
                                        </div>

                                        <div class="mb-3">
                                            <label for="universidad" class="form-label">Universidad</label>
                                            <input type="text" class="form-control" id="universidad">
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="ciudadResidencia" class="form-label">Ciudad de Residencia</label>
                                                <input type="text" class="form-control" id="ciudadResidencia">
                                            </div>
                                            <div class="col">
                                                <label for="paisResidencia" class="form-label">País de Residencia</label>
                                                <input type="text" class="form-control" id="paisResidencia">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="ci" class="form-label">Carnet de identidad o equivalente</label>
                                            <input type="text" class="form-control" id="ci">
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="contrasena" class="form-label">Contraseña</label>
                                                <input type="password" class="form-control" id="contrasena">
                                            </div>
                                            <div class="col">
                                                <label for="confirmarContrasena" class="form-label">Confirmar Contraseña</label>
                                                <input type="password" class="form-control" id="confirmarContrasena">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="archivos" class="form-label">Archivos</label>
                                            <input type="file" id="archivos" class="form-control" name="archivos[]" multiple>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descripcionCV">Descripción de CV:</label><br>
                                            <textarea id="descripcioncv" name="descripcionCV" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="correoElectronico">
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefono" class="form-label">Número de Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono" placeholder="Ingrese su número de teléfono" style="width: 312px;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="metodoConfirmacion" class="form-label">Método de Confirmación de Cuenta</label>
                                            <select id="metodoConfirmacion" class="form-select">
                                                <option value="correo">Correo Electrónico</option>
                                                <option value="sms">SMS</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="preguntaSeguridad1" class="form-label">Pregunta de Seguridad</label>
                                            <input type="text" class="form-control" id="preguntaSeguridad1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="preguntaSeguridad2" class="form-label">Respuesta de Seguridad</label>
                                            <input type="text" class="form-control" id="preguntaSeguridad2">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" onclick="mostrarErrorPsicologo()">Cancelar</button>
                                            <!--<button type="button" class="btn btn-primary" onclick="registrarPsicologo()">Registrar Psicólogo</button>-->
                                            <button type="button" class="btn btn-primary" onclick="validarFormulario()">Registrar Psicólogo</button>

                                        </div>
                                    </form>

                                    <!-- Validar campo vacio-->
                                    <script>
                                        function validarFormulario() {
                                            var nombres = document.getElementById("nombres").value.trim();
                                            var apellidos = document.getElementById("apellidos").value.trim();

                                            if (nombres === "") {
                                                document.getElementById("error-nombres").classList.remove("d-none");
                                            } else {
                                                document.getElementById("error-nombres").classList.add("d-none");
                                            }

                                            if (apellidos === "") {
                                                document.getElementById("error-apellidos").classList.remove("d-none");
                                            } else {
                                                document.getElementById("error-apellidos").classList.add("d-none");
                                            }

                                            // Aquí puedes agregar más validaciones para otros campos si es necesario

                                            // Si todos los campos requeridos están completos, puedes enviar el formulario
                                            if (nombres !== "" && apellidos !== "") {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                                                    text: 'El psicólogo se ha registrado exitosamente.',
                                                    confirmButtonColor: '#3085d6',
                                                    confirmButtonText: 'OK',
                                                    customClass: {
                                                        title: 'swal-title', // Clase CSS para el título personalizado
                                                    },
                                                    // Permite que el HTML se muestre en la notificación
                                                    allowHtml: true
                                                });
                                                //document.getElementById("registroForm").submit();
                                            }
                                        }
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function mostrarFormulario() {
                            $('#formularioRegistroModal').modal('show');
                        }
                    </script>
                    <script>
                        var input = document.querySelector("#telefono");
                        window.intlTelInput(input, {
                            initialCountry: "auto",
                            separateDialCode: true,
                            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.js",
                        });
                    </script>

                    <div class="text-end mb-3">
                        <button class="btn btn-outline-primary btn-lg btn-paso1 fw-bold" onclick="mostrarFormulario()" style="font-size: 20px; padding: 12px 14px;">
                            <i class="bi bi-person-plus-fill fs-4 me-2"></i> Agregar Psicólogo
                        </button>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h4 class="text-start font-alt">Filtros de Búsqueda</h4>
                        </div>
                    </div>
                    <!-- Filtros y barra de búsqueda -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <select class="form-select" id="filtroTipo">
                                <option value="todos">Todos</option>
                                <option value="mayor">Paciente Mayor</option>
                                <option value="menor">Paciente Menor de Edad</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="filtroNombre" placeholder="Nombre Psicólogo/a">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="filtroCI" placeholder="CI del Psicólogo/a">
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-primary" onclick="filtrarPacientes()">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>

                    <hr class="my-4">


                    <!-- Tabla de psicólogos -->
                    <div class="custom-table-container shadow" style="height: 500px;">

                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>CI</th>
                                        <th>Nombre Completo Psicólogo</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Filas de ejemplo (rellena con datos reales cuando conectes a la base de datos) -->
                                    <tr>
                                        <td>1234567</td>
                                        <td>Elias Pérez</td>
                                        <td>Activo</td>
                                        <td class="action-icons">
                                            <!-- Botón desplegable con opciones -->
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="btn-group me-2">
                                                    <button type="button" class="btn custom-dropdown-toggle dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Estado
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Cambiar a Activo</a></li>
                                                        <li><a class="dropdown-item" href="#">Cambiar a Ausente Temporalmente</a></li>
                                                        <li><a class="dropdown-item" href="#">Cambiar a Inactivo</a></li>
                                                        <li><a class="dropdown-item" href="#">Ver CV</a></li>
                                                    </ul>
                                                </div>
                                                <!-- Botones de editar y eliminar -->
                                                <i class="fas fa-edit me-2" style="color: #6C757D; font-size: 22px;" onclick="editarSesion()" title="Editar Sesión"></i>
                                                <i class="fa-solid fa-trash-can text-danger" style="font-size: 22px;" onclick="confirmarEliminarPsicologo('Elias Pérez')" title="Eliminar Sesión"></i>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>6434344</td>
                                        <td>Tito Castillo</td>
                                        <td>Ausente Temporalmente</td>
                                        <td class="action-icons">
                                            <!-- Contenedor flex para alinear el botón y los íconos -->
                                            <div class="d-flex align-items-center justify-content-center">
                                                <!-- Botón desplegable con opciones -->
                                                <div class="btn-group me-2">
                                                    <button type="button" class="btn custom-dropdown-toggle dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Estado
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Cambiar a Activo</a></li>
                                                        <li><a class="dropdown-item" href="#">Cambiar a Ausente Temporalmente</a></li>
                                                        <li><a class="dropdown-item" href="#">Cambiar a Inactivo</a></li>
                                                        <li><a class="dropdown-item" href="#">Ver CV</a></li>
                                                    </ul>
                                                </div>
                                                <!-- Botones de editar y eliminar -->
                                                <i class="fas fa-edit me-2" style="color: #6C757D; font-size: 22px;" onclick="editarSesion()" title="Editar Sesión"></i>
                                                <i class="fa-solid fa-trash-can text-danger" style="font-size: 22px;" onclick="confirmarEliminarPsicologo('Tito Castillo')" title="Eliminar Sesión"></i>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notificationIcon = document.getElementById('notificationIcon');
            const notificationContainer = document.getElementById('notificationContainer');
            const markReadBtn = document.getElementById('markReadBtn');
            const notificationItems = document.querySelectorAll('.notification-item');

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
    </script>

    <script>
        function registrarPsicologo() {
            Swal.fire({
                icon: 'success',
                title: '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                text: 'El psicólogo se ha registrado exitosamente.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                customClass: {
                    title: 'swal-title', // Clase CSS para el título personalizado
                },
                // Permite que el HTML se muestre en la notificación
                allowHtml: true
            });
        }
    </script>
    <script>
        function mostrarErrorPsicologo() {
            Swal.fire({
                icon: 'error',
                title: '<h2 class="text-center mb-4 font-alt">Error</h2>',
                text: 'Se ha producido un error al registrar psicólogo.',
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK',
                customClass: {
                    title: 'swal-title', // Clase CSS para el título personalizado
                },
                // Permite que el HTML se muestre en la notificación
                allowHtml: true
            });
        }
    </script>
    <script>
        function confirmarEliminarPsicologo(nombre) {
            Swal.fire({
                title: '<h2 class="text-center mb-4 font-alt">¿Estás seguro?</h2>',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                customClass: {
                    title: 'swal-title', // Clase CSS para el título personalizado
                },
                // Permite que el HTML se muestre en la notificación
                allowHtml: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        '<h2 class="text-center mb-4 font-alt">Eliminado</h2>',
                        'El psicólogo ' + nombre + ' ha sido eliminado.',
                        'success'
                    )
                }
            });
        }
    </script>

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



