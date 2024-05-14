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

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        /* Estilos personalizados para la tabla */
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
                <button class="btn btn-outline-primary btn-lg btn-paso1 fw-bold" onclick="limpiar()">
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
                            <form action="{{ route('paciente.store') }}" method="POST">
                                @csrf

                                <input type="hidden" id="paciente_id" name="paciente_id" value="">
                                <div class="mb-3">
                                    <label for="tipoUsuario" class="form-label">Tipo de Usuario <span class="text-danger">*</span></label>
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
                                    <label for="preguntaSeguridad1" class="form-label">Pregunta de Seguridad 1 <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="preguntaSeguridad1" name="preguntaSeguridad1" required>
                                </div>
                                <div class="mb-3">
                                    <label for="preguntaSeguridad2" class="form-label">Pregunta de Seguridad 2 <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="preguntaSeguridad2" name="preguntaSeguridad2" required>
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

                function limpiar() {
                    document.getElementById("btnAddOrEdit").textContent = "Registrar Paciente";
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
                    $('#preguntaSeguridad1').val('');
                    $('#preguntaSeguridad2').val('');
                    $('#preguntaSeguridad3').val('');
                    $('#preguntaSeguridad4').val('');

                    $('#metodoConfirmacion').val('correo');
                    $('#formularioRegistroModal').modal('show');
                }

                function editar(paciente_id) {
                    document.getElementById("divContrasena").style.display = "none";
                    document.getElementById("divConfirmarContrasena").style.display = "none";
                    document.getElementById("btnAddOrEdit").textContent = "Actualizar Paciente";
                    document.getElementById("contrasena").removeAttribute("required");
                    document.getElementById("confirmarContrasena").removeAttribute("required");

                    //console.log(paciente_id)
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
                            $('#preguntaSeguridad1').val(response.user.pregunta_seguridad_a);
                            $('#preguntaSeguridad2').val(response.user.pregunta_seguridad_b);
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
                        title: "¿Estas seguro?",
                        text: "Estas seguro que eliminar el registro?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/paciente/' + id + '/del',
                                type: 'GET',
                                success: function(response) {
                                    Swal.fire({
                                        title: "Eliminado!",
                                        text: "Paciente eliminado exitosamente.",
                                        icon: "success"
                                    }).then(function() {
                                        // Recargar la página
                                        window.location.reload();
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.log(error);
                                }
                            });
                        }
                    });
                }
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
                        <!-- <tr>
                            <td>1234567</td>
                            <td>Juan Pérez</td>
                            <td>77777777</td>
                            <td>Paciente Mayor</td>
                            <td>1990-05-20</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Eliminar</button>
                            </td>
                        </tr> -->
                        @foreach ($pacientes as $paciente)
                        @if($paciente->estado == 'ACTIVO')
                        <tr>
                            <td>{{ $paciente->user->ci }}</td>
                            <td>{{ $paciente->user->name }} {{ $paciente->user->apellidos }}</td>
                            <td>{{ $paciente->user->telefono }}</td>
                            <td>{{ $paciente->tipo_paciente }}</td>
                            <td>{{ $paciente->user->fecha_nacimiento }}</td>
                            <td>
                                <button onclick="editar({{ $paciente->id }})" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                                <button onclick="eliminar({{ $paciente->id }})" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    @if(session('resultado') === 'eliminado')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "Éxito!",
                text: "Paciente eliminado exitosamente!",
                icon: "success"
            });
        });
    </script>
    @endif
</body>

</html>