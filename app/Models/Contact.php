<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models
 */
class Contact extends Model
{
	protected $table = 'contacts';

	protected $casts = [
		'user_id' => 'int'
	];

	

	protected $fillable = [
		'name',
		'phone',
		'created_at',
		'updated_at',
		'user_id',
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

}
