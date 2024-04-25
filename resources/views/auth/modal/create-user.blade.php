<div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="flex flex-col pb-5" action="{{ route('login.create') }}" method="POST">
                    @csrf
                    <div class="row mx-10 mb-4">
                        <div class="col-md-6 mb-3 pr-md-2">
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombres" require/>
                        </div>
                        <div class="col-md-6 mb-3 pl-md-2">
                            <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellidos" require/>
                        </div>
                    </div>
                    <div class="row mx-10 mb-4">
                        <div class="col-md-6 mb-3 pr-md-2">
                            <input type="date" id="fecha_na" name="fecha_na" class="form-control" placeholder="Fecha de nacimiento" require/>
                        </div>
                        <div class="col-md-6 mb-3 pl-md-2">
                            <input type="text" id="ocupacion" name="ocupacion" class="form-control" placeholder="Ocupación" require/>
                        </div>
                    </div>
                    <div class="row mx-10 mb-4">
                        <div class="col-md-6 mb-3 pr-md-2">
                            <input type="text" id="ci" name="ci" class="form-control" placeholder="Carnet de identidad" require/>
                        </div>
                        <div class="col-md-6 mb-3 pr-md-2">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Correo Electrónico" require/>
                        </div>
                    </div>
                    <div class="row mx-10 mb-4">
                        <div class="col-md-6 mb-3 pl-md-2">
                            <input type="text" id="password" name="password" class="form-control" placeholder="Contraseña" require/>
                        </div>
                        <div class="col-md-6 mb-3 pl-md-2">
                            <input type="text" id="password_c" name="password_c" class="form-control" placeholder="Confirmar contraseña" require/>
                        </div>
                    </div>
                    <div class="row mx-10 mb-4">
                        <div class="col-md-6 mb-3 pl-md-2">
                            <select class="form-select form-select-sm mb-1" aria-label="Pregunta de seguridad 1">
                                <option selected>Pregunta de seguridad 1</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <input type="text" id="respuesta_uno" name="respuesta_uno" class="form-control" placeholder="Respuesta" />
                        </div>
                        <div class="col-md-6 mb-3 pl-md-2">
                            <select class="form-select form-select-sm mb-1" aria-label="Pregunta de seguridad 2">
                                <option selected>Pregunta de seguridad 2</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <input type="text" id="respuesta_dos" name="respuesta_dos" class="form-control" placeholder="Respuesta" />
                        </div>
                    </div>
                    <div class="row mx-10 mb-4">
                        <div class="col-md-6 mb-3 pr-md-2">
                            <select name="tipo_usuario" id="tipo_usuario" class="form-select form-select-lg mb-1" aria-label="Large select example">
                                <option selected>Tipo de usuario</option>
                                <option value="paciente">Paciente</option>
                                <option value="tutor">Tutor</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="flex flex-row justify-center">
                        <button type="submit" id="btn_registrar" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>