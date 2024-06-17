<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function sesiones()
    {
        return $this->hasMany(Sesion::class, 'paciente_id');
    }

    public function tutores()
    {
        return $this->belongsToMany(Tutor::class, 'paciente_tutor', 'paciente_id', 'tutor_id')
                    ->withTimestamps();
    }
}
