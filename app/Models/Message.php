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
	protected $table = 'message';
	protected $primaryKey = 'message_id';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'id',
		'contact',
		'content',
		'failure_reason',
		'last_attempted_at',
		'order_timestamp',
		'owner',
		'received_at',
		'request_received_at',
		'send_time',
		'sent_at',
		'status',
		'type',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'user_id');
	}
}
