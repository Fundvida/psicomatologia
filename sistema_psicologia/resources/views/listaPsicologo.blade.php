<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PSICÓLOGOS</title>
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
        .btn-primary {
            background-color: #edb1b5;
            border-color: #edb1b5;
        }

        .btn-primary:hover {
            background-color: #cc848a;
            border-color: #cc848a;
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
                    <i class="bi bi-person-plus-fill me-2"></i> Agregar Psicólogo
                </button>
            </div>
            <!-- Título -->
            <h2 class="text-center mb-4 font-alt">Listado de Psicógolos</h2>
            <!-- Formulario emergente para registrar paciente -->
            <div class="modal fade" id="formularioRegistroModal" tabindex="-1" aria-labelledby="formularioRegistroModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-alt">Registrar Psicógolo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
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

                                <div class="mb-3">
                                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="fechaNacimiento">
                                </div>
                                <div class="mb-3">
                                    <label for="fechaFuncion" class="form-label">Fecha función título provisión nacional</label>
                                    <input type="date" class="form-control" id="fechaFuncion">
                                </div>

                                <div class="mb-3">
                                    <label for="universidad" class="form-label">Universidad</label>
                                    <input type="text" class="form-control" id="universidad">
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="ciudadResidencia" class="form-label">Ciudad de Residencia</label>
                                        <input type="text" class="form-control" id="ciudadResidencia">
                                    </div>
                                    <div class="col">
                                        <label for="paisResidencia" class="form-label">País de Residencia</label>
                                        <input type="text" class="form-control" id="paisResidencia">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="ci" class="form-label">Carnet de identidad o equivalente</label>
                                    <input type="text" class="form-control" id="ci">
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
                                    <label for="archivos" class="form-label">Archivos</label>
                                    <input type="file" id="archivos" class="form-control" name="archivos[]" multiple>
                                    <!--<button type="submit">Subir Archivo(s)</button>-->
                                </div>
                                <div class="mb-3">
                                    <label for="descripcionCV">Descripción de CV:</label><br>
                                    <textarea id="descripcioncv" name="descripcionCV" class="form-control"></textarea>
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
                                    <button type="button" class="btn btn-primary" onclick="mostrarErrorPsicologo()">Cancelar</button>
                                    <button type="button" class="btn btn-primary" onclick="registrarPsicologo()">Registrar Psicólogo</button>
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
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                        <option value="ausenteTemporalmente">Ausente Temporalmente</option>

                    </select>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar Psicólogo...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tabla de pacientes -->
            <div class="custom-table-container shadow" style="height: 500px;">
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th>CI</th>
                            <th>Nombre Completo Psicólogo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Filas de ejemplo (rellena con datos reales cuando conectes a la base de datos) -->
                        <tr>
                            <td>1234567</td>
                            <td>Elias Pérez</td>
                            <td>Activo</td>
                            <td>
                                <!-- Botón desplegable con opciones -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Estado
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Cambiar a Activo</a></li>
                                        <li><a class="dropdown-item" href="#">Cambiar a Ausente Temporalmente</a></li>
                                        <li><a class="dropdown-item" href="#">Cambiar a Inactivo</a></li>
                                        <li><a class="dropdown-item" href="#">Ver CV</a></li>
                                    </ul>
                                </div>
                                <!-- Botones de editar y eliminar -->
                                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                                <button class="btn btn-sm btn-outline-danger" onclick="confirmarEliminarPsicologo('Elias Pérez')"><i class="bi bi-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6434344</td>
                            <td>Tito Castillo</td>
                            <td>Ausente Temporalmente</td>
                            <td>
                                <!-- Botón desplegable con opciones -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Estado
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Cambiar a Activo</a></li>
                                        <li><a class="dropdown-item" href="#">Cambiar a Ausente Temporalmente</a></li>
                                        <li><a class="dropdown-item" href="#">Cambiar a Inactivo</a></li>
                                        <li><a class="dropdown-item" href="#">Ver CV</a></li>
                                    </ul>
                                </div>
                                <!-- Botones de editar y eliminar -->
                                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                                <button class="btn btn-sm btn-outline-danger" onclick="confirmarEliminarPsicologo('Tito Castillo')"><i class="bi bi-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        function registrarPsicologo() {
            Swal.fire({
                icon: 'success',
                title: '<h2 class="text-center mb-4 font-alt">Éxito</h2>',
                text: 'El psicólogo se ha registrado exitosamente.',
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
        function mostrarErrorPsicologo() {
            Swal.fire({
                icon: 'error',
                title: '<h2 class="text-center mb-4 font-alt">Error</h2>',
                text: 'Se ha producido un error al registrar psicólogo.',
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
        function confirmarEliminarPsicologo(nombre) {
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
                        'El psicólogo ' + nombre + ' ha sido eliminado.',
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



