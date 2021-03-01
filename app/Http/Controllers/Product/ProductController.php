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
use App\Services\Miscellaneous;


class ProductController extends Controller
{


    public function index(){
         $language = Miscellaneous::getLang();
         $categories_widget = true;

         $language = Miscellaneous::getLang();
         $categories = \App\Models\Category\Category::all()->keyBy('id')
         ->map(function ($item, $key){
           $item = $item->only(['parent', 'names']);
           $item = [
             'parent' => $item['parent'],
             'names' => $item['names']->pluck('name','language')->toArray()
           ];
           return $item;
         });

         $category_data = '';
         foreach ($categories as $id => $category) {
           $row = '{ "id" : "'.$id.'", "parent" : ';
           $category['parent'] == $id ? $row .= '"#", ' : $row .= '"'.$category['parent'].'", ';
           $row .= '"text" : "' . $category['names'][$language] . '" }, ';
           $category_data .= $row;
         };

         $options = \App\Models\Option\Option::with('names')->get()->keyBy('id')
         ->map(function ($item, $key){
           $item = $item->only(['names']);
           //dd($item);
           $item = [
            //  'parent' => $item['parent'],
             'names' => $item['names']->pluck('name','language')->toArray()
           ];
           return $item;
         });



         $option_data = '';
        foreach($options as $id=>$option){
          $row = '{ "id" : "'.$id.'", "parent" : "#", "text" : "'.$option['names'][$language].'"}, ';
          $option_data .= $row;
        }


      //     $product = Product::find(2);
      //     $storages = $product->storages->pluck('names','id')->map(function ($item, $key) use ($language){
      //       foreach($item as $data){
      //         if($data->language == $language){
      //           return $data;
      //         }
      //       }
      //      return '';
      //  });
      //  dd($storages);

        return view('products.index'
        ,compact('categories_widget','language','category_data','option_data')
      );
    }

    public function datatableIndex(Request $request){
      $products = Product::with(['names']);
      $language = Miscellaneous::getLang();
      return datatables()
      ->eloquent($products)
      ->addColumn('name', function (Product $product)  use ($language){
        $product_info = $product->names->firstWhere('language', $language);
        $url = route('product.show', ['id' => $product_info->id]);
        return '<a href="'.$url.'">'.$product_info->name.'</a>';
      })
      ->addColumn('article', function (Product $product) {
        return $product->article;
      })
      ->addColumn('description', function (Product $product) {
        return $product->description;
      })
      ->addColumn('category', function (Product $product) use ($language){
        $category = $product->category_name->firstWhere('language', $language);

        return '<a href="'.$category->id.'">'.$category->name.'</a>';
        // foreach($product->category_name as $category){
        //   '<p>'.'<a href="#">'.$category->name.'</a>'.'</p>';
        // }
      })
      ->addColumn('storages', function (Product $product) use ($language){
        $storages = $product->storages->pluck('names','id')->map(function ($item, $key) use ($language){
           foreach($item as $data){
             if($data->language == $language){
               return $data;
             }
           }
          return '';
      });
      $html = '';
      foreach($storages as $storage){
        $html .= '<p>'.'<a href="'.$storage->id.'">'.$storage->name.'</a>'.'</p>';
      } 
      return $html;
      })
      ->rawColumns(['name','category','storages'])
      ->toJson();
    }

    public function show(Request $request, $id){
      $language = Miscellaneous::getLang();
      $product = Product::with(['names','storage_products','storages'])->find($id);
      $product->name = $product->names->firstWhere('language', $language);

      $storage_name_infos = $product->storages->pluck('names','id')->map(function($item,$key) use ($language){
        return $item->firstWhere('language', $language)->name;
      });
      $storage_products = $product->storage_products;
      //dd($storage_names, $storage_products);
      //dd($product->toArray());
      return view('products.show',compact('product','storage_products','storage_name_infos'));
    }

}
