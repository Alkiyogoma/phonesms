<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerList
 * 
 * @property int $ID
 * @property string|null $name
 * @property string $address
 * @property string|null $zip code
 * @property string $phone
 * @property string $city
 * @property string $country
 * @property string $notes
 * @property int $SID
 *
 * @package App\Models
 */
class CustomerList extends Model
{
	protected $table = 'customer_list';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'SID' => 'int'
	];

	protected $fillable = [
		'ID',
		'name',
		'address',
		'zip code',
		'phone',
		'city',
		'country',
		'notes',
		'SID'
	];
}
