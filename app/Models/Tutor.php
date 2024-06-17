<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $table = 'tutors';

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class, 'paciente_tutor', 'tutor_id', 'paciente_id')
                    ->withTimestamps();
    }
}
