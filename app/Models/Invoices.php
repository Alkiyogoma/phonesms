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

class Invoices extends Model
{
	protected $table = 'invoices';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
		'user_id' => 'int',
		'admin_id' => 'int',
		'contribution_id' => 'int'
	];


    protected $dates = [
		'date'
    ];
    
	protected $fillable = [
		'id',
		'user_id',
		'amount',
		'method',
		'about',
		'date',
		'admin_id',
		'reference',
		'unit_price',
		'quantity',
		'status'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
	
	public function admin()
	{
		return $this->belongsTo(User::class, 'admin_id', 'id');
	}

}


/*

This code is Owned and Managed by Albogast D. Kiyogoma
Phone: +255 744 158 016
Email: albogasty@gmail.com
Email: albogast@albolink.com
Address: P.O Box 75887 Dar es Salaam

*/