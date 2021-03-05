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
}
