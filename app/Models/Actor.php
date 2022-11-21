<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Actor
 * 
 * @property int $actor_id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $last_update
 * 
 * @property Collection|Film[] $films
 *
 * @package App\Models
 */
class Actor extends Model
{
	protected $table = 'actor';
	protected $primaryKey = 'actor_id';
	public $timestamps = false;

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'last_update'
	];

	public function films()
	{
		return $this->belongsToMany(Film::class, 'film_actor')
					->withPivot('last_update');
	}
}
