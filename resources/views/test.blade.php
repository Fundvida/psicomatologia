@if($paciente_tipo === 'mayor')
<div class="tab-pane fade show active" id="adultos" role="tabpanel" aria-labelledby="adultos-tab">
    <form action="{{ route('ficha.adultos.save') }}" id="formAdultos" method="POST">
        @csrf
        <div class="p-4 rounded shadow-lg">
            <input type="hidden" id="sesion_id" name="sesion_id" value="{{ $results->sesion_id }}">
            <h3 class="mb-4 font-alt">Ficha de Atención Psicológica para Adultos</h3>

            <!-- 2. Motivo de la Consulta -->
            <h4 class="mb-4 font-alt text-start">2. Motivo de la Consulta</h4>
            <div class="mb-3 text-start">
                <label for="descripcionProblema" class="form-label">Descripción del Problema:</label>
                <textarea class="form-control" id="descripcionProblema" name="descripcionProblema" rows="3">{{ $saved->descripcion_problema }}</textarea>
            </div>
    </form>
</div>
@else
<div class="tab-pane fade show active" id="ninos" role="tabpanel" aria-labelledby="ninos-tab">
    <form action="/guardar-atencion-ninos" method="POST">
        @csrf
        <div class="p-4 rounded shadow-lg">
            <input type="hidden" id="sesion_id" name="sesion_id" value="{{ $results->sesion_id }}">
            <h3 class="mb-4 font-alt">Ficha de Atención Psicológica para Niños(as)</h3>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endif