<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * 
 * @property int $payment_id
 * @property int $customer_id
 * @property int $staff_id
 * @property int|null $rental_id
 * @property float $amount
 * @property Carbon $payment_date
 * @property Carbon $last_update
 * 
 * @property Customer $customer
 * @property Rental|null $rental
 * @property Staff $staff
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payment';
	protected $primaryKey = 'payment_id';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int',
		'staff_id' => 'int',
		'rental_id' => 'int',
		'amount' => 'float'
	];

	protected $dates = [
		'payment_date',
		'last_update'
	];

	protected $fillable = [
		'customer_id',
		'staff_id',
		'rental_id',
		'amount',
		'payment_date',
		'last_update'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function rental()
	{
		return $this->belongsTo(Rental::class);
	}

	public function staff()
	{
		return $this->belongsTo(Staff::class);
	}
}
