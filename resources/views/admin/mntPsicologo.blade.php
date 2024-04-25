@extends('layouts.app')

@section('title', 'Mantenimiento Psicologo')

@section('content')

    <div class="flex justify-center mt-5">
        <a href="#" class="btn btn-success" onclick="limpiar()" data-toggle="modal" data-target="#ModalCreate">Nuevo</a>
    </div>
    <div class="container">
        <h4>Registro de Psicologos</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="texto">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>CI</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Departamento de residencia</th>
                                <th>Ciudad de residencia</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($psicologos as $psicologo)
                            @if($psicologo->estado == 'ACTIVO')
                                <tr>
                                    <td>{{ $psicologo->user->ci }}</td>
                                    <!-- <td>{{ $psicologo->id }}</td> -->
                                    <td>{{ $psicologo->user->name }}</td>
                                    <td>{{ $psicologo->user->apellidos }}</td>
                                    <td>{{ $psicologo->user->telefono }}</td>
                                    <td>{{ $psicologo->user->email }}</td>
                                    <td>{{ $psicologo->departamento_residencia }}</td>
                                    <td>{{ $psicologo->ciudad_residencia }}</td>
                                    <td>
                                        <span class="btn btn-primary">
                                            <a onclick="editar({{ $psicologo->id }})" data-toggle="modal" data-target="#ModalCreate" id="editPsicologo"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/></svg></a>
                                        </span>
                                        <span class="btn btn-danger" onclick="eliminar_psicologo({{ $psicologo->id }})">
                                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg></a>
                                        </span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.modal.create-psicologo')
@endsection
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
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        function editar(psicologoId) {
            document.getElementById("btn_registrar").textContent = "Editar";
            $('#ModalCreate').modal('show');
            $.ajax({
                url: '/admin/psicologo/' + psicologoId + '/edit',
                type: 'GET',
                success: function(response) {
                    $('#psicologo_id').val(response.psicologo.id);
                    // Data de la tabla user
                        $('#nombre').val(response.user.name);
                        $('#apellido').val(response.user.apellidos);
                        $('#fecha_na').val(response.user.fecha_nacimiento);
                        $('#ci').val(response.user.ci);
                        $('#email').val(response.user.email);
                        //$('#password').val(response.user.password);
                        $('#numero_telefono').val(response.user.telefono);
                        $('#preg_uno').val(response.user.pregunta_seguridad_a);
                        $('#preg_dos').val(response.user.pregunta_seguridad_b);
                    // Data de la tabla psicologo
                        $('#fecha_titulo').val(response.psicologo.fecha_funcion_titulo);
                        $('#universidad').val(response.psicologo.universidad);
                        $('#c_recidencia').val(response.psicologo.ciudad_residencia);
                        $('#d_residencia').val(response.psicologo.departamento_residencia);
                        $('#p_residencia').val(response.psicologo.pais_residencia);
                        $('#descripcion_cv').val(response.psicologo.cv_descripcion);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }

        function limpiar(){
            $('#psicologo_id').val("");

            $('#nombre').val("");
            $('#apellido').val("");
            $('#fecha_na').val("");
            $('#ci').val("");
            $('#email').val("");
            
            $('#numero_telefono').val("");
            $('#preg_uno').val("");
            $('#preg_dos').val("");
    
            $('#fecha_titulo').val("");
            $('#universidad').val("");
            $('#c_recidencia').val("");
            $('#d_residencia').val("");
            $('#p_residencia').val("");
            $('#descripcion_cv').val("");

            document.getElementById("btn_registrar").textContent = "Guardar";
        }

        function eliminar_psicologo(psicologoId){
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
                    url: '/admin/psicologo/' + psicologoId + '/del',
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
@endsection