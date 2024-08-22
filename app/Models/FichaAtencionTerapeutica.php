<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaAtencionTerapeutica extends Model
{
    use HasFactory;

    protected $table = 'fichas_de_atencion_terapeutica';

    protected $fillable = [
        'sesion_id',
        'numero_sesion',
        'fecha_sesion',
        'nombre_terapeuta',
        'descripcion_problema',
        'objetivos_terapeuticos',
        'estado_emocional',
        'sintomas_reportados',
        'nivel_estres',
        'observaciones_terapeuta',
        'temas_tratados',
        'tecnicas_utilizadas',
        'intervenciones_especificas',
        'tareas_paciente',
        'fecha_entrega',
        'progreso_objetivos',
        'cambios_notables',
        'retroalimentacion_paciente',
        'objetivos_proxima_sesion',
        'areas_enfoque',
        'preparacion_necesaria',
        'notas_adicionales',
    ];

    public function sesion(){
        return $this->belongsTo(Sesion::class);
    }
}
