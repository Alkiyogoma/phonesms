<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Heartbeat
 * 
 * @property int $id
 * @property int $heartbeat_id
 * @property Carbon|null $created_at
 * @property string|null $timestamp
 * @property string $owner
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Heartbeat extends Model
{
	protected $table = 'heartbeat';
	protected $primaryKey = 'heartbeat_id';

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'id',
		'timestamp',
		'owner'
	];
}
