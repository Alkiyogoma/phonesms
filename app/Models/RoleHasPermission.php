<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleHasPermission
 * 
 * @property int $permission_id
 * @property int $role_id
 * 
 * @property Permission $permission
 * @property Role $role
 *
 * @package App\Models
 */
class RoleHasPermission extends Model
{
	protected $table = 'role_has_permissions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'permission_id' => 'int',
		'role_id' => 'int'
	];

	public function permission()
	{
		return $this->belongsTo(Permission::class);
	}

	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
