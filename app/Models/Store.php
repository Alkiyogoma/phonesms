<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 * 
 * @property int $store_id
 * @property int $manager_staff_id
 * @property int $address_id
 * @property Carbon $last_update
 * 
 * @property Address $address
 * @property Collection|Staff[] $staff
 * @property Collection|Customer[] $customers
 * @property Collection|Inventory[] $inventories
 *
 * @package App\Models
 */
class Store extends Model
{
	protected $table = 'store';
	protected $primaryKey = 'store_id';
	public $timestamps = false;

	protected $casts = [
		'manager_staff_id' => 'int',
		'address_id' => 'int'
	];

	protected $dates = [
		'last_update'
	];

	protected $fillable = [
		'manager_staff_id',
		'address_id',
		'last_update'
	];

	public function address()
	{
		return $this->belongsTo(Address::class);
	}

	public function staff()
	{
		return $this->hasMany(Staff::class);
	}

	public function customers()
	{
		return $this->hasMany(Customer::class);
	}

	public function inventories()
	{
		return $this->hasMany(Inventory::class);
	}
}
