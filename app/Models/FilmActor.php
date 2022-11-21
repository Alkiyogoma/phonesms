<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FilmActor
 * 
 * @property int $actor_id
 * @property int $film_id
 * @property Carbon $last_update
 * 
 * @property Actor $actor
 * @property Film $film
 *
 * @package App\Models
 */
class FilmActor extends Model
{
	protected $table = 'film_actor';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'actor_id' => 'int',
		'film_id' => 'int'
	];

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'last_update'
	];

	public function actor()
	{
		return $this->belongsTo(Actor::class);
	}

	public function film()
	{
		return $this->belongsTo(Film::class);
	}
}
