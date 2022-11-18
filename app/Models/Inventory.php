<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inventory
 * 
 * @property int $inventory_id
 * @property int $film_id
 * @property int $store_id
 * @property Carbon $last_update
 * 
 * @property Film $film
 * @property Store $store
 * @property Collection|Rental[] $rentals
 *
 * @package App\Models
 */
class Inventory extends Model
{
	protected $table = 'inventory';
	protected $primaryKey = 'inventory_id';
	public $timestamps = false;

	protected $casts = [
		'film_id' => 'int',
		'store_id' => 'int'
	];

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'film_id',
		'store_id',
		'last_update'
	];

	public function film()
	{
		return $this->belongsTo(Film::class);
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function rentals()
	{
		return $this->hasMany(Rental::class);
	}
}
