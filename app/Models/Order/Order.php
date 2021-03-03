<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function order_items(){
        return $this->hasMany('App\Models\Order\OrderItem','order_id');
    }

    public function shipping(){
        return $this->belongsTo('App\Models\Shipping\ShippingModel','shipping_id');
    }

    public function names(){
        return $this->hasMany('App\Models\Option\OptionName', 'option_id');
    }
}
