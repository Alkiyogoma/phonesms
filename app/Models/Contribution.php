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

class Contribution extends Model
{
	protected $table = 'contributions';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
		'category_id' => 'int',
		'user_id' => 'int'
	];


    protected $dates = [
		'start_date',
		'end_date'
    ];
    
	protected $fillable = [
		'id',
		'name',
		'start_date',
		'end_date',
		'low_amount',
		'upper_amount',
		'user_id',
		'status'
	];

	public function collections()
	{
		return $this->hasMany(Collect::class, 'contribution_id', 'id');
	}

	public function members()
	{
		return $this->hasMany(ContributionMember::class, 'contribution_id', 'id');
	}
	
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
}
