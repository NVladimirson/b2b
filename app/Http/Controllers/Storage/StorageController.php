<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Storage\Storage;
use App\Services\Miscellaneous;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StorageController extends Controller
{
    public function datatableIndex(Request $request){
        if(Gate::allows('able_to_manage_orders') || Gate::allows('able_to_manage_content_storages') || Gate::allows('admin')){
            $company_id = auth()->user()->company_id;
            $storages = Storage::with('storage_products')->whereHas('storage_company', function($storage_company) use ($company_id){
              $storage_company->whereHas('company', function($company) use ($company_id){
                $company->where('id', $company_id);
              });
            });
        }
        else{
            abort(403);
        }
        // if(Gate::denies('able_to_manage_content_storages')){
            
        // }
            // Gate::denies('able_to_manage_orders') && 
            // Gate::denies('able_to_manage_content_storages') && 
            // Gate::denies('admin')
        $language = Miscellaneous::getLang();

        return datatables()
        ->eloquent($storages)
        ->addColumn('storage_id', function (Storage $storage)  use ($language){
            return $storage->id;
        })
        ->addColumn('storage_name', function (Storage $storage)  use ($language){
            return $storage->names->firstWhere('language', $language)->name;
        })
        ->addColumn('company', function (Storage $storage)  {
            return $storage->storage_company->company->name;
        })
        ->addColumn('products', function (Storage $storage)  use ($language){
            $storage_products = [];

            $storage_products = $storage->storage_products->map(function($item,$key) use ($language){
                return [
                    'amount' => $item->amount,
                    'price' => $item->price,
                    'product_id' => $item->product_id,
                    'name' => $item->product->names->firstWhere('language',$language)->name
                    ];
            });
            $html = '<table style="padding-left:50px;width: 100%">';

            foreach($storage_products as $info){
                $show_product_url = route('product.show', ['id' => $info['product_id']]);
                $html .= '<tr>';
                $html .= '<td><div class="text-center"><a href="'.$show_product_url.'">'.$info['name']. '</a></div></td>';
                $html .= '<td><div class="text-center">'.$info['amount'].'</div></td>';
                $html .= '<td><div class="text-center">'.$info['price'].'</div></td>';
                if(Gate::allows('able_to_manage_orders')){
                    $html .= '<td><div class="text-center">Manage Orders</div></td>';
                }
                if(Gate::allows('able_to_manage_content_storages')){
                    $html .= '<td><div class="text-center">Manage Content Stoages</div></td>';
                }
                if(Gate::allows('admin')){
                    $html .= '<td><div class="text-center">Manage Orders</div></td>';
                    $html .= '<td><div class="text-center">Manage Content Stoages</div></td>';
                }
                $html .= '</tr>';
            }
            if(Gate::allows('able_to_manage_content_storages') || Gate::allows('admin')){
                $html .= '<tr><td colspan="4"><div class="text-center">Add New Product</div></td></tr>';
            }
            $html .= '</table>';
            return $html;
        })
        ->rawColumns(['products','public_no'])
        ->toJson();
    }
    
    public function index(Request $request){
        $language = Miscellaneous::getLang();
        $company = auth()->user()->company_id;

        //order_manager
        // $storages = Storage::with(['names','storage_products.product.names'])->whereHas('storage_company', function($company_storages) use($company){
        //     $company_storages->where('company_id',$company);
        // })->get();
 
        // $storages = $storages->map( function ($storage) use ($language){
        //     $storage->name = $storage->names->firstWhere('language', $language)->name;
        //     $storage->storage_products = $storage->storage_products->map( function ($storage_product) use ($language){
        //         return [
        //             'storage_product_id' => $storage_product->id,
        //             'price' => $storage_product->id,
        //             'amount' => $storage_product->amount,
        //             'product_id' => $storage_product->product_id,
        //             'name' => $storage_product->product->names->firstWhere('language', $language)->name,
        //             'article' => $storage_product->product->article,
        //             'description' => $storage_product->product->description
        //         ];
        //     })->toArray();
        //     return 
        //     [
        //         'id' => $storage->id,
        //         'storage_name' => $storage->name, 
        //         'storage_products' => $storage->storage_products
        //     ];
        // });



        return view('storages.index');
    }

    public function store(Request $request){

    }

    public function create(Request $request){

    }

    public function show(Request $request, $id){
        $storage_info = Storage::find($id);
        return view('storages.show');
    }

    public function edit(Request $request, $id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
