<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SESIONES PROGRAMADAS</title>

    <!-- Enlaces a los estilos CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/base/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />

    <!-- Google fonts-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

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

    <!-- Modal para programar nueva sesion -->
    <div class="modal fade" id="formularioRegistroModal" tabindex="-1" aria-labelledby="formularioRegistroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-alt" id="crearHorarioModalLabel">Programar sesión</h5>
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
                                                <option value="{{ $paciente->paciente_id }}" data-name="{{ $paciente->name }} {{ $paciente->apellidos }}">{{ $paciente->name }} - {{ $paciente->ci }}</option>
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
                                        <input type="time" class="form-control" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px; margin-right: 10px;" id="horaInicio" name="horaInicio" min="00:00" max="11:59" step="3600">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Hasta</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="horaFin" name="horaFin" min="00:00" max="11:59" step="3600" readonly>
                                    </div>
                                    <div id="time-error-maniana" class="text-danger" style="display:none;">La hora de inicio debe ser menor que la hora de fin.</div>
                                    <div id="error-message" class="text-danger" style="display: none;">La diferencia entre las horas debe ser de exactamente una hora.</div>
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
                                            <option value=""></option>
                                            @foreach ($pacientes as $paciente)
                                                <option value="{{ $paciente->paciente_id }}" data-name="{{ $paciente->name }} {{ $paciente->apellidos }}">{{ $paciente->name }} - {{ $paciente->ci }}</option>
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
                                        <input type="time" class="form-control" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px; margin-right: 10px;" id="horaInicioT" name="horaInicioT" step="3600">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Hasta</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="horaFinT" name="horaFinT" step="3600" readonly>
                                    </div>
                                    <div id="time-error-tarde" class="text-danger" style="display:none;">La hora de inicio debe ser menor que la hora de fin.</div>
                                    <div id="error-message-T" class="text-danger" style="display: none;">La diferencia entre las horas debe ser de exactamente una hora.</div>
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
                    <p class="lead fw-normal text-muted mb-5 ttNorms" style="line-height: 1.5em;">Consulta las sesiones que tienes programadas para estar al tanto de tus compromisos y seguir el progreso de tus pacientes. </p>
                    <div class="text-end mb-3">
                        <button class="btn btn-outline-primary btn-lg btn-paso1 fw-bold" onclick="window.location.href='{{ route('psicologo.sesion') }}'">>
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
                                        <th>Estado de la Sesión</th>
                                        <th>Estado de Pago</th>
                                        <th>Modalidad</th>
                                        <th>Editar Sesión</th>
                                        <th>Cancelar Sesión</th>
                                        <th>Ver Comprobante</th>
                                        <th>Detalle de la sesión</th>
                                        <th>Documentos</th>
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
                    <!-- <p><strong>Diagnóstico:</strong> <span id="diagnostico"></span></p>
                    <p><strong>Archivo Adjunto:</strong> <span id="archivoAdjunto"></span></p> -->
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Subir documentos -->
    <div class="modal fade" id="subirDoc" tabindex="-1" aria-labelledby="subirDocLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title font-alt" id="subirDocLabel">Subir Documentos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div id="uploaded-documents">
                        <!-- <h5 id="title-modal-docs">Documentos subidos:</h5>  -->
                        <div class="notification-body" id="document-list">
                            
                        </div>
                    </div>

                    <form action="{{ route('file.upload') }}" method="post" class="dropzone" id="my-awesome-dropzone" style="display: none;">
                        @csrf
                        <input type="hidden" name="sesion_ids" id="sesion_ids">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar sesión -->
    <div class="modal fade" id="editarSesionModal" tabindex="-1" aria-labelledby="editarSesionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title font-alt">Editar Sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editarSesionForm" action="{{ route('psicologo.edit.sesion') }}" method="POST">
                    @csrf
                        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="sesion_id_" id="sesion_id_">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="editarFechaSesion" class="form-label">Fecha de la Sesión<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="editarFechaSesion" name="editarFechaSesion"  placeholder="YYYY-MM-DD" required>
                                <div id="date-error-edit" class="text-danger" style="display:none;">La fecha debe ser mayor a la fecha actual.</div>
                            </div>
                            <div class="col">
                                <label for="editarHoraInicio" class="form-label">Hora Inicio<span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="editarHoraInicio" name="editarHoraInicio" placeholder="HH:MM" required>
                            </div>
                            <div class="col">
                                <label for="editarHoraFin" class="form-label">Hora Fin</label>
                                <input type="time" class="form-control" id="editarHoraFin" name="editarHoraFin" placeholder="HH:MM" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="editarCIPaciente" class="form-label">CI Paciente</label>
                                <input type="text" class="form-control" id="editarCIPaciente" placeholder="Número de CI" readonly>
                            </div>
                            <div class="col">
                                <label for="editarNombrePaciente" class="form-label">Nombre(s)</label>
                                <input type="text" class="form-control" id="editarNombrePaciente" placeholder="Nombre(s) del paciente" readonly>
                            </div>
                            <div class="col">
                                <label for="editarApellidosPaciente" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="editarApellidosPaciente" placeholder="Apellidos del paciente" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editarDescripcionSesion" class="form-label">Descripción de la Sesión<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="editarDescripcionSesion" name="editarDescripcionSesion" rows="3" placeholder="Detalles de la sesión" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editarDiagnostico" class="form-label">Diagnóstico</label>
                            <input type="text" class="form-control" id="editarDiagnostico" name="editarDiagnostico" placeholder="Diagnóstico del paciente">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="btn-sesion-edit">Editar Sesión</button>
                            <button type="button" class="btn btn-primary" onclick="finalizarSesion()" id="btn-sesion-fin" value="">Marcar como finalizada</button>
                        </div>
                    </form>
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

        function verComprobante(sesion_id) {

            fetch(`/comprobante/${sesion_id}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.url) {
                        //onsole.log(data.isTerminado + "fasdflkjsfl")
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
            //document.getElementById('diagnostico').innerText = diagnostico;
            //document.getElementById('archivoAdjunto').innerText = archivoAdjunto;

            // Muestra el modal
            $('#infoPacienteModal').modal('show');
        }
    </script>


<!-- Enlaces a los scripts JS -->
<script src="{{asset('vendors/base/vendor.bundle.base.js')}}"></script>
<script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('js/jquery.cookie.js')}}" type="text/javascript"></script>
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/hoverable-collapse.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>
<script src="{{asset('js/todolist.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('vendors/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    <script>
        $('#filtroNombre').autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{ route('search.sesion.nombre') }}",
                    dataType: 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data){
                        response(data)
                    }
                });
            }
        });

        $('#filtroCI').autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{ route('search.sesion.ci') }}",
                    dataType: 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data){
                        console.log(data);
                        response(data)
                    }
                });
            }
        });

        Dropzone.options.myAwesomeDropzone = {
            headers:{
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dictDefaultMessage: "Arrastre un documento al recuadro para subirlo",
            maxFilesize: 5
        };

    </script>

    <script>
        $(document).ready(function() {
            function cargarSesiones(){
                var fecha = $('#filtroFecha').val();
                var nombre = $('#filtroNombre').val();
                var ci = $('#filtroCI').val();
                
                $.ajax({
                    url: '/psicologo/getSesiones',
                    type: 'GET',
                    data: {
                        fecha: fecha,
                        nombre: nombre,
                        ci: ci
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#sesiones-body').empty();
                    
                        // Recorrer los datos y agregar filas a la tabla
                        $.each(data, function(index,sesiones) {
                            console.log(sesiones);
                            console.log('.....');
                            // TODO estado de las sesiones: Terminado, Cancelado , activo
                            var fechaInicio = sesiones.fecha_hora_inicio.split(' ')[0]; // Obtenemos solo la parte de la fecha
                            var horaInicio = sesiones.fecha_hora_inicio.split(' ')[1].slice(0, 5); // Obtenemos solo la parte de la hora y la cortamos para obtener HH:MM
                            var horaFin = sesiones.fecha_hora_fin.split(' ')[1].slice(0, 5);
                            var estado_pago = sesiones.isTerminado == 0? 'Pendiente': 'Realizado';
                            var paciente_ci = sesiones.ci == null? 'No especificado': sesiones.ci;
                            var estado_sesion = sesiones.calificacion || sesiones.estado=='Terminada' ? 'Realizado': 'No realizado'; // Si se realizo la sesion o no
                            var icon_cancel = sesiones.estado == 'activo'? `<i class="fas fa-times-circle text-danger" onclick="confirmarCancelar(${sesiones.sesion_id})" title="Cancelar Sesión"></i>`: `<p class="text-danger">Cancelado</p>`;
                            var icon_edit_sesion = sesiones.estado == 'activo'? `<i class='fas fa-edit text-primary' onclick="editarSesion(${sesiones.sesion_id},'${fechaInicio}', '${horaInicio}' , 
                                                                                                                                            '${horaFin}', '${paciente_ci}', '${sesiones.name}', 
                                                                                                                                            '${sesiones.apellidos}', '${sesiones.descripcion_sesion}', ${sesiones.calificacion}, ${sesiones.isTerminado})" title='Editar Sesión'></i>`
                            :'<i class="fas fa-edit" style="color: ##7B7D7D;"  aria-hidden="true"></i>';
                            var icon_upload = sesiones.estado == 'activo' || sesiones.estado == 'Terminada' ? 
                                `<i class="fa fa-upload" style="color: #27FF00;" onclick="subir(${sesiones.sesion_id})" aria-hidden="true"></i>`: 
                                `<i class="fa fa-upload" style="color: ##7B7D7D;" aria-hidden="true"></i>`;
                            
                            if(sesiones.estado == 'activo' && sesiones.isTerminado!=1){
                                icon_cancel = `<i class="fas fa-times-circle text-danger" onclick="confirmarCancelar(${sesiones.sesion_id})" title="Cancelar Sesión"></i>`;
                            } else {
                                icon_cancel = `<i class="fas fa-times-circle text-secondary" title="Cancelar Sesión"></i>`;
                            }

                        
                            $('#sesiones-body').append(`
                                <tr>
                                    <td>${fechaInicio}</td>
                                    <td>${horaInicio} - ${horaFin}</td>
                                    <td>${paciente_ci}</td>
                                    <td>${sesiones.name}</td>
                                    <td>${sesiones.apellidos}</td>
                                    <td>${sesiones.descripcion_sesion}</td>
                                    <td>${estado_sesion}</td>
                                    <td>${estado_pago}</td>
                                    <td>${sesiones.modalidad}</td>
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
                                    <td class="action-icons">
                                        ${icon_upload}
                                    </td>
                                </tr>
                            `);
                        });

                    },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error al obtener sesiones:', textStatus, errorThrown);
                }
                });
            }

            cargarSesiones();
            window.filtrarPacientes = function() {
                cargarSesiones();
            }
        });

        function editarSesion(sesion_id, fecha, horaInicio, 
                            horaFin, ci, nombre, apellidos, 
                            descripcion, diagnostico, isTerminado){

            console.log(isTerminado)
            if (isTerminado) {
                document.getElementById('btn-sesion-fin').disabled = false;
            }else {
                document.getElementById('btn-sesion-fin').disabled = true;
            }
            ciForm = ci == 'No especificado'? '': ci;

            document.getElementById('sesion_id_').value = sesion_id;
            document.getElementById('btn-sesion-fin').value = sesion_id;
            document.getElementById('editarFechaSesion').value = fecha;
            document.getElementById('editarHoraInicio').value = horaInicio;
            document.getElementById('editarHoraFin').value = horaFin;
            document.getElementById('editarCIPaciente').value = ciForm;
            document.getElementById('editarNombrePaciente').value = nombre;
            document.getElementById('editarApellidosPaciente').value = apellidos;
            document.getElementById('editarDescripcionSesion').value = descripcion;
            document.getElementById('editarDiagnostico').value = diagnostico;
            
            // Abrir el modal
            var modal = new bootstrap.Modal(document.getElementById('editarSesionModal'));
            modal.show();
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

        // function subir (sesion_id){
        //     //console.log("subir imagen");
        //     var modal = new bootstrap.Modal(document.getElementById('subirDoc'));
        //     document.getElementById('sesion_ids').value = sesion_id;

        //     var isTerminada = estadoSesion(sesion_id);
        //     loadDocuments(sesion_id, isTerminada);

        //     modal.show();
        // }
        async function subir(sesion_id) {
            var modal = new bootstrap.Modal(document.getElementById('subirDoc'));
            document.getElementById('sesion_ids').value = sesion_id;

            try {
                var isTerminada = await estadoSesion(sesion_id);
                loadDocuments(sesion_id, isTerminada);
            } catch (error) {
                console.error('Error al verificar el estado de la sesión:', error);
            }

            modal.show();
        }

        // function estadoSesion (sesion_id){
        //     var isTerminada = true;
        //     $.ajax({
        //         url: '/sesion/estado/'+sesion_id,
        //         type: 'GET',
        //         success: function(data) {
        //             var form = document.getElementById('my-awesome-dropzone');
        //             if(data.estado == 'Terminada'){
        //                 isTerminada = true;
        //                 console.log('esta terminada true');
        //                 form.style.display = 'none'; 
        //                 document.getElementById('subirDocLabel').textContent = 'Documentos subidos';
        //             }else {
        //                 isTerminada = false;
        //                 console.log('no esta terminada false');
        //                 form.style.display = 'block'; 
        //                 document.getElementById('subirDocLabel').textContent = 'Subir Documentos';
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(error);
        //         }
        //     }); 

        //     return isTerminada;
        // }
        function estadoSesion(sesion_id) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: '/sesion/estado/' + sesion_id,
                    type: 'GET',
                    success: function(data) {
                        var form = document.getElementById('my-awesome-dropzone');
                        if (data.estado == 'Terminada') {
                            form.style.display = 'none'; 
                            document.getElementById('subirDocLabel').textContent = 'Documentos subidos';
                            resolve(true);
                        } else {
                            form.style.display = 'block'; 
                            document.getElementById('subirDocLabel').textContent = 'Subir Documentos';
                            resolve(false);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        reject(error);
                    }
                });
            });
        }


        function loadDocuments(sesion_id, isTerminada) {
            console.log(isTerminada);
            fetch(`/sesion/${sesion_id}/documents`)
                .then(response => response.json())
                .then(data => {
                    const documentList = document.getElementById('document-list');
                    if (!documentList) {
                        console.error('Elemento document-list no encontrado');
                        return;
                    }

                    let htmlContent = '';
                    data.forEach(document => {
                        const extension = document.url.split('.').pop().toLowerCase();

                        if(isTerminada){
                            if (['jpg', 'jpeg', 'png', 'gif'].includes(extension)) {
                                htmlContent += `<div class="notification-item rounded bg-primary py-2 px-3 m-2 border-0 d-flex justify-content-between align-items-center">
                                                <a href="${document.url}" target="_blank"><img src="${document.url}" alt="${document.url}" width="100" height="75"></a>
                                                <form action="{{route('sesion.documents.delete')}}" class="d-inline" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="file_id" id="file_id" value="${document.id}"></input>
                                                </form>
                                                </div>`;
                            } else {
                                htmlContent += `<div class="notification-item rounded bg-primary py-2 px-3 m-2 border-0 d-flex justify-content-between align-items-center">
                                                <a href="${document.url}" target="_blank" width="100">documento</a>
                                                <form action="{{route('sesion.documents.delete')}}" class="d-inline" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="file_id" id="file_id" value="${document.id}"></input>
                                                </form>
                                                </div>`;
                            }
                        }else{
                            if (['jpg', 'jpeg', 'png', 'gif'].includes(extension)) {
                                htmlContent += `<div class="notification-item rounded bg-primary py-2 px-3 m-2 border-0 d-flex justify-content-between align-items-center">
                                                <a href="${document.url}" target="_blank"><img src="${document.url}" alt="${document.url}" width="100" height="75"></a>
                                                <form action="{{route('sesion.documents.delete')}}" class="d-inline" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="file_id" id="file_id" value="${document.id}"></input>
                                                    <button type"submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                                </div>`;
                            } else {
                                htmlContent += `<div class="notification-item rounded bg-primary py-2 px-3 m-2 border-0 d-flex justify-content-between align-items-center">
                                                <a href="${document.url}" target="_blank" width="100">documento</a>
                                                <form action="{{route('sesion.documents.delete')}}" class="d-inline" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="file_id" id="file_id" value="${document.id}"></input>
                                                    <button type"submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                                </div>`;
                            }
                        }
                    });

                    // Insertar el HTML en el elemento document-list
                    documentList.innerHTML = htmlContent;
                })
                .catch(error => console.error('Error al cargar los documentos:', error));
        }

        document.getElementById('btn-sesion-edit').addEventListener('click', function(event){
            event.preventDefault(); 
            const fechaAgenda = document.getElementById('editarFechaSesion').value;
            const currentDate = new Date().toISOString().split('T')[0];
            if(fechaAgenda <= currentDate){
                document.getElementById('date-error-edit').style.display = 'block';
            }else{
                document.getElementById('date-error-edit').style.display = 'none';
                let form = $('#editarSesionForm');
                let formData = form.serialize();
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        Swal.fire(
                            '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                            `Sesion actualizada con exito!!!`,
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
            }
        });

        document.getElementById('submit-button-maniana').addEventListener('click', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario por defecto
            //validar_fecha('fechaAgendaManiana');
            const fechaAgenda = document.getElementById('fechaAgendaManiana').value;
            const currentDate = new Date().toISOString().split('T')[0];

            if (fechaAgenda <= currentDate) {
                document.getElementById('date-error-maniana').style.display = 'block';
            } else {
                document.getElementById('date-error-maniana').style.display = 'none';
                document.getElementById('date-error-tarde').style.display = 'none';
                var horaInicio = document.getElementById('horaInicio').value;
                var horaFin = document.getElementById('horaFin').value;
                var errorMessage = document.getElementById('error-message');

                if (horaInicio >= horaFin) {
                    event.preventDefault();
                    document.getElementById('time-error-maniana').style.display = 'block';
                } else {
                    document.getElementById('time-error-maniana').style.display = 'none';
                    document.getElementById('time-error-tarde').style.display = 'none';
                    var inicio = horaInicio;
                    var fin = horaFin;

                    if (inicio && fin) {
                        const [inicioHours, inicioMinutes] = inicio.split(':').map(Number);
                        const [finHours, finMinutes] = fin.split(':').map(Number);

                        const inicioTotalMinutes = inicioHours * 60 + inicioMinutes;
                        const finTotalMinutes = finHours * 60 + finMinutes;

                        const difference = (finTotalMinutes - inicioTotalMinutes) / 60;

                        if (difference !== 1) {
                            errorMessage.style.display = 'block';
                        } else {
                            errorMessage.style.display = 'none';
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
                        }
                    }
                    
                }
            }
        });

        document.getElementById('submit-button-tarde').addEventListener('click', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario por defecto
            const fechaAgenda = document.getElementById('fechaAgendaTarde').value;
            const currentDate = new Date().toISOString().split('T')[0];

            if (fechaAgenda <= currentDate) {
                event.preventDefault();
                document.getElementById('date-error-tarde').style.display = 'block';            
            } else {
                document.getElementById('date-error-maniana').style.display = 'none';
                document.getElementById('date-error-tarde').style.display = 'none';
            
                var param = 2
                const horaInicio = document.getElementById('horaInicioT').value;
                const horaFin = document.getElementById('horaFinT').value;
                var errorMessage = document.getElementById('error-message-T');

                if (horaInicio >= horaFin) {
                    document.getElementById('time-error-tarde').style.display = 'block';
                } else {
                    document.getElementById('time-error-maniana').style.display = 'none';
                    document.getElementById('time-error-tarde').style.display = 'none';
                    var inicio = horaInicio;
                    var fin = horaFin;

                    if (inicio && fin) {
                        const [inicioHours, inicioMinutes] = inicio.split(':').map(Number);
                        const [finHours, finMinutes] = fin.split(':').map(Number);

                        const inicioTotalMinutes = inicioHours * 60 + inicioMinutes;
                        const finTotalMinutes = finHours * 60 + finMinutes;

                        const difference = (finTotalMinutes - inicioTotalMinutes) / 60;

                        if (difference !== 1) {
                            errorMessage.style.display = 'block';
                        } else {
                            errorMessage.style.display = 'none';
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
                        }
                    }

                    
                }
            }
        });

        document.getElementById('paciente_id_m').addEventListener('change', function() {
            var pacienteNombre = this.options[this.selectedIndex].getAttribute('data-name');
            document.getElementById('paciente_nombre_m').value = pacienteNombre ? pacienteNombre : 'Paciente no seleccionado';
        });

        document.getElementById('paciente_id_t').addEventListener('change', function() {
            var pacienteNombre = this.options[this.selectedIndex].getAttribute('data-name');
            document.getElementById('paciente_nombre_t').value = pacienteNombre ? pacienteNombre : 'Paciente no seleccionado';
        });

        // Función para actualizar la hora de editarHoraFin
        function actualizarHoraFin3() {
            var horaInicio = document.getElementById("horaInicioT").value;
            
            var horaInicioSplit = horaInicio.split(":");
            var hora = parseInt(horaInicioSplit[0]);
            var minuto = parseInt(horaInicioSplit[1]);
            
            hora = hora + 1;
            
            if (hora > 23) {
                hora = hora - 24;
            }
            
            hora = (hora < 10 ? "0" : "") + hora;
            minuto = (minuto < 10 ? "0" : "") + minuto;
            
            var nuevaHora = hora + ":" + minuto;
            
            document.getElementById("horaFinT").value = nuevaHora;
        }

        function actualizarHoraFin2() {
            var horaInicio = document.getElementById("editarHoraInicio").value;
            
            var horaInicioSplit = horaInicio.split(":");
            var hora = parseInt(horaInicioSplit[0]);
            var minuto = parseInt(horaInicioSplit[1]);
            
            hora = hora + 1;
            
            if (hora > 23) {
                hora = hora - 24;
            }
            
            hora = (hora < 10 ? "0" : "") + hora;
            minuto = (minuto < 10 ? "0" : "") + minuto;
            
            var nuevaHora = hora + ":" + minuto;
            
            document.getElementById("editarHoraFin").value = nuevaHora;
        }

        function actualizarHoraFin() {
            var horaInicio = document.getElementById("horaInicio").value;
            
            var horaInicioSplit = horaInicio.split(":");
            var hora = parseInt(horaInicioSplit[0]);
            var minuto = parseInt(horaInicioSplit[1]);
            
            hora = hora + 1;
            
            if (hora > 23) {
                hora = hora - 24;
            }
            
            hora = (hora < 10 ? "0" : "") + hora;
            minuto = (minuto < 10 ? "0" : "") + minuto;
            
            var nuevaHora = hora + ":" + minuto;
            
            document.getElementById("horaFin").value = nuevaHora;
        }

        function finalizarSesion (){
            var sesion_id = document.getElementById('btn-sesion-fin').value;
            //console.log(sesion_id);

            Swal.fire({
                title: "Estas seguro?",
                text: "No podra revertir este cambio.",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, estoy seguro"
            }).then((result) => {
            if (result.isConfirmed) {
                // Terminada = sesion.estado
                $.ajax({
                    url: '/sesion/terminada/'+sesion_id,
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        Swal.fire(
                            '<h2 class="text-center mb-4 font-alt">Exito!</h2>',
                            `Sesión marcada como finalizada.`,
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

        document.getElementById("horaInicio").addEventListener("change", actualizarHoraFin);

        document.getElementById("editarHoraInicio").addEventListener("change", actualizarHoraFin2);

        document.getElementById("horaInicioT").addEventListener("change", actualizarHoraFin3);

    </script>
</body>
</html>

</body>
</html>
