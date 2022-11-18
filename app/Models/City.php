<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property int $city_id
 * @property string $city
 * @property int $country_id
 * @property Carbon $last_update
 * 
 * @property Country $country
 * @property Collection|Address[] $addresses
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'city';
	protected $primaryKey = 'city_id';
	public $timestamps = false;

	protected $casts = [
		'country_id' => 'int'
	];

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'city',
		'country_id',
		'last_update'
	];

	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	public function addresses()
	{
		return $this->hasMany(Address::class);
	}
}
