<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PacienteTutor
 * 
 * @property int $id
 * @property int $paciente_id
 * @property int $tutor_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PacienteTutor extends Model
{
	protected $table = 'paciente_tutor';

	protected $casts = [
		'paciente_id' => 'int',
		'tutor_id' => 'int'
	];

	protected $fillable = [
		'paciente_id',
		'tutor_id'
	];
}
