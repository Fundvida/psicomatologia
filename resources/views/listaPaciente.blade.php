<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LISTADO DE PACIENTES</title>

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
                            <h5 class="modal-title font-alt" id="title_modal">Registrar Paciente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('paciente.store') }}" method="POST">
                                @csrf

                                <input type="hidden" id="paciente_id" name="paciente_id" value="">
                                <div class="mb-3">
                                    <label for="tipoUsuario" class="form-label">Tipo de paciente <span class="text-danger">*</span></label>
                                    <select id="tipoUsuario" name="tipoUsuario" class="form-select" required>
                                        <option value="mayor">Paciente Mayor</option>
                                        <option value="menor">Paciente Menor de Edad</option>
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
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                                    </div>
                                    <div class="col">
                                        <label for="ocupacion" class="form-label">Ocupación <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="ocupacion" name="ocupacion" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="numeroCI" class="form-label">Número de CI <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="numeroCI" name="numeroCI" required>
                                </div>

                                <div class="row mb-3" id="divContrasena">
                                    <div class="col">
                                        <label for="contrasena" class="form-label">Contraseña <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                                    </div>
                                    <div class="col" id="divConfirmarContrasena">
                                        <label for="confirmarContrasena" class="form-label">Confirmar Contraseña <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="confirmarContrasena" name="confirmarContrasena" required>
                                    </div>
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
                                    <label for="respuestaSeguridad" class="form-label">Respuesta de pregunta <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="respuestaSeguridad" name="respuestaSeguridad" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="btnAddOrEdit" class="btn btn-primary">Registrar Paciente</button>
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
                    <h2 class="display-3 lh-1 mb-5 font-alt" id="title-user">Listado de todos los Pacientes</h2>
                    <!-- <p class="lead fw-normal text-muted mb-5 ttNorms" style="line-height: 1.5em;">Consulta las sesiones que tienes programadas para estar al tanto de tus compromisos y seguir el progreso de tus pacientes.</p> -->
                    <div class="text-end mb-3">
                        <button class="btn btn-outline-primary btn-lg btn-paso1 fw-bold" onclick="limpiar()">
                            <i class="bi bi-person-plus-fill me-2"></i> Agregar Paciente
                        </button>
                    </div>
                    <!-- Tabla de pacientes -->
                    <div class="custom-table-container shadow" style="height: 500px;">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>CI</th>
                                        <th>Nombre Completo</th>
                                        <th>Celular</th>
                                        <th>Tipo</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="pacientes-body">
                                    
                                    <!-- Registro 1 -->
                                    <!-- <tr>
                                        <td>Jessica</td>
                                        <td>Lopez</td>
                                        <td>Manuel</td>
                                        <td>Torrez</td>
                                        <td>Pendiente</td>
                                        <td>Pendiente</td>
                                    </tr> -->
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
                url: '/psicologo/getPacientes',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log('asdf')
                    console.log(data);
        
                    var pacientes = data.datos;
                    var rol = data.rol;
                    var titleElement = document.getElementById('title-user');

                    console.log('Rol del usuario:', rol);
                    if(rol == 'Administrador'){
                        titleElement.textContent = 'Listado de todos los Pacientes';
                    } else if (rol == 'Psicologo'){
                        titleElement.textContent = 'Listado de Paciente Designados';
                    }

                    $('#pacientes-body').empty();
                    $.each(pacientes, function(index, paciente) {
                        var f_nacimiento = paciente.fecha_nacimiento == null ? 'No especificado' : paciente.fecha_nacimiento;
                        var paciente_ci = paciente.ci == null ? 'No especificado' : paciente.ci;

                        $('#pacientes-body').append(`
                            <tr>
                                <td>${paciente_ci}</td>
                                <td>${paciente.name} ${paciente.apellidos}</td>
                                <td>${paciente.telefono}</td>
                                <td>${paciente.tipo_paciente}</td>
                                <td>${f_nacimiento}</td>
                                <td class="action-icons"> 
                                    <i class="fas fa-edit" style="color: #6C757D; font-size: 22px;" onclick="editar(${pacientes.id})" title="Editar"></i>
                                    <i class="fa-solid fa-trash-can text-danger" style="font-size: 22px;" onclick="eliminar(${pacientes.id})" title="Eliminar Sesión"></i>
                                </td>
                            </tr>
                        `);
                    });
                }
            });
        });

        function limpiar() {
            document.getElementById("btnAddOrEdit").textContent = "Registrar Paciente";
            document.getElementById("title_modal").textContent = "Registrar Paciente";
            document.getElementById("divContrasena").style.display = "block";
            document.getElementById("divConfirmarContrasena").style.display = "block";
            
            $('#paciente_id').val('');
            $('#tipoUsuario').val('');

            $('#nombres').val('');
            $('#apellidos').val('');
            $('#ocupacion').val('');
            $('#numeroCI').val('');
            $('#contrasena').val('');
            $('#confirmarContrasena').val('');
            $('#correoElectronico').val('');
            $('#telefono').val('');
            $('#preguntaSeguridad').val('');
            $('#respuestaSeguridad').val('');

            $('#metodoConfirmacion').val('correo');
            $('#formularioRegistroModal').modal('show');
        }

        
        function mostrarFormulario() {
            $('#formularioRegistroModal').modal('show');
        }

        function editar(paciente_id) {
            document.getElementById("title_modal").textContent = "Editar Paciente";
            document.getElementById("divContrasena").style.display = "none";
            document.getElementById("divConfirmarContrasena").style.display = "none";
            document.getElementById("btnAddOrEdit").textContent = "Actualizar Paciente";
            document.getElementById("contrasena").removeAttribute("required");
            document.getElementById("confirmarContrasena").removeAttribute("required");

            console.log(paciente_id)
            $('#formularioRegistroModal').modal('show');
            $.ajax({
                url: '/paciente/' + paciente_id + '/edit',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    $('#paciente_id').val(response.paciente.id);
                    // Data de la tabla user
                    $('#nombres').val(response.user.name);
                    $('#apellidos').val(response.user.apellidos);
                    $('#fechaNacimiento').val(response.user.fecha_nacimiento);
                    $('#numeroCI').val(response.user.ci);
                    $('#correoElectronico').val(response.user.email);
                    $('#contrasena').val(response.user.password);
                    $('#telefono').val(response.user.telefono);
                    $('#preguntaSeguridad').val(response.user.pregunta_seguridad_a);
                    $('#respuestaSeguridad').val(response.user.respuesta_seguridad_a);
                    // Data de la tabla paciente
                    $('#ocupacion').val(response.paciente.ocupacion);
                    $('#tipoUsuario').val(response.tipo_paciente).change();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function eliminar(id) {
            console.log(id);
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
                            url: '/paciente/del',
                            type: 'POST',
                            data: {
                                'paciente_id': id,
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
                                //console.log('hoasdfhjk')
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
                text: "Paciente registrado exitosamente!",
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
                text: "Paciente actualizado exitosamente!",
                icon: "success"
            });
        });
    </script>
    @endif

</body>

</html>