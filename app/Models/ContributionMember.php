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

class ContributionMember extends Model
{
	protected $table = 'contribution_members';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
	];

	protected $fillable = [
		'client_id', 'contribution_id', 'join_date', 'user_id', 'status'
	];

	public function contribution()
	{
		return $this->belongsTo(Contribution::class, 'contribution_id', 'id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id')->withDefault(['name' => "Undefined"]);
	}

	public function client()
	{
		return $this->belongsTo(Clients::class, 'client_id', 'id');
	}
}
