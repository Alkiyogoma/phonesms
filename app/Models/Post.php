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
class Post extends Model
{
	protected $table = 'posts';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
		'is_ajax' => 'int'
	];

	protected $fillable = [
		'title',
		'content',
		'attach',
		'status',
		'category_id',
		'created_at',
		'updated_at',
		'views',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
    public function category()
	{
		return $this->belongsTo(Category::class, 'user_id', 'id');
	}

	public function comments()
	{
		return $this->hasMany(PostComment::class, 'post_id', 'id');
	}

	public function views()
	{
		return $this->hasMany(PostView::class, 'post_id', 'id');
	}
}
