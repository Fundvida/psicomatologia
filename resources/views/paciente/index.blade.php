@extends('layouts.app')

@section('title', 'Paciente Home')

@section('content')

<h1 class="text-5xl text-center">Lista de psicologos</h1>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ciudad de residencia</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($psicologos as $psicologo)
            @if($psicologo->estado == 'ACTIVO')
            <tr>
                <th scope="row">1</th>
                <td>{{ $psicologo->user->name }} {{ $psicologo->user->apellidos }}</td>
                <td>{{ $psicologo->ciudad_residencia }}</td>
                <td>
                    <p><a onclick="nueva_sesion({{ $psicologo->id }})" data-toggle="modal" data-target="#ModalSesion" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Programar Sesión</a></p>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@include('paciente.modal.nueva-sesion')
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function nueva_sesion(id_psicologo) {
        window.location.href = "{{ route('psicologo.mostrar', ':id') }}".replace(':id', id_psicologo);
        // document.getElementById("btn_registrar").textContent = "Solicitar sesión";
        // $('#ModalCreate').modal('show');
        // $.ajax({
        //     url: '/paciente/' + id_psicologo + '/nuevaSesion',
        //     type: 'GET',
        //     success: function(data) {
        //         console.log(data);
        //         $('#psicologo_id').text(data.psicologo.id);
        //         $('#nombre_psicologo').text(data.user.name);
        //         $('#desc_cv').text(data.psicologo.descripcion_cv);

        //         var horarios = data.horarios;
        //         var tableRows = ''; 

        //         horarios.forEach(function(horario) {
        //             tableRows += '<tr>';
        //             tableRows += '<td><input type="checkbox" class="select-row"> ' + horario.dia + '</td>';
        //             tableRows += '<td>';
        //             tableRows += '<label><input type="radio" name="' + horario.dia.toLowerCase() + '" value="Mañana" class="horario"> Mañana</label>';
        //             tableRows += '<label><input type="radio" name="' + horario.dia.toLowerCase() + '" value="Tarde" class="horario"> Tarde</label>';
        //             tableRows += '</td>';
        //             tableRows += '<td><input type="time" class="form-control"></td>';
        //             tableRows += '</tr>';
        //         });

        //         $('#tablaHorarios tbody').html(tableRows);
        //     },
        //     error: function(xhr, status, error) {
        //         console.log(error);
        //     }
        // });
    }

    // document.addEventListener('DOMContentLoaded', function() {
    //     const tableBody = document.querySelector('#tablaHorarios tbody');

    //     tableBody.addEventListener('change', function(event) {
    //         if (event.target.classList.contains('select-row')) {
    //             const checkboxes = document.querySelectorAll('.select-row');
    //             const radioButtons = document.querySelectorAll('.horario');
    //             const currentCheckbox = event.target;

    //             if (currentCheckbox.checked) {
    //                 checkboxes.forEach(function(otherCheckbox) {
    //                     if (otherCheckbox !== currentCheckbox) {
    //                         otherCheckbox.disabled = true;
    //                     }
    //                 });

    //                 radioButtons.forEach(function(radio) {
    //                     if (!radio.closest('tr').querySelector('.select-row').checked) {
    //                         radio.disabled = true;
    //                     }
    //                 });
    //             } else {
    //                 checkboxes.forEach(function(otherCheckbox) {
    //                     otherCheckbox.disabled = false;
    //                 });

    //                 radioButtons.forEach(function(radio) {
    //                     radio.disabled = false;
    //                 });
    //             }
    //         }
    //     });

    //     tableBody.addEventListener('click', function(event) {
    //         if (event.target.classList.contains('horario')) {
    //             const radioButtons = document.querySelectorAll('.horario');
    //             const currentRadio = event.target;

    //             if (currentRadio.checked) {
    //                 const currentCheckbox = currentRadio.closest('tr').querySelector('.select-row');

    //                 checkboxes.forEach(function(checkbox) {
    //                     if (checkbox !== currentCheckbox) {
    //                         checkbox.checked = false;
    //                         checkbox.disabled = true;
    //                     }
    //                 });
    //             }
    //         }
    //     });
    // });
</script>
@endsection