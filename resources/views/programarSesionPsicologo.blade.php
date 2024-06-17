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
                <h2 class="display-3 lh-1 mb-5 font-alt">Programar sesión</h2>
                <p class="lead fw-normal text-muted mb-5 ttNorms">Por favor, Seleccione un horario disponible para agendar cita con su paciente.</p>
                <div class="text-end mb-3">
                    <div>
                        <span class="error-form" id="horarioSeleccionError"></span>
                        <div id="calendario"></div>
                    </div>
                </div>
        </section>
    </main>

    <!-- Modal para programar nueva sesion -->
    <div class="modal fade" id="formularioRegistroModal" tabindex="-1" aria-labelledby="formularioRegistroModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-alt" id="crearHorarioModalLabel">Programar sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="tab-content " id="myTabContent">
                        <div class="tab-pane fade show active mt-4" id="manana" role="tabpanel" aria-labelledby="manana-tab">
                            <!-- Contenido para horario de atención de la mañana -->
                            <form id="sesion-programar" action="{{route('psicologo.programar.sesion')}}" method="POST">
                                @csrf

                                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="id_horario_dia" value="1"><!-- 1: mañana, 2: tarde -->
                                
                                <!-- Campos del formulario para horario de la mañana -->
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="paciente_id" class="form-label">CI Paciente <span class="text-danger">*</span></label>
                                        <select id="paciente_id" name="paciente_id" class="form-select" required>
                                            <option value=""></option>
                                            @foreach ($pacientes as $paciente)
                                                <option value="{{ $paciente->paciente_id }}" data-name="{{ $paciente->name }} {{ $paciente->apellidos }}">{{ $paciente->name }} - {{ $paciente->ci }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Paciente nombre</label>
                                        <input type="text" id="paciente_nombre" class="form-control" placeholder="Paciente no seleccionado" readonly>
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
                                        <input type="time" class="form-control" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px; margin-right: 10px;" id="horaInicio" name="horaInicio" min="00:00" max="11:59" step="3600" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="color: #ffffffff; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">Hasta</span>
                                        </div>
                                        <input type="time" class="form-control" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" id="horaFin" name="horaFin" min="00:00" max="11:59" step="3600" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="fechaAgendaManiana" class="form-label">Fecha:</label>
                                    <input type="date" class="form-control" id="fechaAgenda" name="fechaAgenda" readonly>
                                </div>
                                <!-- Botones de guardar y cancelar para horario de la mañana -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" id="submit-button">Programar Sesión</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/locales/es.min.js"></script>

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
        
        $(document).ready(function() {
            $.ajax({
                url: '/psicologo/getPsicologoId',
                type: 'GET',
                success: function(data) {
                    //console.log(data);
                    listHorario(data.id);
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

        document.addEventListener('DOMContentLoaded', function() {
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

        function listHorario(psicologo_id) {
            
            let previouslyClickedEvent = null;
            let calendarEl = document.getElementById('calendario');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es', // Establecer el idioma español
                initialView: 'timeGridWeek',
                slotMinTime: '08:00:00', // Start time (6:00 AM)
                slotMaxTime: '22:00:00', // End time (10:00 PM)
                headerToolbar: false,
                allDaySlot: false,
                headerToolbar: {
                    left: '',
                    center: 'prev,next today',
                    right: ''
                },
                locales: 'es',
                events: function(fetchInfo, successCallback, failureCallback) {
                    var apiUrl = '/psicologo/gethorario';
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const formData = new FormData();
                    formData.append('psicologo_id', psicologo_id);
                    fetch(apiUrl, {
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            let events = [];
                            console.log(data)

                            for (let i = 0; i < 2; i++) {
                                // if (data?.intervalos)
                                //     console.log(data.intervalos);
                                // console.log(data.periodos);
                                data.periodos?.map(ev => {

                                    const eventsTemp = [];
                                    if (ev.isDisponibleManiana)
                                        events.push({
                                            // id: ev.id,
                                            turno: '1',
                                            dia: ev.dia,
                                            hora_inicio: ev.hora_inicio_maniana,
                                            hora_fin: ev.hora_fin_maniana,
                                            title: 'Disponible',
                                            description: 'Horario disponible',
                                            start: convertToFcFormat(ev.dia, ev.hora_inicio_maniana, i),
                                            end: convertToFcFormat(ev.dia, ev.hora_fin_maniana, i),
                                            color: 'orange',
                                        })
                                    if (ev.isDisponibleTarde)
                                        events.push({
                                            // id: ev.id,
                                            turno: '2',
                                            dia: ev.dia,
                                            hora_inicio: ev.hora_inicio_tarde,
                                            hora_fin: ev.hora_fin_tarde,
                                            title: 'Disponible',
                                            description: 'Horario disponible',
                                            start: convertToFcFormat(ev.dia, ev.hora_inicio_tarde, i),
                                            end: convertToFcFormat(ev.dia, ev.hora_fin_tarde, i),
                                            color: 'purple',
                                        })
                                })
                            }
                            console.log("prueba: ");
                            console.log(events);
                            successCallback(events);
                        })
                        .catch(error => {
                            console.error('Error fetching events:', error);
                            failureCallback(error);
                        });

                },
                // height:parent,
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
                },
                eventClick: function(info) {

                    // Display event details in the modal

                    if (previouslyClickedEvent !== null) {
                        previouslyClickedEvent.setProp('title', 'Disponible');
                        if (previouslyClickedEvent.extendedProps.turno == '1') {
                            console.log('orange');
                            previouslyClickedEvent.setProp('backgroundColor', 'orange'); // Change to original color
                        } else if (previouslyClickedEvent.extendedProps.turno == '2') {
                            console.log('purple');
                            previouslyClickedEvent.setProp('backgroundColor', 'purple'); // Change to original color
                        }
                    }


                    info.event.setProp('backgroundColor', 'red');
                    info.event.setProp('title', 'Seleccionado');
                    // Store the clicked event
                    previouslyClickedEvent = info.event;
                    console.log(convetToDBFormat(info.event.start));
                    console.log(convetToDBFormat(info.event.end));

                    guardarHorario(info.event.extendedProps.turno, info.event.extendedProps.dia, convetToDBFormat(info.event.start), convetToDBFormat(info.event.end))
                },
            });
            calendar.render();

            // Force a redraw after rendering
            // setTimeout(function() {
            //     calendar.updateSize();
            // }, 0);
            // });
            // Helper function to get the next date for a specific day of the week
            function convertToFcFormat(dayOfWeek, customHour, week) {
                // const dayOfWeekMap = {
                //     "lunes": 0,
                //     "martes": 1,
                //     "miercoles": 2,
                //     "jueves": 3,
                //     "viernes": 4,
                //     "sabado": 5,
                //     "domingo": 6,
                //     // other days can be added here if needed
                // };
                // const [hour, minute, second] = customHour.split(':').map(Number);

                // const today = new Date();
                // const resultDate = new Date(today);
                // resultDate.setDate(today.getDate() + (today.getDay()-dayOfWeekMap[dayOfWeek] +1));
                // resultDate.setUTCHours(hour, minute, second, 0);
                // const isoString = resultDate.toISOString();

                // return isoString.slice(0, 19);

                const dayOfWeekMap = {
                    "lunes": 1,
                    "martes": 2,
                    "miercoles": 3,
                    "jueves": 4,
                    "viernes": 5,
                    "sabado": 6,
                    "domingo": 7,
                    // other days can be added here if needed
                };
                const [hour, minute, second] = customHour.split(':').map(Number);

                const today = new Date();
                const todayDayOfWeek = today.getDay() === 0 ? 7 : today.getDay(); // Adjust Sunday to be 7 instead of 0
                // console.log("todayDayOfWeek" + todayDayOfWeek);

                let daysUntilNext = ((dayOfWeekMap[dayOfWeek] + 7 - todayDayOfWeek) % 7 + (week * 7));
                // console.log("daysUntilNext: " + daysUntilNext);
                // if (daysUntilNext === 0 && (hour < today.getHours() || (hour === today.getHours() && minute <= today.getMinutes()))) {
                //     daysUntilNext += 7;
                // }
                // console.log("getDate: " + today.getDate());
                const resultDate = new Date(today);
                // console.log("resultDate: " + resultDate);
                resultDate.setUTCHours(hour, minute, second, 0);
                resultDate.setDate(today.getDate() + daysUntilNext);


                // console.log("resultDate2: " + resultDate);

                return resultDate.toISOString().slice(0, 19);


                // const nextTwoWeeksDates = [];
                // for (let i = 0; i < 2; i++) {
                //     nextTwoWeeksDates.push(getNextDate(dayOfWeekMap[dayOfWeek] + i * 7));
                // }

                // return nextTwoWeeksDates;


            }

            const convetToDBFormat = (fecha) => {
                const date = new Date(fecha);
                // Adjust timezone to GMT-4
                var offset = -4 * 60; // Offset in minutes (GMT-4)
                date.setMinutes(date.getMinutes() + offset);
                return date.toISOString().slice(0, 19).replace('T', ' ');
            }

        }

        document.getElementById('submit-button').addEventListener('click', function(event) {
            event.preventDefault();
            let form = $('#sesion-programar');
            let formData = form.serialize();
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: formData,
                success: function(response) {
                    console.log(response);
                    if(response==="exito"){
                        Swal.fire(
                        '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                        `Sesion registrada con exito!!!`,
                        'success'
                        )
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);
                    }else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "No puede programar una reunión hasta que finalize la que ya tiene programada con el paciente seleccionado.",
                        });
                    }
                    
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

        document.getElementById('paciente_id').addEventListener('change', function() {
            var pacienteNombre = this.options[this.selectedIndex].getAttribute('data-name');
            document.getElementById('paciente_nombre').value = pacienteNombre ? pacienteNombre : 'Paciente no seleccionado';
        });

        function guardarHorario (turno, dia, hora_inicio, hora_fin) {
            selectedHorarios = {
                turno: turno,
                dia: dia,
                fecha_hora_inicio: hora_inicio,
                fecha_hora_fin: hora_fin,
            };
            console.log(selectedHorarios);
            let fechaInicio = new Date(selectedHorarios.fecha_hora_inicio);
            let fechaFin = new Date(selectedHorarios.fecha_hora_fin);

            fechaInicio.setHours(fechaInicio.getHours() + 7);
            fechaFin.setHours(fechaFin.getHours() + 7);

            const fechaInicioStr = fechaInicio.toISOString().split('T')[0]; 
            const horaInicioStr = fechaInicio.toTimeString().split(' ')[0].substring(0, 5);

            const horaFinStr = fechaFin.toTimeString().split(' ')[0].substring(0, 5); 

            document.getElementById('fechaAgenda').value = fechaInicioStr;
            document.getElementById('horaInicio').value = horaInicioStr;
            document.getElementById('horaFin').value = horaFinStr;
            $('#formularioRegistroModal').modal('show');
        }


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
</body>

</html>