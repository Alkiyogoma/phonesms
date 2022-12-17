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
class PostView extends Model
{
	protected $table = 'post_views';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
	];

	protected $fillable = [
		'id',
		'post_id',
		'user_id',
		'created_at',
		'ondate'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function post()
	{
		return $this->belongsTo(Post::class, 'post_id', 'id');
	}
}
