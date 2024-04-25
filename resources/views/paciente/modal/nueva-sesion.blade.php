<!-- Modal -->
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Programar Sesión</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('paciente.newSesion') }}" method="POST">
                @csrf
                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" id="psicologo_id" name="psicologo_id" value="">

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Foto de la persona -->
                            <div class="col-md-5">
                                <!-- <img src="ruta-a-la-imagen.jpg" class="img-fluid rounded-circle" alt="Foto de la persona" style="border-radius: 100%;"> -->
                            </div>
                            <div class="col-md-7">
                                <h4 name="nombre_psicologo" id="nombre_psicologo"></h4>
                                <p name="desc_cv" id="desc_cv" class="text-center mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus vitae sapiente minima eligendi qui laudantium? Facere, assumenda? Cupiditate repudiandae blanditiis repellendus officia quas iure architecto facilis laudantium consequuntur maxime. Delectus!</p>
                            </div>
                        </div>
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
                                    <!-- <tr>
                                        <td><input type="checkbox" class="select-row"> Lunes</td>
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
                                    </tr> -->
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btn_registrar" class="btn btn-primary">Solicitar Sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>