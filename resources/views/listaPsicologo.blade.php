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
                    <i class="bi bi-person-plus-fill me-2"></i> Agregar Psicólogo
                </button>
            </div>
            <!-- Título -->
            <h2 class="text-center mb-4 font-alt">Listado de Psicógolos</h2>
            <!-- Formulario para registrar paciente (inicialmente oculto) -->
            <!-- Formulario emergente para registrar paciente -->
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
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="nombres" class="form-label">Nombres</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" required>
                                    </div>
                                    <div class="col">
                                        <label for="apellidos" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fechaFuncion" class="form-label">Fecha función título provisión nacional</label>
                                    <input type="date" class="form-control" id="fechaFuncion" name="fechaFuncion" required>
                                </div>

                                <div class="mb-3">
                                    <label for="universidad" class="form-label">Universidad</label>
                                    <input type="text" class="form-control" id="universidad" name="universidad" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="ciudadResidencia" class="form-label">Ciudad de Residencia</label>
                                        <input type="text" class="form-control" id="ciudadResidencia" name="ciudadResidencia" required>
                                    </div>
                                    <div class="col">
                                        <label for="paisResidencia" class="form-label">País de Residencia</label>
                                        <input type="text" class="form-control" id="paisResidencia" name="paisResidencia" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="ci" class="form-label">Carnet de identidad o equivalente</label>
                                    <input type="text" class="form-control" id="ci" name="ci" required>
                                </div>
                                <div class="row mb-3">
                                    <div class="col" id="divContrasena">
                                        <label for="contrasena" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                                    </div>
                                    <div class="col" id="divConfirmarContrasena">
                                        <label for="confirmarContrasena" class="form-label">Confirmar Contraseña</label>
                                        <input type="password" class="form-control" id="confirmarContrasena" name="confirmarContrasena" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="archivos" class="form-label">Archivos</label>
                                    <input type="file" id="archivos" class="form-control" name="archivos[]" multiple required>
                                    <!--<button type="submit">Subir Archivo(s)</button>-->
                                </div>
                                <div class="mb-3">
                                    <label for="descripcionCV">Descripción de CV:</label><br>
                                    <textarea id="descripcionCV" name="descripcionCV" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Número de Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su número de teléfono" style="width: 312px;" required>
                                </div>
                                <div class="mb-3">
                                    <label for="metodoConfirmacion" class="form-label">Método de Confirmación de Cuenta</label>
                                    <select id="metodoConfirmacion" name="metodoConfirmacion" class="form-select" required>
                                        <option value="correo">Correo Electrónico</option>
                                        <option value="sms">SMS</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="preguntaSeguridad1" class="form-label">Pregunta de Seguridad 1</label>
                                    <input type="text" class="form-control" id="preguntaSeguridad1" name="preguntaSeguridad1" required>
                                </div>
                                <div class="mb-3">
                                    <label for="preguntaSeguridad2" class="form-label">Pregunta de Seguridad 2</label>
                                    <input type="text" class="form-control" id="preguntaSeguridad2" name="preguntaSeguridad2" required>
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

            <script>
                var input = document.querySelector("#telefono");
                window.intlTelInput(input, {
                    initialCountry: "auto",
                    separateDialCode: true,
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.js",
                });

                function limpiar() {
                    document.getElementById("btnAddOrEdit").textContent = "Registrar Psicologo";
                    document.getElementById("nombres").value = "";
                    document.getElementById("apellidos").value = "";
                    document.getElementById("fechaNacimiento").value = "";
                    document.getElementById("fechaFuncion").value = "";
                    document.getElementById("universidad").value = "";
                    document.getElementById("ciudadResidencia").value = "";
                    document.getElementById("paisResidencia").value = "";
                    document.getElementById("ci").value = "";
                    document.getElementById("contrasena").value = "";
                    document.getElementById("confirmarContrasena").value = "";
                    document.getElementById("archivos").value = "";
                    document.getElementById("descripcionCV").value = "";
                    document.getElementById("correoElectronico").value = "";
                    document.getElementById("telefono").value = "";
                    document.getElementById("metodoConfirmacion").value = "correo"; // Reinicia a valor predeterminado
                    document.getElementById("preguntaSeguridad1").value = "";
                    document.getElementById("preguntaSeguridad2").value = "";
                    $('#formularioRegistroModal').modal('show');
                }

                function editar(psicologoId) {
                    document.getElementById("btnAddOrEdit").textContent = "Editar Psicologo";
                    document.getElementById("divContrasena").style.display = "none";
                    document.getElementById("divConfirmarContrasena").style.display = "none";
                    document.getElementById("contrasena").removeAttribute("required");
                    document.getElementById("confirmarContrasena").removeAttribute("required");

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
                            $('#preguntaSeguridad1').val(response.user.pregunta_seguridad_a);
                            $('#preguntaSeguridad2').val(response.user.pregunta_seguridad_b);
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

                function eliminar_psicologo(psicologoId) {
                    console.log(psicologoId);
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
                                url: '/psicologo/' + psicologoId + '/del',
                                type: 'GET',
                                success: function(response) {
                                    Swal.fire({
                                        title: "Eliminado!",
                                        text: "Psicologo eliminado exitosamente.",
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
                        @foreach ($psicologos as $psicologo)
                        @if($psicologo->estado == 'ACTIVO')
                        <tr>
                            <td>{{ $psicologo->user->ci }}</td>
                            <!-- <td>{{ $psicologo->id }}</td> -->
                            <td>{{ $psicologo->user->name }} {{ $psicologo->user->apellidos }}</td>
                            <td>{{ $psicologo->estado }}</td>
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
                                <button onclick="editar({{ $psicologo->id }})" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                                <button onclick="eliminar_psicologo({{ $psicologo->id }})" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Eliminar</button>
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
                text: "Psicólogo registrado exitosamente!",
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
                text: "Psicólogo actualizado exitosamente!",
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
                text: "Psicólogo eliminado exitosamente!",
                icon: "success"
            });
        });
    </script>
    @endif  
</body>

</html>
