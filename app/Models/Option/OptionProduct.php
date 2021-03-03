<?php

namespace App\Models\Option;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionProduct extends Model
{
    use HasFactory;

    protected $table = 'product_options';

    public function option_values(){
        return $this->hasMany('App\Models\Option\OptionValue','option_id');
    }

    public function products(){
        return $this->hasMany('App\Models\Product\Product','product_id');
    }

    public function option(){
        return $this->hasOne('App\Models\Option\Option','id','option_value');
    }
}


