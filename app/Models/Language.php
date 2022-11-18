<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Language
 * 
 * @property int $language_id
 * @property string $name
 * @property Carbon $last_update
 * 
 * @property Collection|Film[] $films
 *
 * @package App\Models
 */
class Language extends Model
{
	protected $table = 'language';
	protected $primaryKey = 'language_id';
	public $timestamps = false;

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'name',
		'last_update'
	];

	public function films()
	{
		return $this->hasMany(Film::class, 'original_language_id');
	}
}
