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
 * @property int $id
 * @property string $url
 * @property string $user_agent
 * @property string $platform_name
 * @property string $source
 * @property string $user_id
 * @property string $country
 * @property string $city
 * @property string $region
 * @property string $isp
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $platform
 * @property string $action
 * @property int|null $is_ajax
 * @property string|null $content
 * @property string $ip_address
 *
 * @package App\Models
 */
class Log extends Model
{
	protected $table = 'logs';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
		'is_ajax' => 'int'
	];

	protected $fillable = [
		'url',
		'user_agent',
		'platform_name',
		'source',
		'user_id',
		'country',
		'city',
		'region',
		'isp',
		'platform',
		'action',
		'is_ajax',
		'content',
		'ip_address'
	];
	
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
