<div id="step-resumen" class="content step" role="tabpanel" aria-labelledby="resumen-step-trigger">
    <div class="d-flex justify-content-center align-items-center">
        <i class="bi bi-check-circle-fill text-success display-1 mb-4" style="color: #EDB1B5 !important;"></i>
    </div>

    <div class="mb-4">
        <h2 class="mb-0 font-alt">Confirme su Cita</h2>
    </div>

    <!--CARD -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="mx-auto my-0" style="max-width: 23rem;">
                    <div class="card testimonial-card mt-0 mb-0">
                        <div class="card-up aqua-gradient"></div>
                        <div class="avatar mx-auto white">
                            <img src="{{asset('images/summary/user-icon.png')}}" class="rounded-circle img-fluid" alt="woman avatar">
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title font-weight-bold">Datos Usuario</h4>
                            <hr>
                            <div class="flex-column text-start resumen-campos">
                                <div class="">
                                    <div>
                                        <span style="font-weight: bold;">Nombre: </span><span id='nombreR'></span>
                                    </div>
                                    <div>
                                    <span style="font-weight: bold;">Apellidos: </span><span id='apellidoR'></span>
                                    </div>
                                </div>
                                <div class="">
                                    <div>
                                    <span style="font-weight: bold;">Email: </span><span id='emailR'></span>
                                    </div>
                                    <div>
                                    <span style="font-weight: bold;">Número Celular: </span><span id='celularR'></span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mx-auto my-0" style="max-width: 23rem;">
                    <div class="card testimonial-card mt-0 mb-0">
                        <div class="card-up aqua-gradient"></div>
                        <div class="avatar mx-auto white">
                            <img src="{{asset('images/summary/service-icon.png')}}" class="rounded-circle img-fluid" alt="woman avatar">
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title font-weight-bold">Datos Servicio</h4>
                            <hr>
                            <div class="flex-column text-start resumen-campos">
                                <div class="">
                                    <div>
                                    <span style="font-weight: bold;">Servicio:</span><span id='servicioR'></span>
                                    </div>
                                </div>
                                <div class="">
                                    <div>
                                    <span style="font-weight: bold;">Psicologo: </span><span id='psicologoR'></span>
                                    </div>
                                </div>
                                <div class="">
                                    <div>
                                    <span style="font-weight: bold;">horario: </span><span id='horarioR'></span>
                                    </div>
                                    <div>
                                    <span style="font-weight: bold;">Forma de Pago: </span><span id='pagoR'></span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                    <span style="font-weight: bold;">Descripcion adicional: </span><span id='descripcionR'></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Descripción -->
    <p class="lead fw-normal text-muted mb-2 ttNorms fs-6">Por favor revise toda la información
        ingresada en los pasos anteriores. Si toda la información es correcta, confirme su
        solicitud para finalizar la programación de su cita. Nos pondremos en contacto con usted
        para confirmar su cita en un plazo de 24 horas.</p>
    {{-- <div class="text-center">
    <button type="submit"
        class="btn btn-outline-primary btn-lg btn-paso1 rounded-pill fw-bold"
        style="font-size: 24px; padding: 12px 24px;">Enviar</button>
</div> --}}
</div>