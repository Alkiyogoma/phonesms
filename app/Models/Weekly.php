<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Weekly
 * 
 * @property int $id
 * @property string $name
 * @property string $about
 * @property int|null $status
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Event[] $events
 *
 * @package App\Models
 */
class Weekly extends Model
{
	protected $table = 'weekly';
	public $incrementing = false;

	protected $casts = [
    	'id' => 'int',
	];

	protected $fillable = ['id', 'name',  'service_time',  'about',  'created_at',  'updated_at'];


}
