<?php

namespace App\Models;

use App\Models\Company\Company;
use App\Services\Miscellaneous;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getInfo(){
      return $this->hasOne('App\Models\User\UserInfo','id','user_id');
    }

    public function getPermission(){
      return $this->hasOne('App\Models\User\UserPermission','id','user_id');
    }

    public function getRole(){
      return $this->hasOne('App\Models\User\UserRole','user_id');
    }

    public function getCompanyNameAttribute($value)
    {
        $language = Miscellaneous::getLang();
        return Company::find($this->company_id)->name;
    }
}
