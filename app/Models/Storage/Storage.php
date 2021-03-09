<?php

namespace App\Models\Storage;

use App\Services\Miscellaneous;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    public function names(){
        return $this->hasMany('App\Models\Storage\StorageName','storage_id');
    }

    public function storage_company(){
      return $this->hasOne('App\Models\Company\CompanyStorage','storage_id');
    }

    public function storage_products(){
      return $this->hasMany('App\Models\Storage\StorageProduct','storage_id');
    }

    public function getLocalizedNameAttribute($language = '')
    {
      if(!$language){
        $language = Miscellaneous::getLang();
      }
      return $this->names()->firstWhere('language',$language)->name;
    }
}
