<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * @package App\Models
 */

class Message extends Model
{
	protected $table = 'messages';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int'
	];

    protected $fillable = [
		'title',
		'body',
		'phone',
		'user_id',
		'sender_id',
		'client_id',
		'status',
		'return_code',
		'sms_count',
		'created_at'
	];
	
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

	public function sender()
	{
		return $this->belongsTo(SenderName::class, 'sender_id', 'id');
	}

	public function client()
	{
		return $this->belongsTo(Clients::class, 'client_id', 'id');
	}
}
