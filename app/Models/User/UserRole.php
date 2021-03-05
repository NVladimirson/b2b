<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    public function getRolePermission(){
        return $this->hasOne('App\Models\User\RolePermission','role_id','role_id');
    }

    public function getRole(){
        return $this->hasOne('App\Models\User\Role','id','user_id');
    }
}
