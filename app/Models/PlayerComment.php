<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PlayerComment
 * 

 * @package App\Models
 */
class PlayerComment extends Model
{
	protected $table = 'player_comment';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
		'player_id' => 'int',
		'user_id' => 'int'
	];
 
	protected $fillable = [
		'player_id',
		'body',
		'created_at',
		'updated_at',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function player()
	{
		return $this->belongsTo(Player::class, 'player_id', 'id');
	}
}
