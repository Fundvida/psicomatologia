<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 * 
 * @property int $id
 * @property int $psicologo_id
 * @property Carbon|null $fecha_hora_inicio
 * @property Carbon|null $fecha_hora_fin
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property bool $isDisponible
 *
 * @package App\Models
 */
class Horario extends Model
{
	protected $table = 'horarios';

	// protected $casts = [
	// 	'psicologo_id' => 'int',
	// 	'fecha_hora_inicio' => 'datetime',
	// 	'fecha_hora_fin' => 'datetime',
	// 	'isDisponible' => 'bool'
	// ];

	// protected $fillable = [
	// 	'psicologo_id',
	// 	'fecha_hora_inicio',
	// 	'fecha_hora_fin',
	// 	'isDisponible'
	// ];

	protected $fillable = [
        'psicologo_id',
        'hora_inicio_maniana',
        'hora_fin_maniana',
        'hora_inicio_tarde',
        'hora_fin_tarde',
        'dia',
        'isDisponible',
    ];

	public function psicologo()
    {
        return $this->belongsTo(Psicologo::class);
    }
}
