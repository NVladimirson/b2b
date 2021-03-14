<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{
    public function globalSearch(Request $request){
    $search = $request->name;
    $products = Product::whereHas('names', function($product) use($search){
        $product->where([
          ['name', 'like',"%" . $search . "%"]
        ]);
      })->take(5)->get()
      ->map(function ($item) {
          info($item->id);
        return collect(['id' => $item->id, 'name' => $item->localized_name]);
      })->toArray();
    return Response::json($products);
    }
}
