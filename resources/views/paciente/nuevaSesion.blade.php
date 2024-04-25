@extends('layouts.app')

@section('title', 'Paciente Home')

@section('content')

<script>
    var psicologo = @json($psicologo);
    var user = @json($user);
    var horarios = @json($horarios);

    console.log("Datos del psicólogo:", psicologo);
    console.log("Datos del usuario:", user);
    console.log("Horarios disponibles:", horarios);
</script>
<h1 class="text-5xl text-center">Programar sesión</h1>
<div class="container">


    <div class="container-fluid">
        <div class="row">
            <!-- Foto de la persona -->
            <div class="col-md-5">
                <!-- <img src="ruta-a-la-imagen.jpg" class="img-fluid rounded-circle" alt="Foto de la persona" style="border-radius: 100%;"> -->
            </div>
            <div class="col-md-7">
                <h4 name="nombre_psicologo" id="nombre_psicologo">{{ $user->name }}</h4>
                <p name="desc_cv" id="desc_cv" class="text-center mb-4"> {{ $psicologo->descripcion_cv }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus vitae sapiente minima eligendi qui laudantium? Facere, assumenda? Cupiditate repudiandae blanditiis repellendus officia quas iure architecto facilis laudantium consequuntur maxime. Delectus!</p>
            </div>
        </div>
        <form action="{{ route('paciente.newSesion') }}" method="POST" id="form-sesion">
            @csrf
            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
            <input type="hidden" id="psicologo_id" name="psicologo_id" value="">
            <div class="row">
                <h2 class="fs-5">Dias disponible</h2>
                <p class="mb-4">Porfavor, solo seleccione el dia y hora una vez.</p>
                <table class="table" id="tablaHorarios">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Horario de Disponibilidad</th>
                            <th>Hora de sesión</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($horarios as $horario)
                        <tr>
                            <td><input type="checkbox" class="select-row"> {{ $horario->dia }}</td>
                            <td>
                                <label>
                                    <input type="radio" name="lunes" value="Mañana" class="horario"> Mañana
                                </label>
                                <label>
                                    <input type="radio" name="lunes" value="Tarde" class="horario"> Tarde
                                </label>
                            </td>
                            <td>
                                <input type="time" class="form-control">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" value="Submit" id="submitButton" class="btn btn-primary">Solicitar Sesión</button>
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Obtener todos los elementos checkbox y radio button
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const radioButtons = document.querySelectorAll('.horario');

    // Manejar el evento de cambio en los checkboxes
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Si el checkbox ha sido seleccionado
            if (this.checked) {
                // Deshabilitar todos los checkboxes excepto el actual
                checkboxes.forEach(function(cb) {
                    if (cb !== checkbox) {
                        cb.disabled = true;
                    }
                });

                // Limpiar todos los radio buttons
                radioButtons.forEach(function(rb) {
                    rb.checked = false;
                });

                // Habilitar los elementos dentro de la fila seleccionada
                const row = checkbox.closest('tr');
                const inputs = row.querySelectorAll('input[type="radio"], input[type="time"]');
                inputs.forEach(function(input) {
                    input.disabled = false;
                });
            } else { // Si el checkbox ha sido deseleccionado
                // Habilitar todos los checkboxes
                checkboxes.forEach(function(cb) {
                    cb.disabled = false;
                });

                // Limpiar los elementos dentro de la fila seleccionada
                const row = checkbox.closest('tr');
                const inputs = row.querySelectorAll('input[type="radio"], input[type="time"]');
                inputs.forEach(function(input) {
                    input.disabled = true;
                    // Limpiar los radio buttons
                    if (input.type === 'radio') {
                        input.checked = false;
                    }
                });
            }
        });
    });

    document.getElementById("submitButton").addEventListener("click", function(event) {
        event.preventDefault(); // Evita el envío predeterminado del formulario

        // Mostrar la ventana de confirmación
        Swal.fire({
            title: "Confirmación de solicitud",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, confirmar"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("form-sesion").submit();
            }
        });
    });
</script>
@endsection