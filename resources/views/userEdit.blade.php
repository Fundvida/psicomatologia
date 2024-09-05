<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta etiquetas requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SISTEMA DE PSICOLOGIA</title>
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
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

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



    <!-- Contenido principal -->

    <main class="main-content">
        <section class="py-1 d-flex" style="min-height: calc(100vh - 100px);">
            <div class="container px-5 text-center shadow-lg p-5 rounded mt-2">
                
                <h2 class="display-3 lh-1 mb-2 font-alt">Cuenta de Usuario</h2>
               
                <ul class="nav nav-tabs justify-content-center mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab">General</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="p-4 rounded shadow-lg">
                            <h3 class="mb-4 font-alt">Información del Usuario</h3>
                            <form action="{{ route('user.edit') }}" method="POST">
                            @csrf
                                <div class="mb-3 text-start">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $user->name }}">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $user->apellidos }}">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ $user->fecha_nacimiento }}">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="ci" class="form-label">Carnet de Identidad</label>
                                    <input type="text" class="form-control" id="ci" value="{{ $user->ci }}">
                                </div>
                                @if(auth()->user()->hasRole('Paciente') || auth()->user()->hasRole('Tutor'))
                                <div class="mb-3 text-start">
                                    <label for="ocupacion" class="form-label">Ocupacion</label>
                                    <input type="text" class="form-control" id="ocupacion" name="ocupacion" value="{{ $user->ocupacion }}">
                                </div>
                                @endif
                                <div class="mb-3 text-start">
                                    <label for="email" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="telefono" class="form-label">Número de Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ $user->telefono }}">
                                </div>
                                <button type="submit" id="saveButton" class="btn btn-outline-primary btn-paso1 rounded-pill fw-bold font-alt">ACTUALIZAR CAMBIOS</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
    <script>
        document.getElementById('passwordForm').addEventListener('submit', async (event) => {
            event.preventDefault(); 

            const formData = new FormData(event.target); 

            try {
                const response = await fetch('{{ route("user.password") }}', {
                    method: 'POST',
                    body: formData
                });

                const responseData = await response.json();

                if (response.ok) {
                    console.log("contraseña actualizada")
                    //alert(responseData.message);
                    Swal.fire({
                        title: "Éxito!",
                        text: responseData.message,
                        icon: "success"
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                } else {
                    console.log("error")
                    //alert(responseData.error);
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: responseData.error
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            } catch (error) {
                console.error('Error al enviar la solicitud:', error);
            }
        });

    </script>

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

<script>
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
    @if(session('resultado') === 'actualizado')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "Éxito!",
                text: "Perfil actualizado exitosamente.",
                icon: "success"
            });
        });
    </script>
    @endif
    @if(session('resultado') === 'error')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "Oops.",
                text: "El correo proporcionado ya existe.",
                icon: "error"
            });
        });
    </script>
    @endif
</body>

</html>