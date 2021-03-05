<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use App\Models\Storage\Storage;
use App\Services\Miscellaneous;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function datatableIndex(Request $request){

    }
    
    public function index(Request $request){
        $language = Miscellaneous::getLang();
        $company = auth()->user()->company_id;

        //order_manager
        // $storages = Storage::with(['names','storage_products.product.names'])->whereHas('storage_companies', function($company_storages) use($company){
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
