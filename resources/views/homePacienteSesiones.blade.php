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
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                        <img src="images/faces/face28.jpg" alt="profile" class="img-fluid rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown" style="right: 0; left: auto;">
                        <a class="dropdown-item" href="#">
                            <i class="ti-settings text-primary"></i>
                            Configuración
                        </a>
                        <form method="POST" action="{{ route('cerrar_sesion') }}" class="dropdown-item">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                <i class="ti-power-off text-primary"></i>
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </li>
            </ul>

        </div>
    </nav>

    <!-- Menú lateral -->
    <div class="custom-sidebar">
        <ul>
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
                <div class="container px-5 text-center shadow-lg p-5 rounded mt-2">
                    <!-- Título -->
                    <h2 class="display-3 lh-1 mb-5 font-alt">Lista de Sesiones</h2>
                    <p class="lead fw-normal text-muted mb-5 ttNorms">Consulta tus sesiones programadas para estar al tanto de tus citas y seguir tu progreso.</p>
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
                                        <th>Diagnòstico</th>
                                        <th>Archivos Adjuntos</th>
                                        <th>Estado de la Sesión</th>
                                        <th>Estado de Pago</th>
                                        <th>Pagar Sesión</th>
                                        <th>Cancelar Sesión</th>

                                    </tr>
                                </thead>
                                <tbody id="table-sesiones">
                                    <!-- Registro 1 -->
                                    <tr>
                                        <td>2024-05-05</td>
                                        <td>09:00 - 10:00</td>
                                        <td>1234567</td>
                                        <td>Juan</td>
                                        <td>Pérez</td>
                                        <td>Sesión de terapia individual</td>
                                        <td>Ansiedad leve</td>
                                        <td>Informe.pdf</td>
                                        <td>Pendiente</td>
                                        <td>Pendiente</td>
                                        <td class="action-icons">
                                            <i class="fas fa-money-bill text-success" title="Pagar"></i>
                                        </td>
                                        <td class="action-icons">
                                            <i class="fas fa-times-circle text-danger" onclick="confirmarCancelar('')" title="Cancelar"></i>
                                        </td>

                                    <!-- </tr>

                                    <tr>
                                        <td>2024-05-06</td>
                                        <td>14:00 - 15:00</td>
                                        <td>1234567</td>
                                        <td>Juan</td>
                                        <td>Pérez</td>
                                        <td>Terapia de pareja</td>
                                        <td>Problemas de comunicación</td>
                                        <td>None</td>
                                        <td>Terminada</td>
                                        <td>Realizado</td>
                                    </tr>
                             
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
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
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
                Usted tiene una sesión pendiente de pago
            </div>
            <div class="notification-footer">
                <button id="go-btn">
                    Ir <i class="fas fa-arrow-right"></i>
                </button>
            </div>

        </div>
    </div>

    <!-- Modal de Pago -->
    <div class="modal fade" id="pagoModal" tabindex="-1" aria-labelledby="pagoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{ route('paciente.files.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title font-alt" id="pagoModalLabel">Pagar Sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <!-- Aquí puedes colocar el elemento para mostrar el QR de pago -->
                        <img src="{{ asset('images/qr_real.jpeg') }}" alt="QR de Pago" class="img-fluid mb-4" style="max-height: 300px;">
                        <!-- Campo para subir el comprobante de pago -->
                        <div class="mb-3">
                            <input type="hidden" name="id_paciente" value="{{ auth()->id() }}">
                            <label for="file" class="form-label font-alt mb-4" style="font-size: 25px;">Subir Comprobante de Pago</label>
                            <i class="fas fa-chevron-down ms-2" style="font-size: 20px;"></i>
                            <input type="file" class="form-control" name="file">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary" onclick="confirmarPago()">CONFIRMAR PAGO</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener referencias a elementos DOM
            const notificationContainer = document.getElementById('notification-container');
            const closeButton = document.getElementById('close-btn');
            const goButton = document.getElementById('go-btn');
            const pagarIcon = document.querySelector('.fas.fa-money-bill');

            // Mostrar la notificación cuando se carga la página o se refresca
            showNotification();

            // Función para mostrar la notificación
            function showNotification() {
                notificationContainer.style.display = 'block';
            }

            // Función para cerrar la notificación
            function closeNotification() {
                notificationContainer.style.display = 'none';
            }

            // Evento para cerrar la notificación al hacer clic en el botón de cerrar
            closeButton.addEventListener('click', closeNotification);

            // Evento para redirigir al hacer clic en el botón de ir
            goButton.addEventListener('click', function() {
                // Aquí puedes agregar la lógica para redirigir a la página correspondiente
                // Por ejemplo:
                window.location.href = 'url-de-la-pagina-a-la-que-quieres-redirigir';
            });

            // Evento para abrir el modal al hacer clic en el icono de pagar
            pagarIcon.addEventListener('click', function() {
                $('#pagoModal').modal('show'); // Bootstrap Modal
            });
        });

        function mostrarModalPago(){
            $('#pagoModal').modal('show');
        }
    </script>

    <script>
        function confirmarPago() {
            Swal.fire({
                icon: 'success',
                title: '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                text: 'El pago se realizó exitosamente',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                customClass: {
                    title: 'swal-title', // Clase CSS para el título personalizado
                },
                // Permite que el HTML se muestre en la notificación
                allowHtml: true
            }).then((result) => {
                console.log('Redirigiendo');
                setTimeout(() => {
                window.location.href = '{{ route('homePacienteSesiones') }}';
                }, 3000);
            });
        }
    </script>

    <script>
        function confirmarCancelar(sesion_id) {
            console.log(sesion_id);
            Swal.fire({
                title: '<h2 class="text-center mb-4 font-alt">¿Estás seguro de Cancelar la Sesión?</h2>',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, cancelar',
                cancelButtonText: 'No, cancelar',
                customClass: {
                    title: 'swal-title', // Clase CSS para el título personalizado
                },
                // Permite que el HTML se muestre en la notificación
                allowHtml: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    $.ajax({
                        url: '/paciente/cancelarSesion',
                        type: 'POST',
                        data: {
                            'sesion_id': sesion_id,
                            '_token': token
                        },
                        success: function(data) {
                            console.log("exito!!!!  ");
                            Swal.fire(
                                '<h2 class="text-center mb-4 font-alt">Sesión cancelada</h2>',
                                'La sesión ha sido cancelada.',
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
     <script>
        $(document).ready(function() {
            $.ajax({
                url: '/paciente/getSesiones',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tbody = $('#table-sesiones');
                    tbody.empty();
                    $.each(data.sesiones, function(index, sesion) {
                        var row = $('<tr>');

                        row.append($('<td>').text(sesion.fecha_hora_inicio.split(' ')[0])); //Fecha 
                        row.append($('<td>').text(sesion.fecha_hora_inicio.split(' ')[1] + '/' + sesion.fecha_hora_fin.split(' ')[1])); //Hora Inicio/Hora Fin
                        row.append($('<td>').text(data.user.ci));              //CI Paciente
                        row.append($('<td>').text(data.user.name));            //Nombre(s) 
                        row.append($('<td>').text(data.user.apellidos));        //Apellidos
                        row.append($('<td>').text(sesion.descripcion_sesion)); // Descripción de la Sesión
                        row.append($('<td>').text(sesion.calificacion_descripcion)); //Diagnòstico
                        row.append($('<td>').text("test"));                     // archivos
                        if(sesion.estado == "Cancelado"){
                            row.append($('<td>').text("No concluida")); 
                        }else{
                            row.append($('<td>').text(sesion.estado));      // estado de la sesion
                        }

                        if(sesion.estado != "Activa"){
                            row.append('<td><span class="text-danger">Cancelada</span></td>');
                        } else if (sesion.pago_confirmado == 0) {
                            var actionIconsPago = $('<td>Pendiente</td><td class="action-icons">' +
                                '<i class="fas fa-money-bill text-success" onclick="mostrarModalPago(\'\')" title="Pagar"></i></td>' +
                                '<td class="action-icons">' +
                                '<i class="fas fa-times-circle text-danger" onclick="confirmarCancelar(' + sesion.id + ')" title="Cancelar"></i>' +
                                '</td>');

                            row.append(actionIconsPago);
                        } else {
                            row.append('<td>Realizado</td>');
                            //closeNotification();
                        }

                        $('#table-sesiones').append(row);
                    });
                }
            });
        });
    </script>
</body>

</html>

</body>

</html>