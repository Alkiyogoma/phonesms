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
class SenderName extends Model
{
	protected $table = 'sender_name';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int'
	];

  
	protected $fillable = [
        'name',
        'short',
		'about',
		'status',
		'user_id',
		'date',
		'document',
        'created_at'
    ];
    

    public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
}
