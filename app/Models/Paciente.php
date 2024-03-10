<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 * 
 * @property int $id
 * @property int|null $user_id
 * @property int|null $psicologo_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property bool $isAlta
 *
 * @package App\Models
 */
class Paciente extends Model
{
	protected $table = 'pacientes';

	protected $casts = [
		'user_id' => 'int',
		'psicologo_id' => 'int',
		'isAlta' => 'bool'
	];

	protected $fillable = [
		'user_id',
		'psicologo_id',
		'isAlta'
	];
}
