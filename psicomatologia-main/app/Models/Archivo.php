<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Archivo
 * 
 * @property int $id
 * @property string $archivo
 * @property string $tipo_archivo
 * @property int|null $psicologo_id
 * @property int|null $sesion_id
 * @property int|null $pago_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Archivo extends Model
{
	protected $table = 'archivos';

	protected $casts = [
		'psicologo_id' => 'int',
		'sesion_id' => 'int',
		'pago_id' => 'int'
	];

	protected $fillable = [
		'archivo',
		'tipo_archivo',
		'psicologo_id',
		'sesion_id',
		'pago_id'
	];
}
