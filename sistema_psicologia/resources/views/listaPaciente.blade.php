<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PACIENTES</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>

    <style>
        /* Estilos personalizados para la tabla */
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
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .custom-table th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: bold;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <!-- Logo a la izquierda -->
            <a class="navbar-brand fw-bold" href="#page-top">
                <img src="{{ asset('images/logo gav2.png') }}" alt="Logo" style="height: 100px">
            </a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <section class="py-5 d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 100px); margin-top: 100px;" id="pacientes">

        <div class="container px-5">
            <div class="text-end mb-3">
                <button class="btn btn-outline-primary btn-lg btn-paso1 fw-bold" onclick="mostrarFormulario()">
                    <i class="bi bi-person-plus-fill me-2"></i> Agregar Paciente
                </button>
            </div>
            <!-- Título -->
            <h2 class="text-center mb-4 font-alt">Listado de Pacientes</h2>
            <!-- Formulario para registrar paciente (inicialmente oculto) -->
            <!-- Formulario emergente para registrar paciente -->
            <div class="modal fade" id="formularioRegistroModal" tabindex="-1" aria-labelledby="formularioRegistroModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-alt">Registrar Paciente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="tipoUsuario" class="form-label">Tipo de Usuario</label>
                                    <select id="tipoUsuario" class="form-select">
                                        <option value="mayor">Paciente Mayor</option>
                                        <option value="menor">Paciente Menor de Edad</option>
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="nombres" class="form-label">Nombres</label>
                                        <input type="text" class="form-control" id="nombres">
                                    </div>
                                    <div class="col">
                                        <label for="apellidos" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" id="apellidos">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="fechaNacimiento">
                                    </div>
                                    <div class="col">
                                        <label for="ocupacion" class="form-label">Ocupación</label>
                                        <input type="text" class="form-control" id="ocupacion">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="numeroCI" class="form-label">Número de CI</label>
                                    <input type="text" class="form-control" id="numeroCI">
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="contrasena" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="contrasena">
                                    </div>
                                    <div class="col">
                                        <label for="confirmarContrasena" class="form-label">Confirmar Contraseña</label>
                                        <input type="password" class="form-control" id="confirmarContrasena">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="correoElectronico">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Número de Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" placeholder="Ingrese su número de teléfono" style="width: 312px;">
                                </div>
                                <div class="mb-3">
                                    <label for="metodoConfirmacion" class="form-label">Método de Confirmación de Cuenta</label>
                                    <select id="metodoConfirmacion" class="form-select">
                                        <option value="correo">Correo Electrónico</option>
                                        <option value="sms">SMS</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="preguntaSeguridad1" class="form-label">Pregunta de Seguridad 1</label>
                                    <input type="text" class="form-control" id="preguntaSeguridad1">
                                </div>
                                <div class="mb-3">
                                    <label for="preguntaSeguridad2" class="form-label">Pregunta de Seguridad 2</label>
                                    <input type="text" class="form-control" id="preguntaSeguridad2">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" onclick="mostrarErrorPaciente()">Cancelar</button>
                                    <button type="button" class="btn btn-primary" onclick="registrarPaciente()">Registrar Paciente</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function mostrarFormulario() {
                    $('#formularioRegistroModal').modal('show');
                }
            </script>
            <script>
                var input = document.querySelector("#telefono");
                window.intlTelInput(input, {
                    initialCountry: "auto",
                    separateDialCode: true,
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.js",
                });
            </script>
            <!-- Filtros y barra de búsqueda -->
            <div class="row mb-5">
                <div class="col-md-6">
                    <select class="form-select">
                        <option value="todos">Todos</option>
                        <option value="mayor">Paciente Mayor</option>
                        <option value="menor">Paciente Menor de Edad</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar paciente...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tabla de pacientes -->
            <div class="custom-table-container shadow">
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
                    <tbody>
                        <!-- Filas de ejemplo (rellena con datos reales cuando conectes a la base de datos) -->
                        <tr>
                            <td>1234567</td>
                            <td>Juan Pérez</td>
                            <td>77777777</td>
                            <td>Paciente Mayor</td>
                            <td>1990-05-20</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                                <button class="btn btn-sm btn-outline-danger" onclick="confirmarEliminarPaciente('Juan Pérez')"><i class="bi bi-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6434344</td>
                            <td>Maria García</td>
                            <td>67676767</td>
                            <td>Paciente Menor de Edad</td>
                            <td>2005-09-12</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                                <button class="btn btn-sm btn-outline-danger" onclick="confirmarEliminarPaciente('Maria García')"><i class="bi bi-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2727272</td>
                            <td>Ivan Flores</td>
                            <td>74747474</td>
                            <td>Paciente Menor de Edad</td>
                            <td>2002-01-19</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                                <button class="btn btn-sm btn-outline-danger" onclick="confirmarEliminarPaciente('Ivan Flores')"><i class="bi bi-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <script>
        function registrarPaciente() {
            // Aquí se pueden incluir tus acciones para registrar al psicólogo
            // Por ejemplo, enviar una solicitud AJAX al servidor

            // Luego, mostrar la notificación de éxito
            Swal.fire({
                icon: 'success',
                title: '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                text: 'El paciente se ha registrado exitosamente.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                customClass: {
                    title: 'swal-title', // Clase CSS para el título personalizado
                },
                // Permite que el HTML se muestre en la notificación
                allowHtml: true
            });
        }
    </script>
    <script>
        function mostrarErrorPaciente() {
            Swal.fire({
                icon: 'error',
                title: '<h2 class="text-center mb-4 font-alt">Error</h2>',
                text: 'Se ha producido un error al registrar paciente.',
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK',
                customClass: {
                    title: 'swal-title', // Clase CSS para el título personalizado
                },
                // Permite que el HTML se muestre en la notificación
                allowHtml: true
            });
        }
    </script>

    <script>
        function confirmarEliminarPaciente(nombre) {
            Swal.fire({
                title: '<h2 class="text-center mb-4 font-alt">¿Estás seguro?</h2>',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                customClass: {
                    title: 'swal-title', // Clase CSS para el título personalizado
                },
                // Permite que el HTML se muestre en la notificación
                allowHtml: true
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        '<h2 class="text-center mb-4 font-alt">Eliminado</h2>',
                        'El paciente ' + nombre + ' ha sido eliminado.',
                        'success'
                    )
                }
            });
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

</body>
</html>



