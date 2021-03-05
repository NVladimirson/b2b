<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Services\Miscellaneous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as Gate;

class OrderController extends Controller
{
    
    public function datatableIndex(Request $request){

        $orders = Order::with('order_items')->where('user_id',auth()->user()->id);
        $language = Miscellaneous::getLang();

        return datatables()
        ->eloquent($orders)
        ->addColumn('shipping', function (Order $order)  use ($language){
            $shipping_info = json_decode($order->shipping->info, true);
            $shipping_name = $shipping_info['name'][$language];
            return $shipping_name;
        })
        ->addColumn('public_no', function (Order $order)  use ($language){
            $url = route('order.show', ['id' => $order->id]);
            return '<a href="'.$url.'">'.$order->public_number.'<a>';
        })
        ->addColumn('to_pay', function (Order $order)  use ($language){
            return $order->to_pay;
        })
        ->addColumn('status', function (Order $order)  use ($language){
            if($order->status == 'awaits'){
                switch ($language) {
                    case 'ru':
                        return 'В обработке';
                    case 'uk':
                        return 'В обробці';
                    case 'en':
                        return 'Awaits';
                }
            }
            else if($order->status == 'payed'){
                switch ($language) {
                    case 'ru':
                        return 'Оплачено';
                    case 'uk':
                        return 'Оплачено';
                    case 'en':
                        return 'Payed';
                }
            }
            else{
                switch ($language) {
                    case 'ru':
                        return 'Сформировано';
                    case 'uk':
                        return 'Сформовано';
                    case 'en':
                        return 'Formed';
                }
            }
        })
        ->addColumn('products', function (Order $order)  use ($language){
            $order_items_info = $order->order_items->map(function($item,$key) use ($language){
                return [
                    'quantity' => $item->quantity,
                    'product_id' => $item->product->id,
                    'name' => $item->product->names->firstWhere('language',$language)->name
                    ];
            });
            $html = '<table style="padding-left:50px;width: 100%">';
            foreach($order_items_info as $info){
                $show_product_url = route('product.show', ['id' => $info['product_id']]);
                $html .= '<tr>';
                $html .= '<td><div class="text-center"><a href="'.$show_product_url.'">'.$info['name']. '</a></div></td>';
                $html .= '<td><div class="text-center">'.$info['quantity'].'</div></td>';
                $html .= '</tr>';
            }
            $html .= '</table>';
            return $html;
        })
        ->addColumn('date', function (Order $order)  use ($language){
            return $order->created_at;
        })
        ->rawColumns(['products','public_no'])
        ->toJson();
    }


    
    
    public function index(Request $request){
        if (
        Gate::denies('able_to_order') || 
        Gate::denies('able_to_manage_orders') || 
        Gate::denies('able_to_manage_content_storages') || 
        Gate::denies('admin')
        ) {
            abort(403);
        }
        return view('orders.index');
    }

    public function store(Request $request){
        if (Gate::denies('able_to_order') || Gate::denies('admin')) {
            abort(403);
        }
    }

    public function create(Request $request){

        if (Gate::denies('able_to_order')) {
            abort(403);
        }
        else{
            dd('create order');
        }
    }

    public function show (Request $request, $id){

        $order = Order::find($id);

        $language = Miscellaneous::getLang();
        if(auth()->user()->id != $order->user_id){
            abort(403);
        }
        else{
            $order_items_info = $order->order_items->map(function($item,$key) use ($language){
                return [
                    'quantity' => $item->quantity,
                    'product_id' => $item->product->id,
                    'name' => $item->product->names->firstWhere('language',$language)->name
                    ];
            });
            $order->order_items_info = $order_items_info;

            if($order->status == 'awaits'){
                switch ($language) {
                    case 'ru':
                        $status = 'В обработке';
                        break;
                    case 'uk':
                        $status = 'В обробці';
                    break;
                    case 'en':
                        $status = 'Awaits';
                }
            }
            else if($order->status == 'payed'){
                switch ($language) {
                    case 'ru':
                        $status = 'Оплачено';
                    break;
                    case 'uk':
                        $status = 'Оплачено';
                        break;
                    case 'en':
                        $status = 'Payed';
                }
            }
            else{
                switch ($language) {
                    case 'ru':
                        $status = 'Сформировано';
                    break;
                    case 'uk':
                        $status = 'Сформовано';
                    break;
                    case 'en':
                        $status = 'Formed';
                }
            }
            
            $shipping_info = json_decode($order->shipping->info, true);
            $shipping_name = $shipping_info['name'][$language];
            $order->shipping = $shipping_name;
            $order->status = $status;
            return view('orders.show', compact('order'));
        }

    }

    public function edit(Request $request, $id){
        abort(403);
    }

    public function update(Request $request, $id){
        if (Gate::denies('')) {
            abort(403);
        }
    }

    public function destroy($id){
        if (Gate::denies('able_to_order')) {
            abort(403);
        }
    }

}
