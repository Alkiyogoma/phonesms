<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GroupMember
 * @property Collection|EventAttendee[] $event_attendees
 *
 * @package App\Models
 */
class GroupMember extends Model
{
	protected $table = 'group_members';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
		'status' => 'int',
		'client_id' => 'int'
	];

	protected $dates = [
		'join_date'
	];

	protected $fillable = [
		'group_id',
		'client_id',
		'join_date',
		'status'
	];


	public function client()
	{
		return $this->belongsTo(Clients::class, 'client_id', 'id');
	}

	public function group()
	{
		return $this->belongsTo(Group::class, 'group_id', 'id');
	}


}
