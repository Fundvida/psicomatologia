<div id="step-servicio" class="content step" role="tabpanel" aria-labelledby="servicio-step-trigger">
    <div id="servicioCard">
        <h2 class="text-start mb-4 font-alt">Servicios Disponibles</h2>
        <!-- Descripción "Seleccione el servicio por el que está interesado/a." alineada a la izquierda -->
        <p class="text-start lead fw-normal text-muted mb-5 ttNorms">Seleccione el servicio por
            el que está interesado/a.</p>

        <!-- Botones de servicios -->
        <div class="row mb-5">
            <!-- Botones en la primera fila -->


            <!-- Botones en la primera fila -->
            <div class="col-md-6 mb-3">
                <button type="button"
                    class="btn btn-servicio btn-outline-primary btn-lg btn-servicio rounded-pill w-100 fw-bold"
                    onclick="handleButtonServicioClick(this,'Psicología Infantil')" id='btnServicio1'>
                    >
                    <i class="bi bi-person servicio-icon"></i> Psicología Infantil
                </button>
            </div>
            <div class="col-md-6 mb-3">
                <button type="button"
                    class="btn btn-servicio btn-outline-primary btn-lg btn-servicio rounded-pill w-100 fw-bold"
                    onclick="handleButtonServicioClick(this,'Terapia Adolecentes/Jóvenes')" id='btnServicio2'>
                    >
                    <i class="bi bi-heart servicio-icon"></i> Terapia Adolecentes/Jóvenes
                </button>
            </div>
            <!-- Botones en la segunda fila -->
            <div class="col-md-6 mb-3">
                <button type="button"
                    class="btn btn-servicio btn-outline-primary btn-lg btn-servicio rounded-pill w-100 fw-bold"
                    onclick="handleButtonServicioClick(this,'Terapia Adultos')" id='btnServicio3'>
                    <i class="bi bi-people servicio-icon"></i> Terapia Adultos
                </button>
            </div>
            <div class="col-md-6 mb-3">
                <button type="button"
                    class="btn btn-servicio btn-outline-primary btn-lg btn-servicio rounded-pill w-100 fw-bold"
                    onclick="handleButtonServicioClick(this,'Terapia Adultos Mayores')" id='btnServicio4'>
                    <i class="bi bi-grid servicio-icon"></i> Terapia Adultos Mayores
                </button>
            </div>
            <!-- Botones en la tercera fila -->
            <div class="col-md-6 mb-3">
                <button type="button"
                    class="btn btn-servicio btn-outline-primary btn-lg btn-servicio rounded-pill w-100 fw-bold"
                    onclick="handleButtonServicioClick(this,'Terapia Pareja')" id='btnServicio5'>
                    <i class="bi bi-people servicio-icon"></i> Terapia de Pareja
                </button>
            </div>
            <div class="col-md-6 mb-3">
                <button type="button"
                    class="btn btn-servicio btn-outline-primary btn-lg btn-servicio rounded-pill w-100 fw-bold"
                    onclick="handleButtonServicioClick(this,'Taller de Charlas y Foros')" id='btnServicio6'>
                    <i class="bi bi-grid servicio-icon"></i> Talleres, Seminarios y/o Foros
                </button>
            </div>
            <div class="col-md-6 mb-3">
                <button type="button"
                    class="btn btn-servicio btn-outline-primary btn-lg btn-servicio rounded-pill w-100 fw-bold"
                    onclick="handleButtonServicioClick(this,'Taller de Cuerdas Bajas')" id='btnServicio7'>
                    <i class="bi bi-grid servicio-icon"></i> Taller de Cuerdas Bajas
                </button>
            </div>

            <span class="" id="servicioError"></span>
        </div>
    </div>
</div>
