<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FilmCategory
 * 
 * @property int $film_id
 * @property int $category_id
 * @property Carbon $last_update
 * 
 * @property Category $category
 * @property Film $film
 *
 * @package App\Models
 */
class FilmCategory extends Model
{
	protected $table = 'film_category';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'film_id' => 'int',
		'category_id' => 'int'
	];

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'last_update'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function film()
	{
		return $this->belongsTo(Film::class);
	}
}
