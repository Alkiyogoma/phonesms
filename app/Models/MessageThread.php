<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MessageThread
 * 
 * @property int $id
 * @property int $message_thread_id
 * @property string $contact
 * @property string $last_message_content
 * @property Carbon|null $created_at
 * @property string $last_message_id
 * @property string|null $color
 * @property string $order_timestamp
 * @property string $owner
 * @property string|null $is_archived
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class MessageThread extends Model
{
	protected $table = 'message_thread';
	protected $primaryKey = 'message_thread_id';

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'id',
		'contact',
		'last_message_content',
		'last_message_id',
		'color',
		'order_timestamp',
		'owner',
		'is_archived'
	];
}
