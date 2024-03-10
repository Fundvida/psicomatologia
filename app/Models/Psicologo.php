<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Psicologo
 * 
 * @property int $id
 * @property int $user_id
 * @property string $estado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon $fecha_funcion_titulo
 * @property string $universidad
 * @property string $ciudad_residencia
 * @property string $departamento_residencia
 * @property string $pais_residencia
 * @property string|null $descripcion_cv
 * @property string $foto
 *
 * @package App\Models
 */
class Psicologo extends Model
{
	protected $table = 'psicologos';

	protected $casts = [
		'user_id' => 'int',
		'fecha_funcion_titulo' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'estado',
		'fecha_funcion_titulo',
		'universidad',
		'ciudad_residencia',
		'departamento_residencia',
		'pais_residencia',
		'descripcion_cv',
		'foto'
	];
}
