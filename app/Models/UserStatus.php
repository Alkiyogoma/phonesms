<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * 

 * @package App\Models
 */
class UserStatus extends Model
{
	protected $table = 'user_status';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name',
		'created_at',
		'status',
	];


	public function users()
	{
		return $this->hasMany(PostView::class, 'status', 'id');
	}
}
