<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'storage_product_id',
        'to_pay',
        'quantity',
        'updated_at',
        'created_at'
    ];

    public function storage_product(){
        return $this->belongsTo('App\Models\Storage\StorageProduct','storage_product_id');
    }

}
