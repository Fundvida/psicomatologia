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
    <link href="css/styles.css" rel="stylesheet" />

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
            margin-top: 30px;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
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
            <div class="container px-5 text-center shadow-lg p-5 rounded mt-2">
                <!-- Título "Agende su cita inicial" -->
                <h2 class="display-3 lh-1 mb-5 font-alt">Horarios</h2>
                <p class="lead fw-normal text-muted mb-5 ttNorms">Administra tus citas y horarios de atención aquí.</p>
                <div class="text-end mb-3">
                    <button class="btn btn-outline-primary btn-lg btn-paso1 fw-bold mb-3" style="font-size: 20px; padding: 12px 14px;" onclick="crearHorario()">
                        <i class="bi bi-calendar-plus-fill fs-4 me-2"></i> Agregar Horario
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
                            <form action="{{ route('psicologo.addHorario') }}" method="POST">
                                @csrf

                                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="id_horario_dia" value="1"><!-- 1: mañana, 2: tarde -->
                                <input type="hidden" name="editDia" value="no">
                                <input type="hidden" name="diaEdit" value="">
                                <!-- Campos del formulario para horario de la mañana -->
                                <div class="form-group">
                                    <label for="horaInicio" class="form-label" style="font-size: 18px; margin-bottom: 20px;">Horario de Atención Turno Mañana</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Desde</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px; margin-right: 10px;" id="horaInicio" name="horaInicio" min="08:00" max="11:00" step="3600">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Hasta</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="horaFin" name="horaFin" min="08:00" max="12:00" step="3600">
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
                                    <button type="button" class="btn btn-primary" onclick="noDisponible(1)">No disponible</button>
                                    <button type="submit" class="btn btn-primary">Guardar Horario</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade mt-4" id="tarde" role="tabpanel" aria-labelledby="tarde-tab">
                            <!-- Contenido para horario de atención de la tarde -->
                            <form action="{{ route('psicologo.addHorario') }}" method="POST">
                                @csrf

                                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="id_horario_dia" value="2">
                                <input type="hidden" name="editDia" value="no">
                                <input type="hidden" name="diaEdit" value="">
                                <!-- Campos del formulario para horario de la tarde -->
                                <div class="form-group">
                                    <label for="horaInicioT" class="form-label" style="font-size: 18px; margin-bottom: 20px;">Horario de Atención Turno Tarde</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Desde</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px; margin-right: 10px;" id="horaInicioT" name="horaInicioT" min="14:00" max="20:00" step="3600">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Hasta</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="horaFinT" name="horaFinT" min="14:00" max="20:00" step="3600">
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
                                    <button type="button" class="btn btn-primary" onclick="noDisponible(2)">No disponible</button>
                                    <button type="submit" class="btn btn-primary">Guardar Horario</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Enlaces a los scripts JS -->
    <script src="{{asset('./vendors/base/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('./vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('./js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('./js/off-canvas.js')}}"></script>
    <script src="{{asset('./js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('./js/template.js')}}"></script>
    <script src="{{asset('./js/todolist.js')}}"></script>
    <script src="{{asset('./js/dashboard.js')}}"></script>
    <!-- Script de FullCalendar -->
    <script>
        // Inicialización del calendario
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendario');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es', // Establecer el idioma español
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    // Aquí puedes añadir eventos desde tu base de datos
                ]
            });
            calendar.render();
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/psicologo/getHorario',
                type: 'GET',
                success: function(data) {
                    $('#horarios-container').empty();

                    var diasSemana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes'];

                    diasSemana.forEach(function(dia) {
                        var horarioDia = data.horarios.find(function(horario) {
                            return horario.dia === dia;
                        });
                        var card = `
                        <div class="col-md-2 mb-3">
                            <div class="card">
                                <div class="card-header">${dia}</div>
                                <div class="card-body" style="height: 230px;"> 
                        `;
                        if (horarioDia) {
                            if (horarioDia.isDisponibleManiana && horarioDia.isDisponibleTarde) {
                                card += `
                                <button type="button" onclick="editHorario(${horarioDia.id}, '${horarioDia.dia}')" class="btn btn-outline-info my-2">Modificar</button>
                                <p class="card-text">Horario mañana: <br> <span class="text-success">${horarioDia.hora_inicio_maniana.substring(0,5)} - ${horarioDia.hora_fin_maniana.substring(0,5)}</span></p>
                                <p class="card-text">Horario tarde: <br> <span class="text-success">${horarioDia.hora_inicio_tarde.substring(0,5)} - ${horarioDia.hora_fin_tarde.substring(0,5)}</span></p>
                                `;
                            } else if (horarioDia.isDisponibleManiana) {
                                card += `
                                <button type="button" onclick="editHorario(${horarioDia.id}, '${horarioDia.dia}')" class="btn btn-outline-info my-2">Modificar</button>
                                <p class="card-text">Horario mañana: <br><span class="text-success">${horarioDia.hora_inicio_maniana.substring(0,5)} - ${horarioDia.hora_fin_maniana.substring(0,5)}</span></p>
                                <p class="card-text no-disponible">Horario tarde:<br> <span class="text-danger">No disponible</span></p>
                                `;
                            } else if (horarioDia.isDisponibleTarde) {
                                card += `
                                <button type="button" onclick="editHorario(${horarioDia.id}, '${horarioDia.dia}')" class="btn btn-outline-info my-2">Modificar</button>
                                <p class="card-text no-disponible">Horario mañana: <br><span class="text-danger">No disponible</span></p>
                            <p class="card-text">Horario tarde: <br><span class="text-success">${horarioDia.hora_inicio_tarde.substring(0,5)} - ${horarioDia.hora_fin_tarde.substring(0,5)}</span></p>
                            `;
                            } else {
                                card += `
                                <button type="button" onclick="addDia('${dia}')" class="btn btn-outline-info my-2">Modificar ${dia}</button>
                                <p class="card-text no-disponible"><span class="text-danger">No disponible</span></p>
                                `;
                            }
                        } else {
                            card += `
                            <button type="button" onclick="addDia('${dia}')" class="btn btn-outline-info my-2">Modificar</button>
                            <p class="card-text no-disponible"><span class="text-danger">No disponible</span></p>
                            `;
                        }


                        card += `
                                </div>
                            </div>
                        </div>
                        `;

                        $('#horarios-container').append(card);
                    });
                },

                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>

    @if(session('resultado') === 'actualizado')
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

        function noDisponible(horario_dia) {   // 1: mañana, 2: tarde
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
            $('#crearHorarioModalLabel').text("Agregar Horario de Atención");
            $('#diasFormularioManana').show();
            $('#diasFormularioTarde').show();
            $('input[name="editDia"]').val("no");
            $('input[name="diaEdit"]').val("");

            $('#crearHorarioModal').modal('show');
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