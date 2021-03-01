<?php

namespace App\Models\Product;

use App\Models\Storage\Storage;
use App\Models\Storage\StorageProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function names(){
      return $this->hasMany('App\Models\Product\ProductName','product_id');
    }

    public function category(){
      return $this->hasOne('App\Models\Category\Category','id','category_id');
    }

    public function category_name(){
      return $this->hasMany('App\Models\Category\CategoryName','category_id','category_id');
    }

    public function storage_products(){
      return $this->hasMany('App\Models\Storage\StorageProduct','product_id');
    }

    public function storages(){
      return $this->belongsToMany(Storage::class, 'storage_products');

    }
    // public function storages(){
    //   // return $this->hasManyThrough('App\Models\Storage\Storage','category_id','category_id');
    //   return $this->hasManyThrough(
    //     \App\Models\Storage\Storage::class,
    //     \App\Models\Storage\StorageProduct::class,
    //     'product_id', // Foreign key on the cars table...
    //     'id', // Local key on the mechanics table...
    //     'id' // Local key on the cars table...
    //     );
    // }
}
