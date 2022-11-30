<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Phone
 * 
 * @property string $id
 * @property int $phone_id
 * @property int $user_id
 * @property string $fcm_token
 * @property string $phone_number
 * @property int $max_send_attempts
 * @property int $message_expiration_seconds
 * @property int $messages_per_minute
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Phone extends Model
{
	protected $table = 'phones';
	protected $primaryKey = 'phone_id';

	protected $casts = [
		'user_id' => 'int',
		'max_send_attempts' => 'int',
		'message_expiration_seconds' => 'int',
		'messages_per_minute' => 'int'
	];

	protected $hidden = [
		'fcm_token'
	];

	protected $fillable = [
		'id',
		'user_id',
		'fcm_token',
		'phone_number',
		'max_send_attempts',
		'message_expiration_seconds',
		'messages_per_minute'
	];
}
