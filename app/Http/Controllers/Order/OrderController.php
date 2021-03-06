<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Company\Company;
use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\Storage\StorageProduct;
use App\Models\User;
use App\Services\Miscellaneous;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate as Gate;

class OrderController extends Controller
{
    
    public function datatableIndex(Request $request){

        if(Gate::allows('able_to_order')){
            $orders = Order::with('order_items')->where('user_id',auth()->user()->id);
        }
        if(Gate::allows('able_to_manage_orders')){
            $company_id = auth()->user()->company_id;
            $orders = Order::with('order_items')->where('company_id', $company_id);
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
                        return '?? ??????????????????';
                    case 'uk':
                        return '?? ??????????????';
                    case 'en':
                        return 'Awaits';
                }
            }
            else if($order->status == 'payed'){
                switch ($language) {
                    case 'ru':
                        return '????????????????';
                    case 'uk':
                        return '????????????????';
                    case 'en':
                        return 'Payed';
                }
            }
            else{
                switch ($language) {
                    case 'ru':
                        return '????????????????????????';
                    case 'uk':
                        return '????????????????????';
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
                    'product_id' => $item->storage_product->id,
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
        if (Gate::allows('able_to_order') || Gate::allows('admin')) {

            $fields = $request->all();
            unset($fields['_token']);

            $data = [];
            foreach($fields as $company_product_data => $amount){
                $order_data = explode("_product_", $company_product_data);
                $product = $order_data[1];
                $company = explode("company_", $order_data[0])[1];
                $data[] = ['storage_product_id' => $product, 'company_id' => $company, 'amount' => $amount];
            }
            info(count($data));

            $order_by_companies = [];
            foreach($data as $product_data){
              $order_by_companies[$product_data['company_id']][] = Arr::except($product_data, ['company_id']);
            }
      
            $created_orders = [];
            foreach($order_by_companies as $company_id => $product_order){
              $order = Order::create([
                'shipping_id' => 1,
                'user_id' => auth()->user()->id,
                'company_id' => $company_id,
                'public_number' => Miscellaneous::getOrderCode($company_id),
                'to_pay' => '0.00',
                'status' => 'formed',
                'created_at' => now(),
                'updated_at' => now()
              ]);
             
              foreach($product_order as $order_item){
                $storage_product = StorageProduct::find($order_item['storage_product_id']);
                $order_items = OrderItem::create([
                  'order_id' => $order->id,
                  'storage_product_id' => $order_item['storage_product_id'],
                  'to_pay' => $storage_product->price,
                  'quantity' => $order_item['amount'],
                  'created_at' => now(),
                  'updated_at' => now()
                ]);
              }
      
              $created_orders[] = [
                'order_id' => $order->id,
                'public_number' => $order->public_number,
                'company_id' => $company_id,
                'company_name' => Company::find($company_id)->name
              ];
            }
            $response = '';
            foreach($created_orders as $created_order){
                $response .= '<p><a href="'.route('order.show', ['id' => $created_order['order_id']]).'">'
                .$created_order['public_number'].
                ' ('
                .$created_order['company_name'].')</a></p>';
            }
            info(count($created_orders));
            //$response = '<a href="#">Reponse</a>';
            return response($response, 200)->header('Content-Type', 'text/plain');
        }
        else{
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
                    'product_id' => $item->storage_product->product->id,
                    'name' => $item->storage_product->product->names->firstWhere('language',$language)->name
                    ];
            });
            $order->order_items_info = $order_items_info;

            $shipping_info = json_decode($order->shipping->info, true);
            $shipping_name = $shipping_info['name'][$language];
            $order->shipping = $shipping_name;

            if($order->status == 'awaits'){
                switch ($language) {
                    case 'ru':
                        $status = '?? ??????????????????';
                        break;
                    case 'uk':
                        $status = '?? ??????????????';
                    break;
                    case 'en':
                        $status = 'Awaits';
                }
            }
            else if($order->status == 'payed'){
                switch ($language) {
                    case 'ru':
                        $status = '????????????????';
                    break;
                    case 'uk':
                        $status = '????????????????';
                        break;
                    case 'en':
                        $status = 'Payed';
                }
            }
            else{
                switch ($language) {
                    case 'ru':
                        $status = '????????????????????????';
                    break;
                    case 'uk':
                        $status = '????????????????????';
                    break;
                    case 'en':
                        $status = 'Formed';
                }
                $order->to_pay = '-';
                $order->shipping = '-';
            }
            
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
        // $messsage = '???????????????? '.$firmname. ' ???????????? ?????????? ?????????????? '.$request->phone.'.';
        //'???????????????? ?????????????? ???????????????? '.$oldname. ' ???? '.$firm->name
        $order = Order::with('order_items')->find($id);
        $total = 0;
        $storage_product_amounts = [];
        foreach($order->order_items as $order_item){
            $total += $order_item->to_pay;

            $storage_product = StorageProduct::find($order_item->storage_product_id);
            $storage_product->amount = ($storage_product->amount - $order_item->quantity > 0) ? ($storage_product->amount - $order_item->quantity) : 0;
            $storage_product->save();
        }

        $order->update([
            'status' => 'awaits',
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
