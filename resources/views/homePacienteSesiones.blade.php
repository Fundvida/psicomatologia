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
        </div>
    </div>

    <!-- Modal de Pago -->
    <div class="modal fade" id="pagoModal" tabindex="-1" aria-labelledby="pagoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form action="{{ route('paciente.files.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title font-alt" id="pagoModalLabel">Pagar Sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <!-- Pestañas -->
                        <ul class="nav nav-tabs custom-tabs" id="pagoTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pagoQR-tab" data-bs-toggle="tab" data-bs-target="#pagoQR" type="button" role="tab" aria-controls="pagoQR" aria-selected="true">Pago por QR</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="cuentaBancaria-tab" data-bs-toggle="tab" data-bs-target="#cuentaBancaria" type="button" role="tab" aria-controls="cuentaBancaria" aria-selected="false">Pago por Cuenta Bancaria</button>
                            </li>
                        </ul>

                        <!-- Contenido de las pestañas -->
                        <div class="tab-content mt-4" id="pagoTabsContent">
                            <!-- Pestaña Pago por QR -->
                        <div class="tab-pane fade show active" id="pagoQR" role="tabpanel" aria-labelledby="pagoQR-tab">

                            <div class="text-center">
                                <h4 class="mb-4 font-alt">Pago por Código QR</h4>
                                <p class="mt-4">Por favor, escanea el código de pago a continuación y sube el comprobante correspondiente para confirmar tu transacción.</p>
                                <img src="{{ asset('images/qr_real.jpeg') }}" alt="QR de Pago" class="img-fluid mb-4" style="max-height: 300px;">
                            </div>
                        </div>
                        <!-- Pestaña Cuenta Bancaria -->
                        <div class="tab-pane fade" id="cuentaBancaria" role="tabpanel" aria-labelledby="cuentaBancaria-tab">

                            <div class="text-center">
                                <!-- Pestaña Cuenta Bancaria -->
                                <h4 class="mb-4 font-alt">Pago por Cuenta Bancaria</h4>
                                <p class="mt-4">Por favor, realiza el pago a esta cuenta bancaria y sube el comprobante de pago para confirmar tu transacción.</p>
                                <p><strong>Número de Cuenta:</strong> 4001-3356-418</p>
                                <p><strong>Banco:</strong> Banco FIE</p>
                                <p><strong>Tipo de Cuenta:</strong> Caja de Ahorro</p>
                                <p><strong>A nombre de:</strong> Fundación Educar Para La Vida</p>
                                <p><strong>NIT:</strong> 16-943-002-8</p>
                            </div>
                        </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                            <input type="hidden" name="id_paciente" value="{{ auth()->id() }}">
                            <input type="hidden" name="tipo_doc" value="">
                            <input type="hidden" name="id_sesion" value="">
                            <div class="mb-3">
                                <h5 for="comprobantePago" class="font-alt mb-2">Subir Comprobante de Pago <i class="fas fa-chevron-down ms-2 mb-3" style="font-size: 20px;"></i></h5>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary" onclick="confirmarPago()">CONFIRMAR PAGO</button>
                    </div>
                </div>
            </form>
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
            //showNotification();

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
                window.location.href =  '#';//'url-de-la-pagina-a-la-que-quieres-redirigir';
            });

            // Evento para abrir el modal al hacer clic en el icono de pagar
            pagarIcon.addEventListener('click', function() {
                $('#pagoModal').modal('show'); // Bootstrap Modal
            });
        });

        function mostrarModalPago(id_sesion){
            var tipo_doc = 'image';
            $('input[name="tipo_doc"]').val(tipo_doc);
            $('input[name="id_sesion"]').val(id_sesion);
            $('#pagoModal').modal('show');
            //console.log(id_sesion);
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
            title: '<h2 class="text-center mb-2 font-alt">¿Estás seguro de Cancelar la Sesión?</h2>',
            html: `<p class="lead fw-normal text-muted mb-2 ttNorms" style="line-height: 1.5em;">Por favor, explícale a su psicologo el motivo de la cancelación:</p>
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
                    const notificationContainer = document.getElementById('notification-container');
                    var pagosPendientes = 0;

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
                            if(sesion.calificacion){ // TODO para que una sesion se concluya sesion.calificacion != null
                                row.append($('<td>').text("Realizado"));
                            } else {
                                row.append($('<td>').text("No realizado"));
                            }
                            //row.append($('<td>').text(sesion.estado));      // estado de la sesion
                        }

                        if(sesion.estado != "activo" && sesion.estado != "Activa" ){
                            row.append('<td><span class="text-danger">Cancelada</span></td>');
                        } else if (sesion.pago_confirmado == 0) {
                            var actionIconsPago = $('<td>Pendiente</td><td class="action-icons">' +
                                '<i class="fas fa-money-bill text-success" onclick="mostrarModalPago(' + sesion.id + ')" title="Pagar"></i></td>' +
                                '<td class="action-icons">' +
                                '<i class="fas fa-times-circle text-danger" onclick="confirmarCancelar(' + sesion.id + ')" title="Cancelar"></i>' +
                                '</td>');
                            row.append(actionIconsPago);
                            pagosPendientes++;
                        } else {
                            row.append('<td>Realizado</td>');
                            //closeNotification();
                        }

                        if(pagosPendientes > 0){
                            notificationContainer.style.display = 'block';
                        }else {
                            notificationContainer.style.display = 'none';
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