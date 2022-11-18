<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ActorInfo
 * 
 * @property int $actor_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $film_info
 *
 * @package App\Models
 */
class ActorInfo extends Model
{
	protected $table = 'actor_info';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'actor_id' => 'int'
	];

	protected $fillable = [
		'actor_id',
		'first_name',
		'last_name',
		'film_info'
	];
}
