<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Updates
 * 
 * @package App\Models
 */
class Updates extends Model
{
	protected $table = 'updates';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int'
	];

  
	protected $fillable = [
        'name',
        'phone',
		'content',
		'user_id',
		'church_id',
		'user_id',
        'created_at'
    ];
    
	public function church()
	{
		return $this->belongsTo(Church::class, 'church_id', 'id');
	}
    public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
}
