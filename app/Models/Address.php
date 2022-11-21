<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * 
 * @property int $address_id
 * @property string $address
 * @property string|null $address2
 * @property string $district
 * @property int $city_id
 * @property string|null $postal_code
 * @property string $phone
 * @property Carbon $last_update
 * 
 * @property City $city
 * @property Collection|Customer[] $customers
 * @property Collection|Staff[] $staff
 * @property Collection|Store[] $stores
 *
 * @package App\Models
 */
class Address extends Model
{
	protected $table = 'address';
	protected $primaryKey = 'address_id';
	public $timestamps = false;

	protected $casts = [
		'city_id' => 'int'
	];

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'address',
		'address2',
		'district',
		'city_id',
		'postal_code',
		'phone',
		'last_update'
	];

	public function city()
	{
		return $this->belongsTo(City::class, 'city_id', 'city_id');
	}

	public function customers()
	{
		return $this->hasMany(Customer::class);
	}

	public function staff()
	{
		return $this->hasMany(Staff::class);
	}

	public function stores()
	{
		return $this->hasMany(Store::class);
	}
}
