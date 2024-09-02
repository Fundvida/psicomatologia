<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Atención Terapéutica</title>

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

    <!-- Contenido principal -->
    <main class="main-content">
        <section class="py-1 d-flex" style="min-height: calc(100vh - 100px);">
            <div class="container px-5 text-center shadow-lg p-5 rounded mt-2">
                <!-- Título -->
                <h2 class="display-3 lh-1 mb-2 font-alt">Registro de Atención Terapéutica</h2>
                <p class="lead fw-normal text-muted mb-5 ttNorms" style="line-height: 1.5em;">Registra todos los detalles de la sesión completada.</p>

                <!-- Pestañas -->
                <ul class="nav nav-tabs justify-content-center mb-4">
                    @if($paciente_tipo === 'mayor')
                        <li class="nav-item">
                            <a class="nav-link active" id="adultos-tab" data-bs-toggle="tab" href="#adultos" role="tab">Adulto</a>
                        </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link active" id="ninos-tab" data-bs-toggle="tab" href="#ninos" role="tab">Niño</a>
                    </li> 
                    @endif
                </ul>
                <div class="tab-content">
                    @if($paciente_tipo === 'mayor')
                    
                    <div class="tab-pane fade show active" id="adultos" role="tabpanel" aria-labelledby="adultos-tab">
                        <form action="{{ route('ficha.adultos.save') }}" id="formAdultos" method="POST">
                            @csrf
                            <div class="p-4 rounded shadow-lg">
                                <input type="hidden" id="sesion_id" name="sesion_id" value="{{ $results->sesion_id }}">
                                <h3 class="mb-4 font-alt">Ficha de Atención Psicológica para Adultos</h3>

                                <!-- 1. Información General -->
                                <h4 class="mb-4 font-alt text-start">1. Información General</h4>
                                <div class="mb-3 text-start">
                                    <label for="nombreNino" class="form-label">Nombre del Paciente:</label>
                                    <input type="text" class="form-control" value="{{ $results->name }} {{ $results->apellidos }}" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="edad" class="form-label">Edad:</label>
                                    <input type="number" class="form-control" value="{{ $results->edad }}" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control" value="{{ $results->fecha_nacimiento }}" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="genero" class="form-label">Género:</label>
                                    <select class="form-control" id="genero" name="genero">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="numeroSesion" class="form-label">Número de Sesión:</label>
                                    <input type="text" class="form-control" id="numeroSesion" name="numeroSesion" value="{{ $results->numero_sesion }}" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="fechaSesion" class="form-label">Fecha de la Sesión:</label>
                                    <input type="date" class="form-control" id="fechaSesion" name="fechaSesion" value="{{ $results->fecha_sesion }}" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="nombreTerapeuta" class="form-label">Nombre del Terapeuta:</label>
                                    <input type="text" class="form-control" id="nombreTerapeuta" name="nombreTerapeuta" value="{{ $results->nombre_psicologo }} {{ $results->apellido_psicologo }}" readonly>
                                </div>

                                <!-- 2. Motivo de la Consulta -->
                                <h4 class="mb-4 font-alt text-start">2. Motivo de la Consulta</h4>
                                <div class="mb-3 text-start">
                                    <label for="descripcionProblema" class="form-label">Descripción del Problema:</label>
                                    <textarea class="form-control" id="descripcionProblema" name="descripcionProblema" rows="3" >{{ $saved->descripcion_problema }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="objetivosTerapeuticos" class="form-label">Objetivos Terapéuticos:</label>
                                    <textarea class="form-control" id="objetivosTerapeuticos" name="objetivosTerapeuticos" rows="3">{{ $saved->objetivos_terapeuticos }}</textarea>
                                </div>

                                <!-- 3. Información de Desarrollo y Contexto -->
                                <h4 class="mb-4 font-alt text-start">3. Evaluación del Estado Actual</h4>
                                <div class="mb-3 text-start">
                                    <label for="estadoEmocional" class="form-label">Estado Emocional (Escala de 1 a 10):</label>
                                    <input type="number" class="form-control" id="estadoEmocional" name="estadoEmocional" min="1" max="10" value="{{ $saved->estado_emocional }}" >
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="sintomasReportados" class="form-label">Síntomas Reportados:</label>
                                    <textarea class="form-control" id="sintomasReportados" name="sintomasReportados" rows="3" >{{ $saved->sintomas_reportados }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="nivelEstres" class="form-label">Nivel de Estrés (Escala de 1 a 10):</label>
                                    <input type="number" class="form-control" id="nivelEstres" name="nivelEstres" rows="3" value="{{ $saved->nivel_estres }}" ></input>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="observacionTerapeuta" class="form-label">Observaciones del Terapeuta:</label>
                                    <textarea class="form-control" id="observacionTerapeuta" name="observacionTerapeuta" rows="3" >{{ $saved->observaciones_terapeuta }}</textarea>
                                </div>

                                <!-- 5. Contenido de la Sesión -->
                                <h4 class="mb-4 font-alt text-start">4. Contenido de la Sesión</h4>
                                <div class="mb-3 text-start">
                                    <label for="temasTratados" class="form-label">Temas Tratados:</label>
                                    <textarea class="form-control" id="temasTratados" name="temasTratados" rows="3" >{{ $saved->temas_tratados }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="tecnicasEstrategias" class="form-label">Técnicas y Estrategias Utilizadas:</label>
                                    <textarea class="form-control" id="tecnicasEstrategias" name="tecnicasEstrategias" rows="3" >{{ $saved->tecnicas_utilizadas }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="intervencionEspecifica" class="form-label">Intervenciones Específicas:</label>
                                    <textarea class="form-control" id="intervencionEspecifica" name="intervencionEspecifica" rows="3">{{ $saved->intervenciones_especificas }}</textarea>
                                </div>

                                <!-- 6. Actividades y Tareas Asignadas -->
                                <h4 class="mb-4 font-alt text-start">5. Actividades y Tareas Asignadas</h4>
                                <div class="mb-3 text-start">
                                    <label for="actividadesTareas" class="form-label">Tareas para el Paciente:</label>
                                    <textarea class="form-control" id="actividadesTareas" name="actividadesTareas" rows="3">{{ $saved->tareas_paciente }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="fechaEntrega" class="form-label">Fecha de Entrega:</label>
                                    <input type="date" class="form-control" id="fechaEntrega" name="fechaEntrega" value="{{ $saved->fecha_entrega }}">
                                </div>

                                <!-- 7. Progreso y Evaluación -->
                                <h4 class="mb-4 font-alt text-start">6. Progreso y Evaluación</h4>
                                <div class="mb-3 text-start">
                                    <label for="progresoObjetivos" class="form-label">Progreso en Objetivos Terapéuticos:</label>
                                    <textarea class="form-control" id="progresoObjetivos" name="progresoObjetivos" rows="3" >{{ $saved->progreso_objetivos }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="cambiosNotables" class="form-label">Cambios Notables desde la Última Sesión:</label>
                                    <textarea class="form-control" id="cambiosNotables" name="cambiosNotables" rows="3" >{{ $saved->cambios_notables }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="retroalimentacion" class="form-label">Retroalimentación del Paciente:</label>
                                    <textarea class="form-control" id="retroalimentacion" name="retroalimentacion" rows="3">{{ $saved->retroalimentacion_paciente }}</textarea>
                                </div>

                                <!-- 8. Plan para la Próxima Sesión -->
                                <h4 class="mb-4 font-alt text-start">7. Plan para la Próxima Sesión</h4>
                                <div class="mb-3 text-start">
                                    <label for="objetivosProximaSesion" class="form-label">Objetivos para la Próxima Sesión:</label>
                                    <textarea class="form-control" id="objetivosProximaSesion" name="objetivosProximaSesion" rows="3">{{ $saved->objetivos_proxima_sesion }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="areasEnfoque" class="form-label">Áreas de Enfoque:</label>
                                    <textarea class="form-control" id="areasEnfoque" name="areasEnfoque" rows="3" >{{ $saved->areas_enfoque }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="preparacionNecesaria" class="form-label">Preparación Necesaria para el Paciente:</label>
                                    <textarea class="form-control" id="preparacionNecesaria" name="preparacionNecesaria" rows="3">{{ $saved->preparacion_necesaria }}</textarea>
                                </div>
                                <!-- 9. Notas Adicionales -->
                                <h4 class="mb-4 font-alt text-start">8. Notas Adicionales</h4>
                                <div class="mb-3 text-start">
                                    <label for="notasAdicionales" class="form-label">Notas Adicionales:</label>
                                    <textarea class="form-control" id="notasAdicionales" name="notasAdicionales" rows="3">{{ $saved->notas_adicionales }}</textarea>
                                </div>
                                <div class="mt-3 text-end">
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                    <button type="button" onclick="finalizarSesion(1)" id="btn-sesion-fin" value="{{ $results->sesion_id }}" class="btn btn-primary">Terminar sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="tab-pane fade show active" id="ninos" role="tabpanel" aria-labelledby="ninos-tab">
                        <form action="{{ route('ficha.ninos.save') }}" id="formNinos" method="POST">
                            @csrf
                            <div class="p-4 rounded shadow-lg">
                                <input type="hidden" id="sesion_id" name="sesion_id" value="{{ $results->sesion_id }}">
                                <h3 class="mb-4 font-alt">Ficha de Atención Psicológica para Niños(as)</h3>

                                <!-- 1. Información General -->
                                <h4 class="mb-4 font-alt text-start">1. Información General</h4>
                                <div class="mb-3 text-start">
                                    <label for="nombreNino" class="form-label">Nombre del Niño/a:</label>
                                    <input type="text" class="form-control" value="{{ $results->name }} {{ $results->apellidos }}" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="edad" class="form-label">Edad:</label>
                                    <input type="number" class="form-control" value="{{ $results->edad }}" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control" value="{{ $results->fecha_nacimiento }}" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="genero" class="form-label">Género:</label>
                                    <select class="form-control" id="genero" name="genero" >
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="nombreTutor" class="form-label">Nombre del Tutor/Responsable:</label>
                                    <input type="text" class="form-control" value="{{ $results->tutor_name }} {{ $results->tutor_apellido }}" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="telefono" class="form-label">Teléfono de Contacto:</label>
                                    <input type="tel" class="form-control" value="{{ $results->tutor_tel }}" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="fechaSesion" class="form-label">Fecha de la Sesión:</label>
                                    <input type="date" class="form-control" value="{{ $results->fecha_sesion }}" readonly>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="nombreTerapeuta" class="form-label">Nombre del Terapeuta:</label>
                                    <input type="text" class="form-control" value="{{ $results->nombre_psicologo }} {{ $results->apellido_psicologo }}" readonly>
                                </div>

                                <!-- 2. Motivo de la Consulta -->
                                <h4 class="mb-4 font-alt text-start">2. Motivo de la Consulta</h4>
                                <div class="mb-3 text-start">
                                    <label for="descripcionProblema" class="form-label">Descripción del Problema:</label>
                                    <textarea class="form-control" id="descripcionProblema" name="descripcionProblema" rows="3" >{{ $saved->descripcion_problema }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="observacionesPadres" class="form-label">Observaciones de los Padres/Tutores:</label>
                                    <textarea class="form-control" id="observacionesPadres" name="observacionesPadres" rows="3">{{ $saved->observacion_padres_motivo }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="objetivosTerapeuticos" class="form-label">Objetivos Terapéuticos:</label>
                                    <textarea class="form-control" id="objetivosTerapeuticos" name="objetivosTerapeuticos" rows="3">{{ $saved->objetivos_terapeuticos }}</textarea>
                                </div>

                                <!-- 3. Información de Desarrollo y Contexto -->
                                <h4 class="mb-4 font-alt text-start">3. Información de Desarrollo y Contexto</h4>
                                <div class="mb-3 text-start">
                                    <label for="historiaDesarrollo" class="form-label">Historia de Desarrollo:</label>
                                    <textarea class="form-control" id="historiaDesarrollo" name="historiaDesarrollo" rows="3" >{{ $saved->historia_desarrollo }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="eventosSignificativos" class="form-label">Eventos Significativos:</label>
                                    <textarea class="form-control" id="eventosSignificativos" name="eventosSignificativos" rows="3">{{ $saved->eventos_significativos }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="relacionesFamiliares" class="form-label">Relaciones Familiares:</label>
                                    <textarea class="form-control" id="relacionesFamiliares" name="relacionesFamiliares" rows="3">{{ $saved->relaciones_familiares }}</textarea>
                                </div>

                                <!-- 4. Evaluación del Estado Actual -->
                                <h4 class="mb-4 font-alt text-start">4. Evaluación del Estado Actual</h4>
                                <div class="mb-3 text-start">
                                    <label for="estadoEmocional" class="form-label">Estado Emocional del Niño/a:</label>
                                    <textarea class="form-control" id="estadoEmocional" name="estadoEmocional" rows="3">{{ $saved->estado_emocional_nino }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="comportamientosObservados" class="form-label">Comportamientos Observados:</label>
                                    <textarea class="form-control" id="comportamientosObservados" name="comportamientosObservados" rows="3">{{ $saved->observaciones_terapeuta }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="sintomasReportados" class="form-label">Síntomas Reportados:</label>
                                    <textarea class="form-control" id="sintomasReportados" name="sintomasReportados" rows="3" >{{ $saved->sintomas_reportados }}</textarea>
                                </div>

                                <!-- 5. Contenido de la Sesión -->
                                <h4 class="mb-4 font-alt text-start">5. Contenido de la Sesión</h4>
                                <div class="mb-3 text-start">
                                    <label for="actividadesRealizadas" class="form-label">Actividades Realizadas:</label>
                                    <textarea class="form-control" id="actividadesRealizadas" name="actividadesRealizadas" rows="3">{{ $saved->intervenciones_especificas }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="tecnicasEstrategias" class="form-label">Técnicas y Estrategias Utilizadas:</label>
                                    <textarea class="form-control" id="tecnicasEstrategias" name="tecnicasEstrategias" rows="3">{{ $saved->tecnicas_utilizadas }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="temasTratados" class="form-label">Temas Tratados:</label>
                                    <textarea class="form-control" id="temasTratados" name="temasTratados" rows="3">{{ $saved->temas_tratados }}</textarea>
                                </div>

                                <!-- 6. Actividades y Tareas Asignadas -->
                                <h4 class="mb-4 font-alt text-start">6. Actividades y Tareas Asignadas</h4>
                                <div class="mb-3 text-start">
                                    <label for="tareasNino" class="form-label">Tareas para el Niño/a (si aplica):</label>
                                    <textarea class="form-control" id="tareasNino" name="tareasNino" rows="3">{{ $saved->tareas_paciente }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="fechaEntrega" class="form-label">Fecha de Entrega:</label>
                                    <input type="date" class="form-control" id="fechaEntrega" name="fechaEntrega" value="{{ $saved->fecha_entrega }}">
                                </div>

                                <!-- 7. Progreso y Evaluación -->
                                <h4 class="mb-4 font-alt text-start">7. Progreso y Evaluación</h4>
                                <div class="mb-3 text-start">
                                    <label for="progresoObjetivos" class="form-label">Progreso en Objetivos Terapéuticos:</label>
                                    <textarea class="form-control" id="progresoObjetivos" name="progresoObjetivos" rows="3">{{ $saved->progreso_objetivos }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="cambiosNotables" class="form-label">Cambios Notables desde la Última Sesión:</label>
                                    <textarea class="form-control" id="cambiosNotables" name="cambiosNotables" rows="3">{{ $saved->cambios_notables }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="retroalimentacion" class="form-label">Retroalimentación del Niño/a (si corresponde):</label>
                                    <textarea class="form-control" id="retroalimentacion" name="retroalimentacion" rows="3">{{ $saved->retroalimentacion_paciente }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="observacionesPadres2" class="form-label">Observaciones de los Padres/Tutores:</label>
                                    <textarea class="form-control" id="observacionesPadres2" name="observacionesPadres2" rows="3">{{ $saved->observacion_padres }}</textarea>
                                </div>

                                <!-- 8. Plan para la Próxima Sesión -->
                                <h4 class="mb-4 font-alt text-start">8. Plan para la Próxima Sesión</h4>
                                <div class="mb-3 text-start">
                                    <label for="objetivosProximaSesion" class="form-label">Objetivos para la Próxima Sesión:</label>
                                    <textarea class="form-control" id="objetivosProximaSesion" name="objetivosProximaSesion" rows="3">{{ $saved->objetivos_proxima_sesion }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="areasEnfoque" class="form-label">Áreas de Enfoque:</label>
                                    <textarea class="form-control" id="areasEnfoque" name="areasEnfoque" rows="3">{{ $saved->areas_enfoque }}</textarea>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="preparacionNino" class="form-label">Preparación Necesaria para el Niño/a (si corresponde):</label>
                                    <textarea class="form-control" id="preparacionNino" name="preparacionNino" rows="3">{{ $saved->preparacion_necesaria }}</textarea>
                                </div>
                                <!-- 9. Notas Adicionales -->
                                <h4 class="mb-4 font-alt text-start">9. Notas Adicionales</h4>
                                <div class="mb-3 text-start">
                                    <label for="notasAdicionales" class="form-label">Notas Adicionales:</label>
                                    <textarea class="form-control" id="notasAdicionales" name="notasAdicionales" rows="3">{{ $saved->notas_adicionales }}</textarea>
                                </div>

                                <!-- 10. Firma del Terapeuta -->
                                <!-- <h4 class="mb-4 font-alt text-start">10. Firma del Terapeuta</h4>
                                <div class="mb-3 text-start">
                                    <label for="nombreTerapeutaFirma" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombreTerapeutaFirma" name="nombreTerapeutaFirma" >
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="firmaTerapeuta" class="form-label">Firma:</label>
                                    <input type="text" class="form-control" id="firmaTerapeuta" name="firmaTerapeuta" >
                                </div> -->

                                <div class="mt-3 text-end">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="button" onclick="finalizarSesion(2)" id="btn-sesion-fin" value="{{ $results->sesion_id }}" class="btn btn-primary">Terminar sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
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
        function finalizarSesion (tipo){
            var sesion_id = document.getElementById('btn-sesion-fin').value;
            const form = tipo == 1? document.querySelector('#formAdultos'):document.querySelector('#formNinos'); 

            //const form = document.querySelector('#formAdultos');
            const inputs = form.querySelectorAll('input[type="text"], input[type="number"], input[type="date"], textarea');
            let allFieldsFilled = true;

            inputs.forEach((input) => {
                if(input.value.trim() === ''){
                    input.setAttribute("required", "required");
                    allFieldsFilled = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (allFieldsFilled) {
                //onsole.log("Todos los campos estan llenos finalizando sesion");
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
                            //console.log(data);
                            Swal.fire(
                                '<h2 class="text-center mb-4 font-alt">Exito!</h2>',
                                `Sesión marcada como finalizada.`,
                                'success'
                            )
                            setTimeout(function() {
                                if(tipo == 1){
                                    document.getElementById('formAdultos').submit();
                                }else {
                                    document.getElementById('formNinos').submit();
                                }

                            setTimeout(function() {
                                window.location.href = "{{ route('psicologo.sesiones') }}";
                            }, 1000); 
                        }, 3000);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    }); 
                }
                });
            } else {
                //console.log("completa todos los campos requeridos");
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Debe de llenar todos los campos vacios para concluir la sesión.",
                });
            }

        }

    </script>
</body>

</html>
