<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * 
 * @property int $country_id
 * @property string $country
 * @property Carbon $last_update
 * 
 * @property Collection|City[] $cities
 *
 * @package App\Models
 */
class Country extends Model
{
	protected $table = 'country';
	protected $primaryKey = 'country_id';
	public $timestamps = false;

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'country',
		'last_update'
	];

	public function cities()
	{
		return $this->hasMany(City::class);
	}
}
