<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\User;
use App\Services\Miscellaneous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as Gate;

class OrderController extends Controller
{
    
    public function datatableIndex(Request $request){

        if(Gate::allows('able_to_order')){
            $orders = Order::with('order_items')->where('user_id',auth()->user()->id);
        }
        if(Gate::allows('able_to_manage_orders')){
            $company_id = auth()->user()->company_id;
            $orders = Order::with('order_items')->whereHas('order_items', function($orderItems) use ($company_id){
                $orderItems->whereHas('storage_product', function($storageProduct) use ($company_id){
                  $storageProduct->whereHas('storage', function($storage) use ($company_id){
                    $storage->whereHas('storage_company', function($storage_company) use ($company_id){
                      $storage_company->whereHas('company', function($company) use ($company_id){
                        $company->where('id', $company_id);
                      });
                    });
                  });
                });
              });
        }
        // if(Gate::denies('able_to_manage_content_storages')){
            
        // }
            // Gate::denies('able_to_manage_orders') && 
            // Gate::denies('able_to_manage_content_storages') && 
            // Gate::denies('admin')
        $language = Miscellaneous::getLang();

        $datatable_data = datatables()
        ->eloquent($orders)
        ->addColumn('shipping', function (Order $order)  use ($language){
            $shipping_info = json_decode($order->shipping->info, true);
            $shipping_name = $shipping_info['name'][$language];
            return $shipping_name;
        })
        ->addColumn('public_no', function (Order $order)  use ($language){
            if(Gate::allows('able_to_manage_orders')){
                $url = route('order.process', ['id' => $order->id]);
                return '<a href="'.$url.'">'.$order->public_number.'<a>';
            }
            if(Gate::allows('able_to_order')){
                $url = route('order.show', ['id' => $order->id]);
                return '<a href="'.$url.'">'.$order->public_number.'<a>';
            }
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
            $order_items_info = [];

            $order_items_info = $order->order_items->map(function($item,$key) use ($language){
                return [
                    'quantity' => $item->quantity,
                    'product_id' => $item->storage_product->product->id,
                    'name' => $item->storage_product->product->names->firstWhere('language',$language)->name
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
        });
        if(Gate::allows('able_to_manage_orders')){
            $datatable_data = $datatable_data->addColumn('customer', function (Order $order)  use ($language){
                // $url = route('order.show', ['id' => $order->id]);
                // return '<a href="'.$url.'">'.$order->public_number.'<a>';
                return User::find($order->user_id)->name;
            });
        }
        $datatable_data = $datatable_data->rawColumns(['products','public_no'])->toJson();
        return $datatable_data;
    }

    public function index(Request $request){

        if(
        Gate::denies('able_to_order') && 
        Gate::denies('able_to_manage_orders') && 
        Gate::denies('admin')
        )
        {
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
            return view ('orders.create');
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
        if (Gate::denies('able_to_manage_orders')) {
            abort(403);
        }
        else{
            $order = Order::with('order_items.storage_product.product')->find($id);
            return view ('orders.edit', compact('order'));
        }
    }

    public function update(Request $request, $id){
        // $request->validate([
        //     'phone' => 'required:regex:/^\+?[0-9]{3}-?[0-9]{6,12}$/',
        //     'firm_id' => 'required'
        // ]);
        // $phone = PhoneModel::find($id);
        // $oldphone = $phone->phone;
        // $firmname = FirmModel::find($request->firm_id)->name;
        // $phone->update([
        //     'phone' => $request->phone,
        //     'firm_id' => $request->firm_id,
        //     'updated_at' => now()
        //     ]);
        // $messsage = 'Компания '.$firmname. ' теперь имеет контакт '.$request->phone.'.';
        //'Компания сменила название '.$oldname. ' на '.$firm->name
        $order = Order::with('order_items')->find($id);
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
        $order->update([
            'status' => 'formed',
            'to_pay' => $total,
            'updated_at' => now()
        ]);

        
        return redirect()->route('orders.all');
    }

    public function destroy($id){
        if (Gate::denies('admin')) {
            abort(403);
        }
    }

}
