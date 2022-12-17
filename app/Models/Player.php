<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Player
 * 

 * @package App\Models
 */
class Player extends Model
{
	protected $table = 'players';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'title',
		'body',
		'status',
		'start_date',
		'created_at',
		'updated_at',
		'end_date',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
	public function comments()
	{
		return $this->hasMany(PlayerComment::class, 'player_id', 'id');
	}

}
