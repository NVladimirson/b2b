<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;


use App\Jobs\ProductOptionFiltersJob;
use App\Models\Content;
use App\Models\Order\Implementation;
use App\Models\Order\ImplementationProduct;
use App\Models\Order\Order;
use App\Models\User;
use Excel;
use App\Models\Company\Company;
use App\Models\Company\CompanyPrice;
use App\Models\Order\OrderProduct;
use App\Models\Product\Product;
use App\Models\Reclamation\ReclamationProduct;
use App\Services\Miscellenous\GlobalSearchService;
use App\Services\Product\CategoryServices;
use App\Services\Product\Product as ProductServices;
use Illuminate\Support\Facades\Cache;
use App\Services\Order\OrderServices;
use App\Services\Product\CatalogServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use LaravelLocalization;
use PhpParser\Node\Expr\Array_;
use App\Models\Product\ProductOption;
use App\Models\Wishlist\LikeGroup;
use App\Services\Miscellenous\ExtendedSearchService;
use App\Models\Product\ProductFilter;
use Illuminate\Support\Arr;
use App\Events\NewMessage;
use DataTables;


class ProductController extends Controller
{


    public function index(){
        // SEOTools::setTitle(trans('product.all_tab_name'));
        // $wishlists = CatalogServices::getByCompany();
        // $orders = OrderServices::getByCompany();
        // $terms = CategoryServices::getTermsForSelect();
        // $filters = CategoryServices::getOptionFilters();
        // //dd($filters);
        // $dinmark_url = \Config::get('values.dinmarkurl');
         //dd(Product::with('names','category_name')->limit(100)->first());
         $product = Product::with('names','category_name')->find(666);
         //dd($product->names->first()->name);
        return view('products.index'
        //,compact('wishlists', 'orders', 'terms','filters','dinmark_url')
      );
    }

    public function datatableIndex(Request $request){
      $products = Product::with(['names']);

      return datatables()
      ->eloquent($products)
      ->addColumn('name', function (Product $product) {
        return $product->names->first()->name;
      })
      ->addColumn('article', function (Product $product) {
        return $product->article;
      })
      ->addColumn('description', function (Product $product) {
        return $product->description;
      })
      ->addColumn('category', function (Product $product) {
        return $product->category_name->first()->id;
      })
      ->addColumn('storages', function (Product $product) {
        return $product->article;
      })
      ->toJson();
    }

}
