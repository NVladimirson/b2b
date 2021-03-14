<?php

namespace App\Models\Storage;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageProduct extends Model
{
    use HasFactory;

    public function storage(){
      return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }

    public function product(){
      return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function order_items(){
      return $this->hasMany('App\Models\Order\OrderItem','storage_product_id');
    }
    
}
