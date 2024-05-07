<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'servicio',
        'institucion',
        'convenio',
        'sesion_id',
        'isTerminado',
    ];

    // Relación
    public function sesion()
    {
        return $this->belongsTo(Sesion::class);
    }
}
