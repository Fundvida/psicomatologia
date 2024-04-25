<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'psicologo_id',
        'hora_inicio_maniana',
        'hora_fin_maniana',
        'hora_inicio_tarde',
        'hora_fin_tarde',
        'dia',
        'isDisponible',
    ];
    // protected $fillable = [
    //     'hora_inicio_maniana',
    //     'hora_fin_maniana',
    //     'hora_inicio_tarde',
    //     'hora_fin_tarde',
    //     'isDisponible',
    // ];

    public function psicologo()
    {
        return $this->belongsTo(Psicologo::class);
    }
}