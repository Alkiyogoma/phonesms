<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rental
 * 
 * @property int $rental_id
 * @property Carbon $rental_date
 * @property int $inventory_id
 * @property int $customer_id
 * @property Carbon|null $return_date
 * @property int $staff_id
 * @property Carbon $last_update
 * 
 * @property Customer $customer
 * @property Inventory $inventory
 * @property Staff $staff
 * @property Collection|Payment[] $payments
 *
 * @package App\Models
 */
class Rental extends Model
{
	protected $table = 'rental';
	protected $primaryKey = 'rental_id';
	public $timestamps = false;

	protected $casts = [
		'inventory_id' => 'int',
		'customer_id' => 'int',
		'staff_id' => 'int'
	];

	protected $dates = [
		'rental_date',
		'return_date',
		'last_update'
	];

	protected $fillable = [
		'rental_date',
		'inventory_id',
		'customer_id',
		'return_date',
		'staff_id',
		'last_update'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function inventory()
	{
		return $this->belongsTo(Inventory::class);
	}

	public function staff()
	{
		return $this->belongsTo(Staff::class);
	}

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}
}
