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
class PostComment extends Model
{
	protected $table = 'post_comments';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
		'post_id' => 'int'
	];
 
	protected $fillable = [
		'post_id',
		'content',
		'created_at',
		'updated_at',
		'user_id'
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
