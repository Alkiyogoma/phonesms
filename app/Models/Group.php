<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * @package App\Models
 */

class Group extends Model
{
	protected $table = 'groups';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
		'status' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'id',
		'name',
		'about',
		'code',
		'status',
		'created_at',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
	public function members()
	{
		return $this->hasMany(GroupMember::class, 'group_id', 'id');
	}
}
