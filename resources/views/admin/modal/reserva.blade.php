<!-- Modal -->
<div class="modal fade" id="reservaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
        <div class="form-group">
          <label for="fechaInicio">Fecha Inicio</label>
          <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
        </div>
        <div class="form-group">
          <label for="horaInicio">Hora Inicio</label>
          <input type="time" class="form-control" id="horaInicio" name="horaInicio">
        </div>
        <div class="form-group">
          <label for="fechaFin">Fecha Fin</label>
          <input type="date" class="form-control" id="fechaFin" name="fechaFin">
        </div>
        <div class="form-group">
          <label for="horaFin">Hora Fin</label>
          <input type="time" class="form-control" id="horaFin" name="horaFin">
        </div>
        <div class="form-group">
          <label>Días</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="lunes" value="lunes">
            <label class="form-check-label" for="lunes">Lunes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="martes" value="martes">
            <label class="form-check-label" for="martes">Martes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="miercoles" value="miercoles">
            <label class="form-check-label" for="miercoles">Miércoles</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="jueves" value="jueves">
            <label class="form-check-label" for="jueves">Jueves</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="viernes" value="viernes">
            <label class="form-check-label" for="viernes">Viernes</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="sabado" value="sabado">
            <label class="form-check-label" for="sabado">Sábado</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="domingo" value="domingo">
            <label class="form-check-label" for="domingo">Domingo</label>
          </div>
        </div>
        <!-- <button type="submit" class="btn btn-primary">Enviar</button> -->
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>