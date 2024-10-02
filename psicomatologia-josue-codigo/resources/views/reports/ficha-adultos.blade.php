<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Atención Terapéutica para Adultos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            width: 100%;
            height: 100%;
        }
        .page {
            width: 8.5in;
            height: 11in;
            margin: auto;
            padding: 1in;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border: 1px solid #ddd;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .field {
            margin-bottom: 15px;
        }
        .field-label {
            font-weight: bold;
        }
        .input-line {
            border-bottom: 1px solid #000;
            width: 100%;
            display: inline-block;
            margin-left: 10px;
            padding-bottom: 5px;
        }
        ul {
            padding-left: 20px;
        }
    </style>
</head>
<body>
    
        <h1>Ficha de Atención Terapéutica para Adultos</h1>

        <div class="section">
            <div class="section-title">1. Información General</div>
            <ul>
                <li><span class="field-label">Nombre del Paciente:</span><span class="input-line">{{ $results->name }} {{ $results->apellidos }}</span></li>
                <li><span class="field-label">Edad:</span><span class="input-line">{{ $results->edad }}</span></li>
                <li><span class="field-label">Género:</span><span class="input-line"></span></li>
                <li><span class="field-label">Fecha de Nacimiento:</span><span class="input-line">{{ $results->fecha_nacimiento }}</span></li>
                <li><span class="field-label">Número de Sesión:</span><span class="input-line">{{ $results->numero_sesion }}</span></li>
                <li><span class="field-label">Fecha de la Sesión:</span><span class="input-line">{{ $results->fecha_sesion }}</span></li>
                <li><span class="field-label">Nombre del Terapeuta:</span><span class="input-line">{{ $results->nombre_psicologo }} {{ $results->apellido_psicologo }}</span></li>
            </ul>
        </div>

        <div class="section">
            <div class="section-title">2. Motivo de la Consulta</div>
            <ul>
                <li><span class="field-label">Descripción del Problema:</span></li>
                <div class="input-line">{{ $saved->descripcion_problema }}</div>
                <li><span class="field-label">Objetivos Terapéuticos:</span></li>
                <div class="input-line">{{ $saved->objetivos_terapeuticos }}</div>
            </ul>
        </div>

        <div class="section">
            <div class="section-title">3. Evaluación del Estado Actual</div>
            <ul>
                <li><span class="field-label">Estado Emocional (Escala de 1 a 10):</span><span class="input-line">{{ $saved->estado_emocional }}</span></li>
                <li><span class="field-label">Síntomas Reportados:</span></li>
                <div class="input-line">{{ $saved->sintomas_reportados }}</div>
                <li><span class="field-label">Nivel de Estrés (Escala de 1 a 10):</span><span class="input-line">{{ $saved->nivel_estres }}</span></li>
                <li><span class="field-label">Observaciones del Terapeuta:</span></li>
                <div class="input-line">{{ $saved->observaciones_terapeuta }}</div>
            </ul>
        </div>

        <div class="section">
            <div class="section-title">4. Contenido de la Sesión</div>
            <ul>
                <li><span class="field-label">Temas Tratados:</span></li>
                <div class="input-line">{{ $saved->temas_tratados }}</div>
                <li><span class="field-label">Técnicas y Estrategias Utilizadas:</span></li>
                <div class="input-line">{{ $saved->tecnicas_utilizadas }}</div>
                <li><span class="field-label">Intervenciones Específicas:</span></li>
                <div class="input-line">{{ $saved->intervenciones_especificas }}</div>
            </ul>
        </div>

        <div class="section">
            <div class="section-title">5. Actividades y Tareas Asignadas</div>
            <ul>
                <li><span class="field-label">Tareas para el Paciente:</span></li>
                <div class="input-line">{{ $saved->tareas_paciente }}</div>
                <li><span class="field-label">Fecha de Entrega:</span><span class="input-line">{{ $saved->fecha_entrega }}</span></li>
            </ul>
        </div>

        <div class="section">
            <div class="section-title">6. Progreso y Evaluación</div>
            <ul>
                <li><span class="field-label">Progreso en Objetivos Terapéuticos:</span></li>
                <div class="input-line">{{ $saved->progreso_objetivos }}</div>
                <li><span class="field-label">Cambios Notables desde la Última Sesión:</span></li>
                <div class="input-line">{{ $saved->cambios_notables }}</div>
                <li><span class="field-label">Retroalimentación del Paciente:</span></li>
                <div class="input-line">{{ $saved->retroalimentacion_paciente }}</div>
            </ul>
        </div>

        <div class="section">
            <div class="section-title">7. Plan para la Próxima Sesión</div>
            <ul>
                <li><span class="field-label">Objetivos para la Próxima Sesión:</span></li>
                <div class="input-line">{{ $saved->objetivos_proxima_sesion }}</div>
                <li><span class="field-label">Áreas de Enfoque:</span></li>
                <div class="input-line">{{ $saved->areas_enfoque }}</div>
                <li><span class="field-label">Preparación Necesaria para el Paciente:</span></li>
                <div class="input-line">{{ $saved->preparacion_necesaria }}</div>
            </ul>
        </div>

        <div class="section">
            <div class="section-title">8. Notas Adicionales</div>
            <ul>
                <li><div class="input-line">{{ $saved->notas_adicionales }}</div></li>
            </ul>
        </div>

        <div class="section">
            <div class="section-title">9. Firma del Terapeuta</div>
            <ul>
                <li><span class="field-label">Nombre:</span><span class="input-line"></span></li>
                <li><span class="field-label">Firma:</span><span class="input-line"></span></li>
            </ul>
        </div>
    
</body>
</html>
