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
class Gallery extends Model
{
	protected $table = 'gallery';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
		'is_ajax' => 'int'
	];

	protected $fillable = [
		'title',
		'attach',
		'status',
		'date',
		'category_id',
		'created_at',
		'updated_at',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
    public function category()
	{
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}
}
