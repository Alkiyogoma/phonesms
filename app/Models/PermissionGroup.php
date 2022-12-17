<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionGroup
 * 

 * @property Collection|ModelHasPermission[] $model_has_permissions
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class PermissionGroup extends Model
{
	protected $table = 'permission_group';

	protected $fillable = [
		'name',
	];

	public function permissions()
	{
		return $this->hasMany(Permission::class, 'group_id', 'id');
	}

}
