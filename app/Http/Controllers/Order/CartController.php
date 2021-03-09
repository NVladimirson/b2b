<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Services\Miscellaneous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as Gate;

class CartController extends Controller
{
    public function showCart(Request $request){
        $language = Miscellaneous::getLang();
        return view('orders.cart');
    }
}
