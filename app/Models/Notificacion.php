<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;
    protected $table = 'notificaciones';

    protected $fillable = [
        'descripcion',
        'user_id',
        'sesion_id',
        'leido',
    ];

    protected $casts = [
        'leido' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sesion(){
        return $this->belongsTo(Sesion::class);
    }
}
