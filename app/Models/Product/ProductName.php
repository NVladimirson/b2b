<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductName extends Model
{
    use HasFactory;

    protected $table = 'product_names';

    public function products(){
      return $this->hasMany('App\Models\Product\Product','product_id', 'id');
    }
}
