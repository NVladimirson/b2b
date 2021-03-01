<?php

namespace App\Models\Storage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    public function names(){
        return $this->hasMany('App\Models\Storage\StorageName','storage_id');
      }
}
