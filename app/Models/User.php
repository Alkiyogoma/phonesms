<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

	protected $table = 'users';

	protected $casts = [
		'status' => 'int',
		'role_id' => 'int',
		'work_id' => 'int'
	];

	protected $dates = [
		'jod',
		'dob',
	];

	protected $guard_name = 'web';

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'phone',
		'sex',
		'status',
		'address',
		'jod',
		'dob',
		'about',
		'username',
		'password',
		'remember_token',
		'avatar',
		'language_id',
		'role_id',
		'region_id'
	];

	public function role()
	{
		return $this->belongsTo(\App\Models\Role::class, 'role_id', 'id');
	}

	public function region()
	{
		return $this->belongsTo(\App\Models\Region::class, 'region_id', 'id');
	}

	public function user_status()
	{
		return $this->belongsTo(UserStatus::class, 'status', 'id');
	}
	public function groups()
	{
		return $this->hasMany(Group::class, 'user_id', 'id');
	}

	public function members()
	{
		return $this->hasMany(Clients::class, 'user_id', 'id');
	}
	
	public function invoices()
	{
		return $this->hasMany(PaymentMethod::class, 'user_id', 'id');
	}
	
	public function messages()
	{
		return $this->hasMany(Message::class, 'user_id', 'id');
	}
		
	public function contacts()
	{
		return $this->hasMany(Contact::class, 'user_id', 'id');
	}

	public function payments()
	{
		return $this->hasMany(Collect::class, 'user_id', 'id');
	}
	
	public function clients()
	{
		return $this->hasMany(Clients::class, 'user_id', 'id');
	}
	
	public function comments()
	{
		return $this->hasMany(GroupMember::class, 'user_id', 'id');
	}

	public function names()
	{
		return $this->hasMany(SenderName::class, 'user_id', 'id');
	}
	
}
