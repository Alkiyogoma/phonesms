<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reason
 * 
 
 * @package App\Models
 */
class Reason extends Model
{
	protected $table = 'reasons';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name',
		'about'
	];

	
	public function attendances()
	{
		return $this->hasMany(Attendance::class, 'id', 'reason_id');
	}
}
