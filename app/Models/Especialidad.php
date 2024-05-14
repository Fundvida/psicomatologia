<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;
    protected $table = 'especialidades';
    protected $primaryKey = 'psico_id';


    public function psicologo()
    {
        return $this->belongsTo(Psicologo::class);
    }
}
