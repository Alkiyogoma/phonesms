<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Film
 * 
 * @property int $film_id
 * @property string $title
 * @property string|null $description
 * @property Carbon|null $release_year
 * @property int $language_id
 * @property int|null $original_language_id
 * @property int $rental_duration
 * @property float $rental_rate
 * @property int|null $length
 * @property float $replacement_cost
 * @property string|null $rating
 * @property string|null $special_features
 * @property Carbon $last_update
 * 
 * @property Language|null $language
 * @property Collection|Actor[] $actors
 * @property Collection|Category[] $categories
 * @property Collection|Inventory[] $inventories
 *
 * @package App\Models
 */
class Film extends Model
{
	protected $table = 'film';
	protected $primaryKey = 'film_id';
	public $timestamps = false;

	protected $casts = [
		'language_id' => 'int',
		'original_language_id' => 'int',
		'rental_duration' => 'int',
		'rental_rate' => 'float',
		'length' => 'int',
		'replacement_cost' => 'float'
	];

	protected $dates = [
		'release_year',
		'last_update'
	];

	protected $fillable = [
		'title',
		'description',
		'release_year',
		'language_id',
		'original_language_id',
		'rental_duration',
		'rental_rate',
		'length',
		'replacement_cost',
		'rating',
		'special_features',
		'last_update'
	];

	public function language()
	{
		return $this->belongsTo(Language::class, 'original_language_id');
	}

	public function actors()
	{
		return $this->belongsToMany(Actor::class, 'film_actor')
					->withPivot('last_update');
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class, 'film_category')
					->withPivot('last_update');
	}

	public function inventories()
	{
		return $this->hasMany(Inventory::class);
	}
}
