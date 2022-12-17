<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * 
 * @property Collection|EventAttendee[] $event_attendees
 * @property Collection|Group[] $groups
 *
 * @package App\Models
 */

class ContributionCategory extends Model
{
	protected $table = 'contribution_category';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
	];

	protected $fillable = [
		'name',
		'user_id'

	];

	public function categories()
	{
		return $this->hasMany(Contribution::class, 'id', 'category_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}
