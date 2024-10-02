<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
  protected $table = 'sesions';

  protected $fillable = [
    'estado',
    'pago_confirmado',
    'fecha_hora_inicio',
    'fecha_hora_fin',
    'paciente_id',
    'psicologo_id',
    'descripcion_sesion',
    'calificacion',
    'calificacion_descripcion',
    'contador_cancelaciones',
    'solicitante',
    'cancelador'
  ];

  public function paciente()
  {
    return $this->belongsTo(Paciente::class);
  }

  public function psicologo()
  {
    return $this->belongsTo(Psicologo::class);
  }

  public function pagos()
    {
        return $this->hasMany(Pago::class, 'sesion_id');
    }
}
