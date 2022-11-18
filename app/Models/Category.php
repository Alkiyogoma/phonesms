<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $category_id
 * @property string $name
 * @property Carbon $last_update
 * 
 * @property Collection|Film[] $films
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'category';
	protected $primaryKey = 'category_id';
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
		return $this->belongsToMany(Film::class, 'film_category')
					->withPivot('last_update');
	}
}
