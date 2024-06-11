<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LISTADO DE PSICOLOGOS</title>

    <!-- Enlaces a los estilos CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
    <link rel="stylesheet" href="{{ asset('vendors/jquery-ui/jquery-ui.min.css') }}">

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

        .custom-btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-alt">Registrar Psicógolo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('psicologo.store') }}" method="POST">
                        @csrf

                        <input type="hidden" id="psicologo_id" name="psicologo_id" value="">
                        <div class="mb-3">
                            <label for="especialidad" class="form-label">Especialidad <span class="text-danger">*</span></label>
                            <select id="especialidad" name="especialidad[]" multiple required>
                                <option value="Terapia Adultos">Terapia Adultos</option>
                                <option value="Terapia Adolecentes/Jóvenes">Terapia Adolecentes/Jóvenes</option>
                                <option value="Terapia Adultos Mayores">Terapia Adultos Mayores</option>
                                <option value="Terapia Pareja">Terapia Pareja</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nombres" class="form-label">Nombres <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nombres" name="nombres" required>
                            </div>
                            <div class="col">
                                <label for="apellidos" class="form-label">Apellidos <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                        </div>
                        <div class="mb-3">
                            <label for="fechaFuncion" class="form-label">Fecha función título provisión nacional <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="fechaFuncion" name="fechaFuncion" required>
                        </div>

                        <div class="mb-3">
                            <label for="universidad" class="form-label">Universidad <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="universidad" name="universidad" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="ciudadResidencia" class="form-label">Ciudad de Residencia <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="ciudadResidencia" name="ciudadResidencia" required>
                            </div>
                            <div class="col">
                                <label for="paisResidencia" class="form-label">País de Residencia <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="paisResidencia" name="paisResidencia" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ci" class="form-label">Carnet de identidad o equivalente <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ci" name="ci" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col" id="divContrasena">
                                <label for="contrasena" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="archivos" class="form-label">Archivos <span class="text-danger">*</span></label>
                            <input type="file" id="archivos" class="form-control" name="archivos[]" multiple required>
                            <!--<button type="submit">Subir Archivo(s)</button>-->
                        </div>
                        <div class="mb-3">
                            <label for="descripcionCV">Descripción de CV: <span class="text-danger">*</span></label><br>
                            <textarea id="descripcionCV" name="descripcionCV" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="correoElectronico" class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Número de Teléfono <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su número de teléfono" style="width: 312px;" required>
                        </div>
                        <div class="mb-3">
                            <label for="metodoConfirmacion" class="form-label">Método de Confirmación de Cuenta <span class="text-danger">*</span></label>
                            <select id="metodoConfirmacion" name="metodoConfirmacion" class="form-select" required>
                                <option value="correo">Correo Electrónico</option>
                                <option value="sms">SMS</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="preguntaSeguridad" class="form-label">Pregunta de Seguridad <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="preguntaSeguridad" name="preguntaSeguridad" required>
                        </div>
                        <div class="mb-3">
                            <label for="respuestaSeguridad" class="form-label">Respuesta <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="respuestaSeguridad" name="respuestaSeguridad" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnAddOrEdit" class="btn btn-primary">Registrar Psicógolo</button>
                        </div>
                    </form>
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
                    <h2 class="display-3 lh-1 mb-5 font-alt">Listado de todos los Psicologos</h2>
                    <!-- <p class="lead fw-normal text-muted mb-5 ttNorms" style="line-height: 1.5em;">Consulta las sesiones que tienes programadas para estar al tanto de tus compromisos y seguir el progreso de tus pacientes.</p> -->
                    <div class="text-end mb-3">
                        <button class="btn btn-outline-primary btn-lg btn-paso1 fw-bold" onclick="limpiar()">
                            <i class="bi bi-person-plus-fill me-2"></i> Agregar Psicologo
                        </button>
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

                    <!-- Tabla de Psicologos -->
                    <div class="custom-table-container shadow" style="height: 500px;">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>CI</th>
                                        <th>Nombre Completo Psicólogo</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="psicologos-body">
                                    
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

        document.addEventListener('DOMContentLoaded', (event) => {
            const dateInput = document.getElementById('fechaNacimiento');
            const today = new Date();
            const year = today.getFullYear() - 18;
            const month = today.getMonth() + 1; // Los meses son de 0 a 11
            const day = today.getDate();
            const maxDate = `${year}-${month < 10 ? '0' + month : month}-${day < 10 ? '0' + day : day}`;
            dateInput.max = maxDate;

            document.getElementById('fechaFuncion').setAttribute('max', new Date().toISOString().split('T')[0]);
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
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        new MultiSelectTag('especialidad')  // id

        $('#filtroNombre').autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{ route('search.psicologo.nombre') }}",
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
                    url: "{{ route('search.psicologo.ci') }}",
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
    </script>

    <script>
        $(document).ready(function() {
            function cargarPsicologos() {
                var tipo = $('#filtroTipo').val();
                var nombre = $('#filtroNombre').val();
                var ci = $('#filtroCI').val();

                $.ajax({
                    url: '/admin/listaPsicologos',
                    type: 'GET',
                    data: {
                        tipo: tipo,
                        nombre: nombre,
                        ci: ci
                    },
                    dataType: 'json',
                    success: function(data) {
                        //console.log(data);
                        $('#psicologos-body').empty();

                        $.each(data, function(index, psicologo) {
                            $('#psicologos-body').append(`
                                <tr>
                                    <td>${psicologo.ci}</td>
                                    <td>${psicologo.name} ${psicologo.apellidos}</td>
                                    <td>${psicologo.estado}</td>
                                    <td class="action-icons"> 
                                        <i class="fas fa-edit me-2" style="color: #6C757D; font-size: 22px;" onclick="editar(${psicologo.id})" title="Editar Psicologo"></i>
                                        <i class="fa-solid fa-trash-can text-danger" style="font-size: 22px;" onclick="eliminar(${psicologo.id})" title="Eliminar Sesión"></i>
                                    </td>
                                </tr>
                            `);
                        });
                    }
                });
            }

            cargarPsicologos();

            window.filtrarPacientes = function() {
                cargarPsicologos();
            }
        });

        function limpiar() {
            document.getElementById("divContrasena").style.display = "block";
            //document.getElementById("divConfirmarContrasena").style.display = "block";

            document.getElementById("btnAddOrEdit").textContent = "Registrar Psicologo";
            document.getElementById("psicologo_id").value = "";
            document.getElementById("nombres").value = "";
            document.getElementById("apellidos").value = "";
            document.getElementById("fechaNacimiento").value = "";
            document.getElementById("fechaFuncion").value = "";
            document.getElementById("universidad").value = "";
            document.getElementById("ciudadResidencia").value = "";
            document.getElementById("paisResidencia").value = "";
            document.getElementById("ci").value = "";
            document.getElementById("contrasena").value = "";
            //document.getElementById("confirmarContrasena").value = "";
            document.getElementById("archivos").value = "";
            document.getElementById("descripcionCV").value = "";
            document.getElementById("correoElectronico").value = "";
            document.getElementById("telefono").value = "";
            document.getElementById("metodoConfirmacion").value = "correo"; // Reinicia a valor predeterminado
            document.getElementById("preguntaSeguridad").value = "";
            document.getElementById("respuestaSeguridad").value = "";
            $('#formularioRegistroModal').modal('show');
        }

        function editar(psicologoId) {
            console.log(psicologoId);
            document.getElementById("btnAddOrEdit").textContent = "Editar Psicologo";
            document.getElementById("divContrasena").style.display = "none";
            //document.getElementById("divConfirmarContrasena").style.display = "none";
            document.getElementById("contrasena").removeAttribute("required");
            //document.getElementById("confirmarContrasena").removeAttribute("required");

            $('#formularioRegistroModal').modal('show');
            $.ajax({
                url: '/psicologo/' + psicologoId + '/edit',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    $('#psicologo_id').val(response.psicologo.id);
                    // Data de la tabla user
                    $('#nombres').val(response.user.name);
                    $('#apellidos').val(response.user.apellidos);
                    $('#fechaNacimiento').val(response.user.fecha_nacimiento);
                    $('#ci').val(response.user.ci);
                    $('#correoElectronico').val(response.user.email);
                    $('#contrasena').val(response.user.password);
                    $('#telefono').val(response.user.telefono);
                    $('#preguntaSeguridad').val(response.user.pregunta_seguridad_a);
                    $('#respuestaSeguridad').val(response.user.respuesta_seguridad_a);
                    // Data de la tabla psicologo
                    $('#fechaFuncion').val(response.psicologo.fecha_funcion_titulo);
                    $('#universidad').val(response.psicologo.universidad);
                    $('#ciudadResidencia').val(response.psicologo.ciudad_residencia);
                    $('#paisResidencia').val(response.psicologo.pais_residencia);
                    $('#descripcionCV').val(response.psicologo.descripcion_cv);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function eliminar(psicologoId) {
            console.log(psicologoId);
            Swal.fire({
                title: '<h2 class="text-center mb-2 font-alt">¿Estás seguro de Eliminar el registro?</h2>',
                html: `<p class="lead fw-normal text-muted mb-2 ttNorms" style="line-height: 1.5em;">Por favor, escriba el motivo de eliminación:</p>
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
                            url: '/psicologo/del',
                            type: 'POST',
                            data: {
                                'psicologo_id': psicologoId,
                                '_token': token,
                                'justificacion': justificacion
                            },
                            success: function(data) {
                                console.log("exito!!!!  ");
                                Swal.fire(
                                    '<h2 class="text-center mb-4 font-alt">Eliminado</h2>',
                                    `Registro eliminado.<br> Motivo: ${justificacion}`,
                                    'success'
                                )
                                setTimeout(function() {
                                    window.location.reload();
                                }, 3000);
                            },
                            error: function(xhr, status, error) {
                                console.log('hoasdfhjk')
                                console.error(error);
                            }
                        }); 
                }
            });
            
        }
    </script>
    @if(session('resultado') === 'registrado')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "Éxito!",
                text: "Psicologo registrado exitosamente!",
                icon: "success"
            });
        });
    </script>
    @endif
    @if(session('resultado') === 'actualizado')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "Éxito!",
                text: "Psicologo actualizado exitosamente!",
                icon: "success"
            });
        });
    </script>
    @endif

</body>

</html>