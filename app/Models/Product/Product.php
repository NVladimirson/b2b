<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function names(){
      return $this->hasOne('App\Models\Product\ProductName','product_id');
    }

    public function category(){
      return $this->hasMany('App\Models\Category\Category','category_id');
    }

    public function category_name(){
      return $this->hasMany('App\Models\Category\CategoryName','category_id','category_id');
    }

    // public function storages(){
    //   return $this->hasManyThrough('App\Models\Category\CategoryName','category_id','category_id');
    // }
}
