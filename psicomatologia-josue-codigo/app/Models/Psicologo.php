<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psicologo extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function especialidades()
    {
        return $this->hasMany(Especialidad::class, 'psico_id');
    }
}
