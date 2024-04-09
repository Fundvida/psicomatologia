<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $fillable = [
        'email_verified_at',
        'name',
        'apellidos',
        'email',
        'password',
        'role',
        //'current_team_id',
        'canal_comunicacion',
        'contador_bloqueos',
        'bloqueo_permanente',
        'fecha_nacimiento',
        'ocupacion',
        'ci',
        'codigo_pais_telefono',
        'telefono',
        'pregunta_seguridad_a',
        'pregunta_seguridad_b',
        'respuesta_seguridad_a',
        'respuesta_seguridad_b',
      ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     protected $appends = ['profile_photo_url'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($password) {

        $this->attributes['password'] = bcrypt($password);
    }

    // public function hasRole($role)
    // {
    //     return $this->role === $role;
    // }
}
