<div id="step-user" class="content step" role="tabpanel" aria-labelledby="user-step-trigger">
    <h3 class="text-center mb-4 font-alt">Datos de contacto</h3>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="text-start">
                <label for="nombre" class="form-label font-alt form-title">
                    <i class="bi bi-person"></i> Nombre(s)
                </label>
                <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
                <span class="error-form" id="nombreError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-start">
                <label for="apellidos" class="form-label font-alt form-title">
                    <i class="bi bi-person"></i> Apellidos
                </label>
                <input type="text" class="form-control" id="apellidos" placeholder="Ingrese su apellido">
                <span class="error-form" id="apellidosError"></span>
            </div>
        </div>
    </div>
    <!-- Fila 2 -->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="text-start">
                <label for="email" class="form-label font-alt form-title">
                    <i class="bi bi-envelope"></i> Email
                </label>
                <input type="email" class="form-control" id="email" placeholder="Ingrese su correo electrónico">
                <span class="error-form" id="emailError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-start">
                <label for="telefono" class="form-label font-alt form-title">
                    <i class="bi bi-phone"></i> Número de Celular
                </label>
                <input type="tel" class="form-control" id="telefono" placeholder="Ingrese su número de teléfono">
                <span class="error-form" id="telefonoError"></span>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="text-start">
                <label for="contrasena" class="form-label font-alt form-title">
                    <i class="bi bi-lock"></i> Contraseña
                </label>
                <div class="input-group">
                    <input type="password" class="form-control" id="contrasena" placeholder="Ingrese su contraseña"
                        aria-describedby="toggle-password">
                    <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                        <i class="bi bi-eye"></i>
                    </button>
                    
                </div>
                <span class="error-form" id="passwordError"></span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-start">
                <label for="confirmarContrasena" class="form-label font-alt form-title">
                    <i class="bi bi-lock"></i> Confirmar Contraseña
                </label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmarContrasena"
                        placeholder="Confirme su contraseña" aria-describedby="toggle-password">
                    <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                        <i class="bi bi-eye"></i>
                    </button>
                    
                </div>
                <span class="error-form" id="passwordConfirmationError"></span>
            </div>
        </div>
    </div>
</div>
