<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    public function getRole(){
        return $this->hasOne('App\Models\User\Role','id','role_id');
    }
}
