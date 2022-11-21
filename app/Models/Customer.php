<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property int $customer_id
 * @property int $store_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property int $address_id
 * @property bool $active
 * @property Carbon $create_date
 * @property Carbon $last_update
 * 
 * @property Address $address
 * @property Store $store
 * @property Collection|Payment[] $payments
 * @property Collection|Rental[] $rentals
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customer';
	protected $primaryKey = 'customer_id';
	public $timestamps = false;

	protected $casts = [
		'store_id' => 'int',
		'address_id' => 'int',
		'active' => 'bool'
	];

	protected $dates = [
		'create_date',
		'last_update'
	];

	protected $fillable = [
		'store_id',
		'first_name',
		'last_name',
		'email',
		'address_id',
		'active',
		'create_date',
		'last_update'
	];

	public function address()
	{
		return $this->belongsTo(Address::class);
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function payments()
	{
		return $this->hasMany(Payment::class);
	}

	public function rentals()
	{
		return $this->hasMany(Rental::class);
	}
}
