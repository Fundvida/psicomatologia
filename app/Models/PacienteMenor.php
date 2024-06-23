<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteMenor extends Model
{
    use HasFactory;

    protected $table = 'pacienteMenor';

    protected $fillable = [
        'name',
        'apellidos',
        'fecha_nacimiento',
        'ci',
        'estado',
        'motivo'
    ];

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'usermenor_id');
    }
}
