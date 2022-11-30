<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Billing
 * 
 * @property int $id
 * @property int $billing_id
 * @property Carbon|null $created_at
 * @property string|null $start_timestamp
 * @property string|null $end_timestamp
 * @property string $user_id
 * @property int $sent_messages
 * @property int $received_messages
 * @property int $total_cost
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Billing extends Model
{
	protected $table = 'billing';
	protected $primaryKey = 'billing_id';

	protected $casts = [
		'id' => 'int',
		'sent_messages' => 'int',
		'received_messages' => 'int',
		'total_cost' => 'int'
	];

	protected $fillable = [
		'id',
		'start_timestamp',
		'end_timestamp',
		'user_id',
		'sent_messages',
		'received_messages',
		'total_cost'
	];
}
