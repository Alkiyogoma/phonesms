<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Staff
 * 
 * @property int $staff_id
 * @property string $first_name
 * @property string $last_name
 * @property int $address_id
 * @property string|null $picture
 * @property string|null $email
 * @property int $store_id
 * @property bool $active
 * @property string $username
 * @property string|null $password
 * @property Carbon $last_update
 * 
 * @property Address $address
 * @property Store $store
 * @property Collection|Payment[] $payments
 * @property Collection|Rental[] $rentals
 *
 * @package App\Models
 */
class Staff extends Model
{
	protected $table = 'staff';
	protected $primaryKey = 'staff_id';
	public $timestamps = false;

	protected $casts = [
		'address_id' => 'int',
		'store_id' => 'int',
		'active' => 'bool'
	];

	protected $dates = [
		'last_update'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'address_id',
		'picture',
		'email',
		'store_id',
		'active',
		'username',
		'password',
		'last_update'
	];

	public function address()
	{
		return $this->belongsTo(Address::class);
	}

	public function store()
	{
		return $this->hasOne(Store::class, 'manager_staff_id');
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
