<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {

    /**
     * Generated
     */
    protected $table = 'regions';
    protected $fillable = ['id', 'name', 'country_id','refer_zone_id', 'created_at', 'updated_at'];
    
     public function users() {
		return $this->hasMany(User::class, 'id', 'region_id');
    }

    // public function zone() {
    //      return $this->belongsTo(\App\Models\ReferZone::class, 'refer_zone_id', 'id');
    //  }

}
