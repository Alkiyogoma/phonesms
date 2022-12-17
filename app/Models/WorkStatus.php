<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models
 */
class WorkStatus extends Model
{
	protected $table = 'work_status';

	protected $fillable = [
		'name'
	];

	public function work()
	{
		return $this->hasMany(Visitor::class, 'id', 'work_id');
	}

}
