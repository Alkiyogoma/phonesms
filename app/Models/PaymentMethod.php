<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 */

class PaymentMethod extends Model
{
	protected $table = 'payment_methods';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int'
    ];
    
	protected $fillable = [
		'id',
		'name',
		'status'
	];

	public function payments()
	{
		return $this->hasMany(Collect::class, 'id', 'method_id');
	}

}
