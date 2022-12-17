<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Website
 
 * @property Collection|Event[] $events
 *
 * @package App\Models
 */
class Website extends Model
{
	protected $table = 'website';
	public $incrementing = true;

	protected $casts = [
		'id' => 'int',
	];

	protected $fillable = [
		'id', 'mission',  'vision',  'about',  'cores',  'pastor',  'pastor_photo',  'details',  'leaders', 'year', 'members', 'motto',  'verse',  'created_at',  'updated_at'
    ];

}
