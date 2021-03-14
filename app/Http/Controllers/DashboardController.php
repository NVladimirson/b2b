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
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
  public function index()
  {
  //   $search = '999';
  //   $products = Product::whereHas('names', function($product) use($search){
  //     $product->where([
  //       ['name', 'like',"%" . $search . "%"]
  //     ]);
  //   })->take(5)->get()
  //   ->map(function ($item) {
  //     return collect(['id' => $item->id, 'name' => $item->localized_name]);
  //   })->toArray();
  //   info('DASHBOARD');
  //   info(Response::json($products));
  // return Response::json($products);

    return view('home');
    }

    public function dtlocalization(){
      return (json_encode(__('miscellaneous.datatable.localization_link')));
    }


}
