<div class="modal fade" id="reservaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar horario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('psicologo.addHorario') }}" method="POST">
          @csrf
          
          <input type="hidden" id="user_id" name="user_id" value="{{ auth()->id() }}">

          <div class="form-group">
            <label>Horario de atención mañana</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Desde</span>
              </div>
              <input type="time" class="form-control" id="horaInicio" name="horaInicio">
              <div class="input-group-append">
                <span class="input-group-text">Hasta</span>
              </div>
              <input type="time" class="form-control" id="horaFin" name="horaFin">
            </div>
          </div>

          <div class="form-group">
            <label>Horario de atención tarde</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Desde</span>
              </div>
              <input type="time" class="form-control" id="horaInicioT" name="horaInicioT">
              <div class="input-group-append">
                <span class="input-group-text">Hasta</span>
              </div>
              <input type="time" class="form-control" id="horaFinT" name="horaFinT">
            </div>
          </div>

          <div class="form-group">
            <label>Días</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="lunes" name="dias[]" value="lunes">
              <label class="form-check-label" for="lunes">Lunes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="martes" name="dias[]" value="martes">
              <label class="form-check-label" for="martes">Martes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="miercoles" name="dias[]" value="miercoles">
              <label class="form-check-label" for="miercoles">Miércoles</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="jueves" name="dias[]" value="jueves">
              <label class="form-check-label" for="jueves">Jueves</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="viernes" name="dias[]" value="viernes">
              <label class="form-check-label" for="viernes">Viernes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="sabado" name="dias[]" value="sabado">
              <label class="form-check-label" for="sabado">Sábado</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="domingo" name="dias[]" value="domingo">
              <label class="form-check-label" for="domingo">Domingo</label>
            </div>
          </div>

          <div class="flex flex-row justify-center">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button> -->
      </div>
    </div>
  </div>
</div>