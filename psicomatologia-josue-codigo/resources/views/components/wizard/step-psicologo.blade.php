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
                    <th scope="col">Disponibilidad</th>
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
