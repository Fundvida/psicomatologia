<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente_tutor extends Model
{
    use HasFactory;
    protected $table = 'paciente_tutor';

    protected $fillable = [
        'paciente_id',
        'tutor_id',
        'timestamps'
    ];
}
