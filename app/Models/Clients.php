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
class Clients extends Model
{
	protected $table = 'clients';

	protected $casts = [
		'status' => 'int',
		'user_id' => 'int'
	];

	protected $dates = [
		'jod',
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'phone',
		'status',
		'address',
		'jod',
		'user_id',
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('phone', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            });
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }
	
	public function groups()
	{
		return $this->hasMany(GroupMember::class, 'client_id', 'id');
	}

	public function messages()
	{
		return $this->hasMany(Message::class, 'client_id', 'id');
	}

	public function revenues()
	{
		return $this->hasMany(Collect::class, 'client_id', 'id');
	}


}
