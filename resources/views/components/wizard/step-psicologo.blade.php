<div id="step-psychologist" class="content step" role="tabpanel" aria-labelledby="psychologist-step-trigger">

    <h2 class="text-start mb-4 font-alt">Seleccione el Psicólogo</h2>

    <!-- Descripción "Seleccione el servicio por el que está interesado/a." alineada a la izquierda -->
    <p class="text-start lead fw-normal text-muted mb-5 ttNorms">Por favor revisa la lista y
        selecciona al Psicólogo en disponibilidad de su preferencia.</p>

    <div class="table-responsive mb-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Información</th>
                </tr>
            </thead>
            <tbody id='body_psicologos'>
                <tr>
                    <td>Psicólogo 1</td>
                    <td>Sí</td>
                    <td><button class="btn btn-primary btn-paso1 fw-bold btn-select-psicologo">Seleccionar</button>
                    </td>
                </tr>
                <tr>
                    <td>Psicólogo 2</td>
                    <td>No</td>
                    <td><button class="btn btn-primary btn-paso1 fw-bold btn-select-psicologo">Seleccionar</button>
                    </td>
                </tr>
                <tr>
                    <td>Psicólogo 3</td>
                    <td>No</td>
                    <td><button class="btn btn-primary btn-paso1 fw-bold btn-select-psicologo">Seleccionar</button>
                    </td>
                </tr>

            </tbody>
        </table>
        <span class="error-form" id="psicologoSeleccionError"></span>
    </div>
</div>

<!-- HTML: Modal -->
<!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div> -->
<!-- Modal de Información del Psicólogo -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title font-alt" id="staticBackdropLabel">Información del Psicólogo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <div class="mb-3">
                    <label for="nombrePsicologo" class="form-label fw-bold">Nombre:</label>
                    <p id="nombrePsicologo" class="mb-0">Juan Pérez</p>
                </div>
                <div class="mb-3">
                    <label for="especialidadesPsicologo" class="form-label fw-bold">Especialidades:</label>
                    <p id="especialidadesPsicologo" class="mb-0">Terapia para adultos, Terapia adulto mayor</p>
                </div>
                <div class="mb-3">
                    <label for="desc_cv" class="form-label fw-bold">Descripción CV:</label>
                    <p id="desc_cv" class="mb-0">......</p>
                </div>
                
            </div>
        </div>
    </div>
</div>

