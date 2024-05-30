<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SESIONES PROGRAMADAS</title>

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

        /* Estilos para el calendario */
        .agregar-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .custom-checkboxes .form-check-input {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .custom-checkboxes .form-check-label {
            font-size: 16px;
            padding-top: 3px;
        }

        .custom-checkboxes .form-check-inline {
            margin-right: 20px;
        }

        /* Estilos del formulario */

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group-text {
            background-color: #7f8dba;
            border-color: #ddd;
        }

        .form-control {
            border-color: #ddd;
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
    @include('components.navigationbar-user')

    <!-- Ventana emergente de notificaciones -->
    @include('components.notifications-user')

    <!-- Menú lateral -->
    @include('components.sidebar-user')

    <div class="modal fade" id="formularioRegistroModal" tabindex="-1" aria-labelledby="formularioRegistroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-alt" id="crearHorarioModalLabel">Agregar Horario de Atención</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Pestañas para alternar entre mañana y tarde -->
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="manana-tab" data-bs-toggle="tab" data-bs-target="#manana" type="button" role="tab" aria-controls="manana" aria-selected="true">Turno Mañana</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tarde-tab" data-bs-toggle="tab" data-bs-target="#tarde" type="button" role="tab" aria-controls="tarde" aria-selected="false">Turno Tarde</button>
                        </li>
                    </ul>
                    <!-- Contenido de las pestañas -->
                    <div class="tab-content " id="myTabContent">
                        <div class="tab-pane fade show active mt-4" id="manana" role="tabpanel" aria-labelledby="manana-tab">
                            <!-- Contenido para horario de atención de la mañana -->
                            <form id="sesion-form-m" action="{{ route('psicologo.create.sesion') }}" method="POST">
                                @csrf

                                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="id_horario_dia" value="1"><!-- 1: mañana, 2: tarde -->
                                
                                <!-- Campos del formulario para horario de la mañana -->
                                <div class="form-group">
                                    <label for="horaInicio" class="form-label" style="font-size: 18px; margin-bottom: 20px;">Horario de Atención Turno Mañana</label>
                                    <div class="mb-3">
                                        <label for="paciente_id_m" class="form-label">CI Paciente <span class="text-danger">*</span></label>
                                        <select id="paciente_id_m" name="paciente_id_m" class="form-select" required>
                                            <option value=""></option>
                                            @foreach ($pacientes as $paciente)
                                                <option value="{{ $paciente->paciente_id }}" data-name="{{ $paciente->name }} {{ $paciente->apellidos }}">{{ $paciente->ci }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Paciente nombre</label>
                                        <input type="text" id="paciente_nombre_m" class="form-control" placeholder="Paciente no seleccionado" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc_sesion">Nota adicional de sesion: <span class="text-secondary">(opcional)</span></label><br>
                                        <textarea id="desc_sesion" name="desc_sesion" class="form-control"></textarea>
                                    </div>
                                    <label>Duración de la sesión: <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Desde</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px; margin-right: 10px;" id="horaInicio" name="horaInicio" min="00:00" max="11:59">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Hasta</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="horaFin" name="horaFin" min="00:00" max="11:59">
                                    </div>
                                    <div id="time-error-maniana" class="text-danger" style="display:none;">La hora de inicio debe ser menor que la hora de fin.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="fechaAgendaManiana" class="form-label">Fecha: <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="fechaAgendaManiana" name="fechaAgendaManiana" required>
                                    <div id="date-error-maniana" class="text-danger" style="display:none;">La fecha debe ser mayor a la fecha actual.</div>
                                </div>
                                <!-- Botones de guardar y cancelar para horario de la mañana -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" id="submit-button-maniana">Guardar Horario</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade mt-4" id="tarde" role="tabpanel" aria-labelledby="tarde-tab">
                            <!-- Contenido para horario de atención de la tarde -->
                            <form id="sesion-form-t" action="{{ route('psicologo.create.sesion') }}" method="POST">
                                @csrf

                                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="id_horario_dia" value="2">
                                <!-- Campos del formulario para horario de la tarde -->
                                <div class="form-group">
                                    <label for="horaInicioT" class="form-label" style="font-size: 18px; margin-bottom: 20px;">Horario de Atención Turno Tarde</label>
                                    <div class="mb-3">
                                        <label for="paciente_id_t" class="form-label">CI Paciente <span class="text-danger">*</span></label>
                                        <select id="paciente_id_t" name="paciente_id_t" class="form-select" required>
                                            @foreach ($pacientes as $paciente)
                                                <option value="{{ $paciente->paciente_id }}" data-name="{{ $paciente->name }} {{ $paciente->apellidos }}">{{ $paciente->ci }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Paciente nombre</label>
                                        <input type="text" id="paciente_nombre_t" class="form-control" placeholder="Paciente no seleccionado" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcionCV">Nota adicional de sesion: <span class="text-secondary">(opcional)</span></label><br>
                                        <textarea id="descripcionCV" name="descripcionCV" class="form-control"></textarea>
                                    </div>
                                    <label>Duración de la sesión: <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Desde</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px; margin-right: 10px;" id="horaInicioT" name="horaInicioT">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Hasta</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="horaFinT" name="horaFinT">
                                    </div>
                                    <div id="time-error-tarde" class="text-danger" style="display:none;">La hora de inicio debe ser menor que la hora de fin.</div>
                                </div>

                                <div class="mb-3">
                                    <label for="fechaAgendaTarde" class="form-label">Fecha: <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="fechaAgendaTarde" name="fechaAgendaTarde" required>
                                    <div id="date-error-tarde" class="text-danger" style="display:none;">La fecha debe ser mayor a la fecha actual.</div>
                                </div>
                                <!-- Botones de guardar y cancelar para horario de la tarde -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" id="submit-button-tarde">Guardar Horario</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <main class="main-content ">
        <section class="py-1 d-flex justify-content-center align-items-center" id="sesiones">

            <div class="container px-5">
                <div class="container px-5 text-center shadow-lg p-5 rounded mt-2">
                    <!-- Título -->
                    <h2 class="display-3 lh-1 mb-5 font-alt">Lista de Sesiones Programadas</h2>
                    <p class="lead fw-normal text-muted mb-5 ttNorms" style="line-height: 1.5em;">Consulta las sesiones que tienes programadas para estar al tanto de tus compromisos y seguir el progreso de tus pacientes.</p>
                    <div class="text-end mb-3">
                        <button class="btn btn-outline-primary btn-lg btn-paso1 fw-bold" onclick="limpiar()">
                            <i class="bi bi-person-plus-fill me-2"></i> Programar nueva Sesión
                        </button>
                    </div>
                    <div class="row mb-3">
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
                                        <th>Editar Sesión</th>
                                        <th>Cancelar Sesión</th>
                                        <th>Ver Comprobante</th>
                                        <th>Detalle de la sesión</th>
                                    </tr>
                                </thead>
                                <tbody id="sesiones-body">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>

    <!-- Modal de Comprobante de Pago -->
    <div class="modal fade" id="modalComprobantePago" tabindex="-1" aria-labelledby="modalComprobantePagoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title font-alt" id="modalComprobantePagoLabel">Comprobante de Pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" id="sesion_id" name="sesion_id" value="">

                    <div class="my-5">
                        <img id="imagenComprobante" src="" alt="Comprobante de Pago" style="max-width: 100%;">
                    </div>

                    <div id="btn-confirm-comprobante">
                        <button type="button" onclick="aceptarComprobante()" class="btn btn-success btn-lg">Aceptar</button>
                        <button type="button" onclick="rechazarComprobante()" class="btn btn-danger btn-lg">Rechazar</button>
                    </div>

                    <p id="mensajeError" style="display: none;">El paciente aun no subio su comprobante.</p>
                    <p id="mensajeValidado" class="fw-bold text-success" style="display: none;">Comprobante validado.</p>
                </div>
                <!-- <div class="modal-footer justify-content-center font-alt">
                    <button type="button" id="btnDescargar" class="btn btn-primary" onclick="confirmarPago()" style="font-size: 20px;">
                        <i class="bi bi-download" style="font-size: 24px;"></i> DESCARGAR
                    </button> 
                </div> -->
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

        function verComprobante(sesion_id) {

            fetch(`/comprobante/${sesion_id}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.url) {
                        console.log(data.isTerminado + "fasdflkjsfl")
                        var imagenComprobante = document.getElementById("imagenComprobante");
                        imagenComprobante.src = data.url;

                        document.getElementById("mensajeError").style.display = "none";
                        document.getElementById("imagenComprobante").style.display = "block; max-width: 100%;";
                        if(data.isTerminado === 0){
                            document.getElementById("btn-confirm-comprobante").style.display = "block"
                            document.getElementById("mensajeValidado").style.display = "none"
                        }else{
                            document.getElementById("btn-confirm-comprobante").style.display = "none"
                            document.getElementById("mensajeValidado").style.display = "block"
                        }
                        //document.getElementById("btnDescargar").setAttribute("type", "button");

                        document.querySelector('#sesion_id').value = sesion_id;

                        var modal = new bootstrap.Modal(document.getElementById('modalComprobantePago'));
                        modal.show();
                    } else {
                        //console.error('Error al obtener el comprobante:', data.error);
                        document.getElementById("mensajeValidado").style.display = "none"
                        document.getElementById("btn-confirm-comprobante").style.display = "none"
                        document.getElementById("mensajeError").style.display = "block";
                        document.getElementById("imagenComprobante").style.display = "none";
                        //document.getElementById("btn-confirm-comprobante").style.display = "hidden"
                        //document.getElementById("btnDescargar").setAttribute("type", "hidden");

                        document.querySelector('#sesion_id').value = '';

                        var modal = new bootstrap.Modal(document.getElementById('modalComprobantePago'));
                        modal.show();
                    }
                })
                .catch(error => {
                    console.error('Error en la solicitud AJAX:', error);
                });
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
                var estado_sesion = sesiones.calificacion? 'Realizado': 'No realizado'; // Si se realizo la sesion o no
                var icon_cancel = sesiones.estado == 'activo'? `<i class="fas fa-times-circle text-danger" onclick="confirmarCancelar(${sesiones.sesion_id})" title="Cancelar Sesión"></i>`: `<p class="text-danger">Cancelado</p>`;
                var icon_edit_sesion = sesiones.estado == 'activo'? '<i class="fas fa-edit text-primary" onclick="editarSesion()" title="Editar Sesión"></i>':'<i class="fas fa-check-circle"></i>';

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
                            ${icon_edit_sesion}   
                        </td>
                        <td class="action-icons">
                            ${icon_cancel}
                        </td>
                        <td class="action-icons">
                            <i class="fa-solid fa-file-invoice-dollar" style="color: #d86464;" onclick="verComprobante(${sesiones.sesion_id})" title="Ver Comprobante"></i>
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

    function aceptarComprobante(){
        var sesion_id = document.querySelector('#sesion_id').value;
        $.ajax({
            url: '/confirmar/comprobante/'+sesion_id,
            type: 'GET',
            success: function(data) {
                console.log("exito!!!!  ");
                Swal.fire(
                    '<h2 class="text-center mb-4 font-alt">Exito</h2>',
                    `Confirmación de comprobante exitosa`,
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
    
    function rechazarComprobante(){
        var sesion_id = document.querySelector('#sesion_id').value;
        $.ajax({
            url: '/rechazar/comprobante/'+sesion_id,
            type: 'GET',
            success: function(data) {
                console.log("exito!!!!  ");
                Swal.fire(
                    '<h2 class="text-center mb-4 font-alt">Exito</h2>',
                    `Se envio notificación al paciente para que regule su comprobante.`,
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

    function limpiar() {
        // document.getElementById("divConfirmarContrasena").style.display = "block";
        // document.getElementById("btnAddOrEdit").textContent = "Registrar Psicologo";
        // document.getElementById("psicologo_id").value = "";
        $('#formularioRegistroModal').modal('show');
    }

    document.getElementById('submit-button-maniana').addEventListener('click', function(event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto
        validar_fecha('fechaAgendaManiana');
        validar_hora('horaInicio', 'horaFin', 1);

        let form = $('#sesion-form-m');
        let formData = form.serialize();

        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: formData,
            success: function(response) {
                Swal.fire(
                    '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                    `Sesion registrada con exito!!!`,
                    'success'
                )
                setTimeout(function() {
                    window.location.reload();
                }, 3000);
            },
            error: function(response) {
                Swal.fire({
                    title: "Error",
                    text: response.responseJSON.error,
                    icon: "error"
                });
            }
        });
    });

    // document.getElementById('submit-button-maniana').addEventListener('click', function(event) {
    //     validar_fecha('fechaAgendaManiana');
    //     validar_hora('horaInicio','horaFin', 1);
    // });

    document.getElementById('submit-button-tarde').addEventListener('click', function(event) {
        event.preventDefault(); // Prevenir el envío del formulario por defecto
        validar_fecha('fechaAgendaTarde');
        validar_hora('horaInicioT','horaFinT', 2);

        let form = $('#sesion-form-t');
        let formData = form.serialize();

        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: formData,
            success: function(response) {
                Swal.fire(
                    '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                    `Sesion registrada con exito!!!`,
                    'success'
                )
                setTimeout(function() {
                    window.location.reload();
                }, 3000);
            },
            error: function(response) {
                Swal.fire({
                    title: "Error",
                    text: response.responseJSON.error,
                    icon: "error"
                });
            }
        });
    });

    // document.getElementById('submit-button-tarde').addEventListener('click', function(event) {
    //     validar_fecha('fechaAgendaTarde');
    //     validar_hora('horaInicioT','horaFinT', 2);
    // });

    function validar_fecha (horario){
        const fechaAgenda = document.getElementById(horario).value;
        const currentDate = new Date().toISOString().split('T')[0];

        if (fechaAgenda <= currentDate) {
            event.preventDefault();
            if(horario == 'fechaAgendaManiana'){
                document.getElementById('date-error-maniana').style.display = 'block';
            } else {
                document.getElementById('date-error-tarde').style.display = 'block';
            }
            
        } else {
            document.getElementById('date-error-maniana').style.display = 'none';
            document.getElementById('date-error-tarde').style.display = 'none';
        }
    }

    function validar_hora (hora_inicio, hora_fin , param){
        const horaInicio = document.getElementById(hora_inicio).value;
        const horaFin = document.getElementById(hora_fin).value;

        if (horaInicio >= horaFin) {
            event.preventDefault();
            if(param == 1){
                document.getElementById('time-error-maniana').style.display = 'block';
            } else {
                document.getElementById('time-error-tarde').style.display = 'block';
            }
        } else {
            document.getElementById('time-error-maniana').style.display = 'none';
            document.getElementById('time-error-tarde').style.display = 'none';
        }
    }

    document.getElementById('paciente_id_m').addEventListener('change', function() {
        var pacienteNombre = this.options[this.selectedIndex].getAttribute('data-name');
        document.getElementById('paciente_nombre_m').value = pacienteNombre ? pacienteNombre : 'Paciente no seleccionado';
    });

    document.getElementById('paciente_id_t').addEventListener('change', function() {
        var pacienteNombre = this.options[this.selectedIndex].getAttribute('data-name');
        document.getElementById('paciente_nombre_t').value = pacienteNombre ? pacienteNombre : 'Paciente no seleccionado';
    });
</script>
</body>
</html>

</body>
</html>
