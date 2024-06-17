<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SISTEMA DE PSICOLOGÍA</title>

    <!-- Enlaces a los estilos CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('./vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('./vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">

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

    <!-- Importar el archivo de idioma español -->

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <style>
        .tooltip {
            display: none;
            background-color: rgba(0, 0, 0, 0.75);
            color: white;
            padding: 5px;
            border-radius: 3px;
            font-size: 12px;
        }
    </style>
    <style>
        #calendario {
            max-width: auto;
            margin: 10px auto;
        }

        @media (max-width:1920px) {

            /* Remove underline from day names */
            .fc .fc-col-header-cell-cushion {
                text-decoration: none;
            }

            /* Change cursor to pointer when hovering over events */
            .fc .fc-event {
                cursor: pointer;
            }
        }

        @media (max-width: 768px) {
            #calendario {
                max-width: 100%;
                margin: 0px;
            }

            .fc table {
                font-size: 0.8em;
            }

            .fc .fc-daygrid-day-top {
                font-size: 12px;
                /* Smaller font for day names */
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

        /* Estilos para el calendario */
        #calendario {
            margin-top: 10px;
            background-color: #fff;
            border-radius: 10px;
            padding: 10px;
            position: relative;
            /* Para posicionar el botón */
        }

        .calendario-titulo {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

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
    <main class="main-content ">
        <section class="py-0 d-flex justify-content-center align-items-center" id="">
            <div class="container px-1 text-center shadow-lg p-5 rounded mt-2">
                <!-- Título "Agende su cita inicial" -->
                <h2 class="display-3 lh-1 mb-2 font-alt">Horarios</h2>
                <p class="lead fw-normal text-muted mb-2 ttNorms">Administra tus citas y horarios de atención aquí.</p>
                <div class="text-end mb-3">
                    <button class="btn btn-outline-primary btn-lg btn-paso1 fw-bold mb-0" style="font-size: 15px; padding: 5px 5px;" onclick="crearHorario()">
                        <i class="bi bi-calendar-plus-fill fs-6 me-2"></i> Agregar Horario
                    </button>
                    <div>
                        <div id="horarios-container" class="row row justify-content-center">

                        </div>
                        <!-- Calendario -->
                        <div id="calendario"></div>
                    </div>
        </section>
    </main>
    <!-- Modal para agregar horarios en general LUNES A VIERNES -->
    <div class="modal fade" id="crearHorarioModal" tabindex="-1" aria-labelledby="crearHorarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-alt" id="crearHorarioModalLabel">Agregar Horario de Atención</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <span id="id-horario" style="display: none;"></span>
                </div>
                <div class="modal-body">
                    <!-- Pestañas para alternar entre mañana y tarde -->
                    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="manana-tab" data-bs-toggle="tab" data-bs-target="#manana" type="button" role="tab" aria-controls="manana" aria-selected="true">Turno Mañana</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tarde-tab" data-bs-toggle="tab" data-bs-target="#tarde" type="button" role="tab" aria-controls="tarde" aria-selected="false">Turno
                                Tarde</button>
                        </li>
                    </ul>
                    <!-- Contenido de las pestañas -->
                    <div class="tab-content " id="myTabContent">
                        <div class="tab-pane fade show active mt-4" id="manana" role="tabpanel" aria-labelledby="manana-tab">
                            <!-- Contenido para horario de atención de la mañana -->
                            <form action="{{ route('horariospsicologo.store') }}" method="POST" enctype="multipart/form-data" id="form-horarios-maniana">
                                @csrf
                                <input type="hidden" name="_method" value="POST" id=method-laravel-maniana>
                                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="id_horario_dia" value="1"><!-- 1: mañana, 2: tarde -->
                                <input type="hidden" name="editDia" value="no">
                                <input type="hidden" name="diaEdit" value="">
                                <!-- Campos del formulario para horario de la mañana -->
                                <div class="form-group">
                                    <label for="horaInicio" class="form-label" style="font-size: 18px; margin-bottom: 20px;">Horario de Atención Turno
                                        Mañana</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Desde</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px; margin-right: 10px;" id="horaInicio" name="horaInicio" min="07:00" max="11:01" step="3600" oninput="validateTimeFrom(this,1)">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Hasta</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="horaFin" name="horaFin" min="06:00" max="12:01" step="3600" oninput="validateTimeTo(this,1)">
                                    </div>
                                </div>


                                <!-- Días de atención para horario de la mañana -->
                                <div class="form-group" id="diasFormularioManana">
                                    <label class="form-label" style="font-size: 18px;">Días</label><br>
                                    <div class="custom-checkboxes">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="lunes" name="dias[]" value="lunes">
                                            <label class="form-check-label" for="lunes">Lunes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="martes" name="dias[]" value="martes">
                                            <label class="form-check-label" for="martes">Martes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="miercoles" name="dias[]" value="miercoles">
                                            <label class="form-check-label" for="miercoles">Miércoles</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="jueves" name="dias[]" value="jueves">
                                            <label class="form-check-label" for="jueves">Jueves</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="viernes" name="dias[]" value="viernes">
                                            <label class="form-check-label" for="viernes">Viernes</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Botones de guardar y cancelar para horario de la mañana -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary" onclick="cambioNoDisponible(1)">No
                                        disponible</button>
                                    <button type="submit" class="btn btn-primary">Guardar Horario</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade mt-4" id="tarde" role="tabpanel" aria-labelledby="tarde-tab">
                            <!-- Contenido para horario de atención de la tarde -->
                            <form action="{{ route('horariospsicologo.store') }}" method="POST" enctype="multipart/form-data" id="form-horarios-tarde">
                                @csrf
                                <input type="hidden" name="_method" value="POST" id=method-laravel-tarde>
                                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="id_horario_dia" value="2">
                                <input type="hidden" name="editDia" value="no">
                                <input type="hidden" name="diaEdit" value="">
                                <!-- Campos del formulario para horario de la tarde -->
                                <div class="form-group">
                                    <label for="horaInicioT" class="form-label" style="font-size: 18px; margin-bottom: 20px;">Horario de Atención Turno
                                        Tarde</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Desde</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px; margin-right: 10px;" id="horaInicioT" name="horaInicioT" min="12:00" max="10:00" step="3600" oninput="validateTimeFrom(this,2)">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Hasta</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="horaFinT" name="horaFinT" min="13:00" max="10:00" step="3600" oninput="validateTimeTo(this,2)">
                                    </div>
                                </div>
                                <!-- Días de atención para horario de la tarde -->
                                <div class="form-group" id="diasFormularioTarde">
                                    <label class="form-label" style="font-size: 18px;">Días</label><br>
                                    <div class="custom-checkboxes">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="lunes" name="dias[]" value="lunes">
                                            <label class="form-check-label" for="lunesT">Lunes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="martes" name="dias[]" value="martes">
                                            <label class="form-check-label" for="martesT">Martes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="miercoles" name="dias[]" value="miercoles">
                                            <label class="form-check-label" for="miercolesT">Miércoles</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="jueves" name="dias[]" value="jueves">
                                            <label class="form-check-label" for="juevesT">Jueves</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="viernes" name="dias[]" value="viernes">
                                            <label class="form-check-label" for="viernesT">Viernes</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Botones de guardar y cancelar para horario de la tarde -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary" onclick="cambioNoDisponible(2)">No
                                        disponible</button>
                                    <button type="submit" class="btn btn-primary">Guardar Horario</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for event details -->
        <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" id="eventTitle"></h5>
                                <p class="card-text" id="eventDescription"></p>
                                <p class="card-text">
                                    <small class="text-muted" id="eventTime"></small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- Enlaces a los scripts JS -->
    <script src="{{ asset('./vendors/base/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('./vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('./js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('./js/off-canvas.js') }}"></script>
    <script src="{{ asset('./js/hoverable-collapse.js') }}"></script>
    <!-- <script src="{{ asset('./js/template.js') }}"></script> -->
    <script src="{{ asset('./js/todolist.js') }}"></script>
    <script src="{{ asset('./js/dashboard.js') }}"></script>
    <!-- Script de FullCalendar -->
    <script>
        let hora_inicio = "00:00";
        let hora_fin = "23:59";

        function validateTimeFrom(input, turno) {
            hora_inicio = input.value;
            console.log("hora_inicio: " + hora_inicio);
            validateTime(input, turno);
        }

        function validateTimeTo(input, turno) {
            hora_fin = input.value;
            console.log("hora_fin: " + hora_fin);

            validateTime(input, turno);
        }
        const validateTime = (input, turno) => {
            console.log(input.value)
            console.log(turno);
            let minTime = "00:00";
            let maxTime = "23:59";
            if (turno == 1) {
                minTime = "07:00";
                maxTime = "12:00";
            } else if (turno == 2) {
                minTime = "12:00";
                maxTime = "21:00";
            }
            if (input.value < minTime || input.value > maxTime) {
                input.setCustomValidity(`La hora debe estar entre ${minTime}  y ${maxTime}`);
            } else if (hora_inicio > hora_fin) {
                input.setCustomValidity(`el rango ${hora_inicio}  - ${hora_fin} no está permitido `);
            } else {
                input.setCustomValidity('');

            }
        }

        function validateRangeTime(initTime, endTime) {

            if (initTime > endTime) {
                return false;
            }
            return true;
        }

        function getDateForCurrentWeek(dayOfWeek, customHour) {
            const daysOfWeek = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
            //fecha actual
            const today = new Date();
            //indice del día enviado
            const dayIndex = daysOfWeek.indexOf(dayOfWeek);
            if (dayIndex === -1) {
                throw new Error("Invalid day of week");
            }

            //obtiene el índice del día
            const currentDayIndex = today.getDay();
            const currentDayIndex2=currentDayIndex==0?6:currentDayIndex-1;
            //el indice del día enviado menos el índice del día actual
            const diff = (dayIndex - currentDayIndex2);
            //la fecha a la que corresponde 
            const targetDate = new Date(today);

            // Adjust date to the target day within the same week
            targetDate.setDate(today.getDate() + diff);

            // Parse custom hour (assuming format 'HH:MM:SS')
            const [hours, minutes, seconds] = customHour.split(':').map(Number);
            targetDate.setUTCHours(hours, minutes, seconds);

            const isoString = targetDate.toISOString();
            return isoString.slice(0, 19);
        }

        // // Example usage:
        // try {
        //     const result = getDateForCurrentWeek('Monday', '13:49:00');
        //     console.log(result.toString()); // Outputs the corresponding date and time for the given day and hour
        // } catch (error) {
        //     console.error(error.message);
        // }



        // Helper function to get the next date for a specific day of the week
        function convertToFcFormat(dayOfWeek, customHour) {
            const dayOfWeekMap = {
                "lunes": 1,
                "martes": 2,
                "miércoles": 3,
                "jueves": 4,
                "viernes": 5,
                "sábado": 6,
                "domingo": 7,
                // other days can be added here if needed
            };
            // dia
            // hora_fin_maniana
            // hora_fin_tarde
            // hora_inicio_maniana
            // hora_inicio_tarde
            const [hour, minute, second] = customHour.split(':').map(Number);

            const today = new Date();
            const resultDate = new Date(today);
            resultDate.setDate(today.getDate() + (dayOfWeekMap[dayOfWeek] + 7 - today.getDay()) % 7);
            resultDate.setUTCHours(hour, minute, second, 0);
            // return resultDate.toISOString();
            // return resultDate.toISOString().split('T')[0];
            const isoString = resultDate.toISOString();

            return isoString.slice(0, 19);
        }



        // const events = [];
        // Inicialización del calendario
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendario');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es', // Establecer el idioma español
                initialView: 'timeGridWeek',
                slotMinTime: '07:00:00', // Start time (6:00 AM)
                slotMaxTime: '23:00:00', // End time (10:00 PM)
                headerToolbar: false,
                dayHeaderFormat: {
                    weekday: 'long'
                },
                allDaySlot: false,
                // headerToolbar: {
                //     left: 'prev,next today',
                //     center: 'title',
                //     right: 'dayGridMonth,timeGridWeek,timeGridDay'
                // },
                locales: 'es',

                events: function(fetchInfo, successCallback, failureCallback) {
                    // var apiUrl = '/psicologo/getHorario';
                    var apiUrl = '/horarios';
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch(apiUrl, {
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            let events = [];
                            console.log(data)
                            data.horarios?.map(ev => {

                                const eventsTemp = [];
                                if (ev.isDisponibleManiana)
                                    events.push({
                                        id: ev.id,
                                        turno: '1',
                                        dia: ev.dia,
                                        hora_inicio: ev.hora_inicio_maniana,
                                        hora_fin: ev.hora_fin_maniana,
                                        title: 'Disponible',
                                        description: 'Horario disponible',
                                        start: getDateForCurrentWeek(ev.dia, ev.hora_inicio_maniana),
                                        end: getDateForCurrentWeek(ev.dia, ev.hora_fin_maniana),
                                        color: 'orange',
                                    })
                                if (ev.isDisponibleTarde)
                                    events.push({
                                        id: ev.id,
                                        turno: '2',
                                        dia: ev.dia,
                                        hora_inicio: ev.hora_inicio_tarde,
                                        hora_fin: ev.hora_fin_tarde,
                                        title: 'Disponible',
                                        description: 'Horario disponible',
                                        start: getDateForCurrentWeek(ev.dia, ev.hora_inicio_tarde),
                                        end: getDateForCurrentWeek(ev.dia, ev.hora_fin_tarde),
                                        color: 'purple',
                                    })
                            })
                            console.log("prueba: ");
                            console.log(events);
                            successCallback(events);
                        })
                        .catch(error => {
                            console.error('Error fetching events:', error);
                            failureCallback(error);
                        });

                },
                eventClick: function(info) {
                    console.log("info.event.id: " + info.event.id);
                    // Display event details in the modal
                    modificarHorario(info.event.id, info.event.extendedProps.turno, info.event.extendedProps.dia, info.event.extendedProps.hora_inicio.substring(0, 5), info.event.extendedProps.hora_fin.substring(0, 5))
                },
                // events: [{
                //         title: 'Event 1',
                //         description: 'Description for Event 1',
                //         start: '2024-05-28T08:00:00',
                //         end: '2024-05-28T10:00:00',
                //         color: 'green' // Color the event range in green
                //     },
                //     // Aquí puedes añadir eventos desde tu base de datos
                // ],
                contentHeight: 'auto', // Adjust height to fit content
                views: {
                    timeGridWeek: {
                        slotLabelFormat: {
                            hour: 'numeric',
                            minute: '2-digit',
                            omitZeroMinute: false,
                            meridiem: 'short'
                        }
                    }
                },
                windowResize: function(view) {
                    if (window.innerWidth < 768) {
                        calendar.setOption('contentHeight', 'auto');
                    } else {
                        calendar.setOption('contentHeight', 'auto');
                        //calendar.setOption('contentHeight', 650); // Set to a fixed height for larger screens
                    }
                }

            });
            calendar.render();
        });
    </script>
    <script>
        FullCalendar.globalLocales.push(function() {
            'use strict';
            var es = {
                code: "es",
                week: {
                    dow: 1,
                    doy: 4
                },
                buttonText: {
                    prev: "Ant",
                    next: "Sig",
                    today: "Hoy",
                    month: "Mes",
                    week: "Semana",
                    day: "Día",
                    list: "Agenda"
                },
                weekText: "Sm",
                allDayText: "Todo el día",
                moreLinkText: "más",
                noEventsText: "No hay eventos para mostrar"
            };
            return es;
        }());
    </script>


    @if (session('resultado') === 'actualizado')
    <script>
        Swal.fire({
            icon: 'success',
            title: '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
            text: 'El horario se guardó exitosamente',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            customClass: {
                title: 'swal-title', // Clase CSS para el título personalizado
            },
            // Permite que el HTML se muestre en la notificación
            allowHtml: true
        });
    </script>
    @elseif(session('resultado') === 'error')
    <script>
        Swal.fire({
            icon: 'error',
            title: '<h2 class="text-center mb-4 font-alt">Error</h2>',
            text: 'Se ha producido un error al guardar horario.',
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK',
            customClass: {
                title: 'swal-title', // Clase CSS para el título personalizado
            },
            // Permite que el HTML se muestre en la notificación
            allowHtml: true
        });
    </script>
    @endif
    <script>
        function ocultarDias() {
            $('#diasFormularioManana').hide();
            $('#diasFormularioTarde').hide();
        }

        function editHorario(id, dia) {
            $('#crearHorarioModalLabel').text("Agregar horario para " + dia);
            ocultarDias();
            $('input[name="editDia"]').val("si");
            $('input[name="diaEdit"]').val(dia);
            $('#crearHorarioModal').modal('show');
        }

        function cambioNoDisponible(horario_dia) {
            const dia = document.querySelector('input[name="diaEdit"]').value;
            const user_id = document.querySelector('input[name="user_id"]').value;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const id = document.getElementById('id-horario').textContent;
            console.log("cambio no disponible");
            console.log(id);
            console.log(token);
            console.log(horario_dia);
            const formData = new FormData();

            formData.append('dia', dia);
            formData.append('user_id', user_id);

            // formData.append('_method', 'DELETE');
            formData.append('id_horario_dia', horario_dia);
            formData.append('_token', token);
            fetch(`inhabilitar-horario/${id}`, {
            // fetch(`horarios/${id}`, {
                    // method: 'DELETE',
                    method:'POST',
                    headers: {

                        // 'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    // body: JSON.stringify({
                    //     dia: dia,
                    //     user_id: user_id,
                    //     horario_dia: horario_dia,
                    //     _method: 'DELETE',
                    // })
                    body: formData,
                })
                .then(response => {
                    console.log("holis");
                    if (!response.ok) {
                        return response.json().then(error => {
                            throw new Error(error
                                .message);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("exito!!!!");
                    console.log(data);
                    Swal.fire({
                        icon: 'success',
                        title: '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                        text: 'El horario se guardó exitosamente',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        customClass: {
                            title: 'swal-title', // Clase CSS para el título personalizado
                        },
                        // Permite que el HTML se muestre en la notificación
                        allowHtml: true
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                })
                .catch(error => {
                    console.log
                    console.error('Error:', error);
                });
        }


        function noDisponible(horario_dia) { // 1: mañana, 2: tarde
            dia = document.querySelector('input[name="diaEdit"]').value;
            user_id = document.querySelector('input[name="user_id"]').value;
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            $.ajax({
                url: '/psicologo/inhabilitarHorario',
                type: 'POST',
                data: {
                    'dia': dia,
                    'user_id': user_id,
                    'horario_dia': horario_dia,
                    '_token': token
                },
                success: function(data) {
                    console.log("exito!!!!  ");
                    Swal.fire({
                        icon: 'success',
                        title: '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                        text: 'El horario se guardó exitosamente',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        customClass: {
                            title: 'swal-title', // Clase CSS para el título personalizado
                        },
                        // Permite que el HTML se muestre en la notificación
                        allowHtml: true
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function addDia(dia) {

            $('#crearHorarioModalLabel').text("Agregar horario para " + dia);
            ocultarDias();

            $('input[name="editDia"]').val("si");
            $('input[name="diaEdit"]').val(dia);
            $('#crearHorarioModal').modal('show');
        }

        function crearHorario() {
            const newRoute = "{{ route('horariospsicologo.store') }}";
            // Update form action
            document.getElementById('form-horarios-maniana').setAttribute('action', newRoute);
            document.getElementById('method-laravel-maniana').setAttribute('value', 'POST');
            document.getElementById('form-horarios-tarde').setAttribute('action', newRoute);
            document.getElementById('method-laravel-tarde').setAttribute('value', 'POST');

            $('#crearHorarioModalLabel').text("Agregar Horario de Atención");
            $('#diasFormularioManana').show();
            $('#diasFormularioTarde').show();

            $('#tarde-tab').show();
            $('#manana-tab').show();
            $('#horaInicio').val('')
            $('#horaFin').val('')
            $('#horaInicioT').val('')
            $('#horaFinT').val('')
            $('input[name="editDia"]').val("no");
            $('input[name="diaEdit"]').val("");

            $('#crearHorarioModal').modal('show');
        }

        function modificarHorario(id, turno, dia, hora_inicio, hora_fin) {
            const newRoute = `{{route('horariospsicologo.index')}}` + "/" + id;
            $('#crearHorarioModalLabel').text("Modificar Horario " + dia + " ");
            ocultarDias();
            document.getElementById('id-horario').textContent = id;

            if (turno == 1) {
                // Update form action
                document.getElementById('form-horarios-maniana').setAttribute('action', newRoute);
                document.getElementById('method-laravel-maniana').setAttribute('value', 'PATCH');
                $('#manana-tab').show();
                $('#manana-tab').click();
                $('#tarde-tab').hide();
                $('#horaInicio').val(hora_inicio)
                $('#horaFin').val(hora_fin)
            }

            if (turno == 2) {
                // Update form action
                document.getElementById('form-horarios-tarde').setAttribute('action', newRoute);
                document.getElementById('method-laravel-tarde').setAttribute('value', 'PATCH');
                $('#manana-tab').hide();
                $('#tarde-tab').show();
                $('#tarde-tab').click();
                $('#horaInicioT').val(hora_inicio)
                $('#horaFinT').val(hora_fin)
            }

            $('input[name="editDia"]').val("si");
            $('input[name="diaEdit"]').val(dia);
            $('#crearHorarioModal').modal('show');
        }
    </script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <script src="js/hoverDescription.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener referencias a elementos DOM
            const notificationIcon = document.getElementById('notificationIcon');
            const notificationContainer = document.getElementById('notificationContainer');
            const markReadBtn = document.getElementById('markReadBtn');
            const notificationItems = document.querySelectorAll('.notification-item');
            //const pagarIcon = document.querySelector('.fas.fa-money-bill');

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
            // pagarIcon.addEventListener('click', function() {
            //     $('#pagoModal').modal('show'); // Bootstrap Modal
            // });
        });
    </script>


</body>

</html>