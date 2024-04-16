@extends('layouts.app')

@section('title', 'Mantenimiento Psicologo')

@section('content')

    <div class="flex justify-center mt-5">
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreate">Nuevo</a>
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
                                    <span class="btn btn-danger">
                                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/></svg></a>
                                    </span>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.modal.create-psicologo')
    <script>
        function editar(psicologoId) {
        // Abre el modal
        $('#ModalCreate').modal('show');
        console.log(psicologoId);
        // $.ajax({
        //     url: '/psicologo/' + psicologoId + '/edit',
        //     type: 'GET',
        //     success: function(response) {
        //     // Llena los campos del formulario del modal con los detalles del psicólogo
        //     $('#nombre').val(response.nombre);
        //     $('#edad').val(response.edad);
        //     $('#especialidad').val(response.especialidad);
        //     // Otros campos del formulario
        //     },
        //     error: function(xhr, status, error) {
        //     // Manejar errores
        //     }
        // });
        }
    </script>
@endsection