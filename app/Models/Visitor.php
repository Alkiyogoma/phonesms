<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models
 */
class Visitor extends Model
{
	protected $table = 'visitors';

	protected $casts = [
		'status' => 'int',
		'work_id' => 'int'
	];

	protected $dates = [
		'jod',
		'dob',
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];
	protected $fillable = [
		'name',
		'email',
		'phone',
		'sex',
		'status',
		'address',
		'martial',
		'jod',
		'dob',
		'password',
		'remember_token',
		'avatar',
        'work_id',
        'user_id',
        'about'
	];

	public function work()
	{
		return $this->belongsTo(WorkStatus::class, 'work_id', 'id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

}
