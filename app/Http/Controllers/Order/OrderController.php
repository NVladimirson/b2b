<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders = Order::first();
        dd($orders);
    }

    public function show (Request $request, $id){
        $order = Order::find($id);
    }
}
