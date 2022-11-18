<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * 
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ModelHasPermission[] $model_has_permissions
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class Permission extends Model
{
	protected $table = 'permissions';

	protected $fillable = [
		'name',
		'guard_name'
	];

	public function model_has_permissions()
	{
		return $this->hasMany(ModelHasPermission::class);
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'role_has_permissions');
	}
}
