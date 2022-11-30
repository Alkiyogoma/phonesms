<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * 
 * @property int $id
 * @property int $message_id
 * @property string $contact
 * @property string $content
 * @property Carbon|null $created_at
 * @property string $failure_reason
 * @property string|null $last_attempted_at
 * @property string $order_timestamp
 * @property string $owner
 * @property string|null $received_at
 * @property string|null $request_received_at
 * @property string|null $send_time
 * @property string|null $sent_at
 * @property string|null $status
 * @property string|null $type
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Message extends Model
{
	protected $table = 'message';
	protected $primaryKey = 'message_id';

	protected $casts = [
		'id' => 'int'
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
		'type'
	];
}
