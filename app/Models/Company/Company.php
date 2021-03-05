<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    public function company_storages(){
        return $this->hasMany('App\Models\Company\CompanyStorage','company_id');
    }

    public function users(){
        return $this->hasMany('App\Models\User','company_id');
    }

}
