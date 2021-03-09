<?php

namespace App\Models\Company;

use App\Models\Storage\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyStorage extends Model
{
    use HasFactory;

    protected $table = 'company_storages';

    public function storage(){
        return $this->belongsTo('App\Models\Storage\Storage','storage_id');
    }

    public function company(){
        return $this->belongsTo('App\Models\Company\Company','company_id');
    }

}
