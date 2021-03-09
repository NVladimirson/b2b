<?php

namespace App\Http\Controllers;


use App\Models\Category\Category;
use App\Models\Company\Company;
use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use App\Models\Storage\Storage;
use App\Models\Storage\StorageProduct;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\Miscellaneous;
use Illuminate\Support\Arr;

class DashboardController extends Controller
{
  public function index()
  {
    $order = Order::with('order_items')->find(9);
    $total = 0;
    $storage_product_amounts = [];
    foreach($order->order_items as $order_item){
        $total += $order_item->to_pay;
        $storage_product_amounts[] = [
            'id' => $order_item->storage_product_id,
            'amount_to_order' => $order_item->quantity
        ];
    }
    dd($storage_product_amounts);

    SEOTools::setTitle(trans('dashboard.page_name'));

    return view('home');
    }

    public function dtlocalization(){
      return (json_encode(__('miscellaneous.datatable.localization_link')));
    }


}
