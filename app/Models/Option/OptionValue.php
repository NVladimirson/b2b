<?php

namespace App\Models\Option;

use App\Services\Miscellaneous;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    use HasFactory;
    
    public function names(){
        return $this->hasMany('App\Models\Option\OptionValueName', 'option_value_id' ,'option_id');
    }

    public function option(){
        return $this->hasOne('App\Models\Option\Option', 'id', 'option_id');
    }

    public function getLocalizedNameAttribute($value)
    {
        $language = Miscellaneous::getLang();
        return $this->names()->firstWhere('language',$language)->name;
    }
}
