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
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function datatableIndex(Request $request){

      $products = Product::with(['names']);
      $language = Miscellaneous::getLang();
      $search = trim($request->search['value']);
      $selected_categories = $request->selected_categories;
      
      if(strlen($search)){
        $products = $products->whereHas('names', function($product) use($search, $language){
          $product->where([
            ['language',$language],
            ['name', 'like',"%" . $search . "%"]
          ]);
        });
      }

      if(Str::of($selected_categories)->trim()->isNotEmpty()){
        $selected_categories = explode(',',$request->selected_categories);
        $products = $products->whereHas('category', function($category) use($selected_categories){
          $category->whereIn('id', $selected_categories);
        });
      }

      //info($request->all());

      return datatables()
      ->eloquent($products)
      ->addColumn('name', function (Product $product)  use ($language,$search){
        $product_info = $product->names->firstWhere('language', $language);
        $url = route('product.show', ['id' => $product->id]);
        if(Str::of($search)->isEmpty()){
          return '<a href="'.$url.'">'.$product_info->name.'</a>';
        }
        else{
          return '<a href="'.$url.'">'.Miscellaneous::highlightsubstr($product_info->name,$search).'</a>';
        }
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
        $storage_products = $product->storage_products->map(function ($item, $key){
          $item->storage_name = $item->storage->localized_name;
          $item->company = $item->storage->storage_company->company;
          $item->product_name = $item->product->localized_name;
          return $item;
        });
      $html = '<table style="padding-left:50px;width: 100%">';
      $html .= '<tr class="text-center">';
      $html .= '<th>'.'Company'.'</th><th>'.'Storage'.'</th><th>'.'Price'.'</th><th>'.'Amount'.'</th>';
      if(Gate::allows('able_to_order')){
        $html .= '<th>'.'Add to Order'.'</th><th>'.'Add To Wishlist'.'</th>';
      }
      $html .= '</tr>';
      foreach($storage_products as $storage_product){
        $html .= '<tr>';
        $html .= '<td><div class="text-center">'.$storage_product->company->name.'</a>'.'</div></td>';
        $html .= '<td><div class="text-center">'.'<a href="'.$storage_product->storage_id.'">'.$storage_product->storage_name.'</a>'.'</div></td>';
        $html .= '<td><div class="text-center">'.$storage_product->price.'</div></td>';
        $html .= '<td><div class="text-center">'.$storage_product->amount.'</div></td>';
        if(Gate::allows('able_to_order')){
          $html .= '
          <td>
          <div class="text-center">
          <h4 class="small font-weight-bold">'.__('product.show.product_storages.add_to_cart').'</h4>
          <a href="#" data-toggle="modal" data-target="#orderModal" 
          data-company_id="'.$storage_product->company->id.'"
          data-company_name="'.$storage_product->company->name.'"
          data-product_id="'.$storage_product->storage_id.'"
          data-product_name="'.$storage_product->product_name.'"
          >
          <i class="fas fa-cart-arrow-down add_to_order"></i>
          </a>
          </div>
          </td>
          ';
          $html .= '
          <td>
          <div class="text-center">
          <h4 class="small font-weight-bold">'.__('product.show.product_storages.add_to_wishlist').'</h4>
          <a href="#"><i class="far fa-heart"></i></a>
          </div>
          </td>
          ';
        }
        $html .= '</tr>';
      } 
      $html .= '</table>';
      return $html;
      })
      // ->orderColumns(['name'], '-name $1')
      ->rawColumns(['name','category','storages'])
      ->toJson();
    }

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

    public function store(Request $request){

    }

    public function create(Request $request){

    }
    
    public function show(Request $request, $id){
      $language = Miscellaneous::getLang();
      $product = Product::with('options.option_values.names','options.option_values.option.names')->find($id);
      
        $product_options = Arr::collapse($product->options->pluck('option_values')->map(function ($item,$key) use ($language){
          
          return $item->map(function ($item2,$key2) use ($language){
            
            return [
              'value' => $item2->names->firstWhere('language', $language)->name, 
              'option' => $item2->option->names->firstWhere('language', $language)->name
            ];
          });
        }));

      $product->name = $product->names->firstWhere('language', $language);

      $storage_name_infos = $product->storages->pluck('names','id')->map(function($item,$key) use ($language){
        return $item->firstWhere('language', $language)->name;
      });
      $storage_products = $product->storage_products;

      return view('products.show',compact('product','storage_products','storage_name_infos','product_options'));
    }

    public function edit(Request $request, $id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }

    public function test(Request $request){
      
    }

    public function test_ajax(){
      $ajax = '{
        "data": [
          {
            "id": "1",
            "name": "Tiger Nixon",
            "position": "System Architect",
            "salary": "$320,800",
            "start_date": "2011/04/25",
            "office": "Edinburgh",
            "extn": "5421"
          },
          {
            "id": "2",
            "name": "Garrett Winters",
            "position": "Accountant",
            "salary": "$170,750",
            "start_date": "2011/07/25",
            "office": "Tokyo",
            "extn": "8422"
          },
          {
            "id": "3",
            "name": "Ashton Cox",
            "position": "Junior Technical Author",
            "salary": "$86,000",
            "start_date": "2009/01/12",
            "office": "San Francisco",
            "extn": "1562"
          },
          {
            "id": "4",
            "name": "Cedric Kelly",
            "position": "Senior Javascript Developer",
            "salary": "$433,060",
            "start_date": "2012/03/29",
            "office": "Edinburgh",
            "extn": "6224"
          },
          {
            "id": "5",
            "name": "Airi Satou",
            "position": "Accountant",
            "salary": "$162,700",
            "start_date": "2008/11/28",
            "office": "Tokyo",
            "extn": "5407"
          },
          {
            "id": "6",
            "name": "Brielle Williamson",
            "position": "Integration Specialist",
            "salary": "$372,000",
            "start_date": "2012/12/02",
            "office": "New York",
            "extn": "4804"
          },
          {
            "id": "7",
            "name": "Herrod Chandler",
            "position": "Sales Assistant",
            "salary": "$137,500",
            "start_date": "2012/08/06",
            "office": "San Francisco",
            "extn": "9608"
          },
          {
            "id": "8",
            "name": "Rhona Davidson",
            "position": "Integration Specialist",
            "salary": "$327,900",
            "start_date": "2010/10/14",
            "office": "Tokyo",
            "extn": "6200"
          },
          {
            "id": "9",
            "name": "Colleen Hurst",
            "position": "Javascript Developer",
            "salary": "$205,500",
            "start_date": "2009/09/15",
            "office": "San Francisco",
            "extn": "2360"
          },
          {
            "id": "10",
            "name": "Sonya Frost",
            "position": "Software Engineer",
            "salary": "$103,600",
            "start_date": "2008/12/13",
            "office": "Edinburgh",
            "extn": "1667"
          },
          {
            "id": "11",
            "name": "Jena Gaines",
            "position": "Office Manager",
            "salary": "$90,560",
            "start_date": "2008/12/19",
            "office": "London",
            "extn": "3814"
          },
          {
            "id": "12",
            "name": "Quinn Flynn",
            "position": "Support Lead",
            "salary": "$342,000",
            "start_date": "2013/03/03",
            "office": "Edinburgh",
            "extn": "9497"
          },
          {
            "id": "13",
            "name": "Charde Marshall",
            "position": "Regional Director",
            "salary": "$470,600",
            "start_date": "2008/10/16",
            "office": "San Francisco",
            "extn": "6741"
          },
          {
            "id": "14",
            "name": "Haley Kennedy",
            "position": "Senior Marketing Designer",
            "salary": "$313,500",
            "start_date": "2012/12/18",
            "office": "London",
            "extn": "3597"
          },
          {
            "id": "15",
            "name": "Tatyana Fitzpatrick",
            "position": "Regional Director",
            "salary": "$385,750",
            "start_date": "2010/03/17",
            "office": "London",
            "extn": "1965"
          },
          {
            "id": "16",
            "name": "Michael Silva",
            "position": "Marketing Designer",
            "salary": "$198,500",
            "start_date": "2012/11/27",
            "office": "London",
            "extn": "1581"
          },
          {
            "id": "17",
            "name": "Paul Byrd",
            "position": "Chief Financial Officer (CFO)",
            "salary": "$725,000",
            "start_date": "2010/06/09",
            "office": "New York",
            "extn": "3059"
          },
          {
            "id": "18",
            "name": "Gloria Little",
            "position": "Systems Administrator",
            "salary": "$237,500",
            "start_date": "2009/04/10",
            "office": "New York",
            "extn": "1721"
          },
          {
            "id": "19",
            "name": "Bradley Greer",
            "position": "Software Engineer",
            "salary": "$132,000",
            "start_date": "2012/10/13",
            "office": "London",
            "extn": "2558"
          },
          {
            "id": "20",
            "name": "Dai Rios",
            "position": "Personnel Lead",
            "salary": "$217,500",
            "start_date": "2012/09/26",
            "office": "Edinburgh",
            "extn": "2290"
          },
          {
            "id": "21",
            "name": "Jenette Caldwell",
            "position": "Development Lead",
            "salary": "$345,000",
            "start_date": "2011/09/03",
            "office": "New York",
            "extn": "1937"
          },
          {
            "id": "22",
            "name": "Yuri Berry",
            "position": "Chief Marketing Officer (CMO)",
            "salary": "$675,000",
            "start_date": "2009/06/25",
            "office": "New York",
            "extn": "6154"
          },
          {
            "id": "23",
            "name": "Caesar Vance",
            "position": "Pre-Sales Support",
            "salary": "$106,450",
            "start_date": "2011/12/12",
            "office": "New York",
            "extn": "8330"
          },
          {
            "id": "24",
            "name": "Doris Wilder",
            "position": "Sales Assistant",
            "salary": "$85,600",
            "start_date": "2010/09/20",
            "office": "Sydney",
            "extn": "3023"
          },
          {
            "id": "25",
            "name": "Angelica Ramos",
            "position": "Chief Executive Officer (CEO)",
            "salary": "$1,200,000",
            "start_date": "2009/10/09",
            "office": "London",
            "extn": "5797"
          },
          {
            "id": "26",
            "name": "Gavin Joyce",
            "position": "Developer",
            "salary": "$92,575",
            "start_date": "2010/12/22",
            "office": "Edinburgh",
            "extn": "8822"
          },
          {
            "id": "27",
            "name": "Jennifer Chang",
            "position": "Regional Director",
            "salary": "$357,650",
            "start_date": "2010/11/14",
            "office": "Singapore",
            "extn": "9239"
          },
          {
            "id": "28",
            "name": "Brenden Wagner",
            "position": "Software Engineer",
            "salary": "$206,850",
            "start_date": "2011/06/07",
            "office": "San Francisco",
            "extn": "1314"
          },
          {
            "id": "29",
            "name": "Fiona Green",
            "position": "Chief Operating Officer (COO)",
            "salary": "$850,000",
            "start_date": "2010/03/11",
            "office": "San Francisco",
            "extn": "2947"
          },
          {
            "id": "30",
            "name": "Shou Itou",
            "position": "Regional Marketing",
            "salary": "$163,000",
            "start_date": "2011/08/14",
            "office": "Tokyo",
            "extn": "8899"
          },
          {
            "id": "31",
            "name": "Michelle House",
            "position": "Integration Specialist",
            "salary": "$95,400",
            "start_date": "2011/06/02",
            "office": "Sydney",
            "extn": "2769"
          },
          {
            "id": "32",
            "name": "Suki Burks",
            "position": "Developer",
            "salary": "$114,500",
            "start_date": "2009/10/22",
            "office": "London",
            "extn": "6832"
          },
          {
            "id": "33",
            "name": "Prescott Bartlett",
            "position": "Technical Author",
            "salary": "$145,000",
            "start_date": "2011/05/07",
            "office": "London",
            "extn": "3606"
          },
          {
            "id": "34",
            "name": "Gavin Cortez",
            "position": "Team Leader",
            "salary": "$235,500",
            "start_date": "2008/10/26",
            "office": "San Francisco",
            "extn": "2860"
          },
          {
            "id": "35",
            "name": "Martena Mccray",
            "position": "Post-Sales support",
            "salary": "$324,050",
            "start_date": "2011/03/09",
            "office": "Edinburgh",
            "extn": "8240"
          },
          {
            "id": "36",
            "name": "Unity Butler",
            "position": "Marketing Designer",
            "salary": "$85,675",
            "start_date": "2009/12/09",
            "office": "San Francisco",
            "extn": "5384"
          },
          {
            "id": "37",
            "name": "Howard Hatfield",
            "position": "Office Manager",
            "salary": "$164,500",
            "start_date": "2008/12/16",
            "office": "San Francisco",
            "extn": "7031"
          },
          {
            "id": "38",
            "name": "Hope Fuentes",
            "position": "Secretary",
            "salary": "$109,850",
            "start_date": "2010/02/12",
            "office": "San Francisco",
            "extn": "6318"
          },
          {
            "id": "39",
            "name": "Vivian Harrell",
            "position": "Financial Controller",
            "salary": "$452,500",
            "start_date": "2009/02/14",
            "office": "San Francisco",
            "extn": "9422"
          },
          {
            "id": "40",
            "name": "Timothy Mooney",
            "position": "Office Manager",
            "salary": "$136,200",
            "start_date": "2008/12/11",
            "office": "London",
            "extn": "7580"
          },
          {
            "id": "41",
            "name": "Jackson Bradshaw",
            "position": "Director",
            "salary": "$645,750",
            "start_date": "2008/09/26",
            "office": "New York",
            "extn": "1042"
          },
          {
            "id": "42",
            "name": "Olivia Liang",
            "position": "Support Engineer",
            "salary": "$234,500",
            "start_date": "2011/02/03",
            "office": "Singapore",
            "extn": "2120"
          },
          {
            "id": "43",
            "name": "Bruno Nash",
            "position": "Software Engineer",
            "salary": "$163,500",
            "start_date": "2011/05/03",
            "office": "London",
            "extn": "6222"
          },
          {
            "id": "44",
            "name": "Sakura Yamamoto",
            "position": "Support Engineer",
            "salary": "$139,575",
            "start_date": "2009/08/19",
            "office": "Tokyo",
            "extn": "9383"
          },
          {
            "id": "45",
            "name": "Thor Walton",
            "position": "Developer",
            "salary": "$98,540",
            "start_date": "2013/08/11",
            "office": "New York",
            "extn": "8327"
          },
          {
            "id": "46",
            "name": "Finn Camacho",
            "position": "Support Engineer",
            "salary": "$87,500",
            "start_date": "2009/07/07",
            "office": "San Francisco",
            "extn": "2927"
          },
          {
            "id": "47",
            "name": "Serge Baldwin",
            "position": "Data Coordinator",
            "salary": "$138,575",
            "start_date": "2012/04/09",
            "office": "Singapore",
            "extn": "8352"
          },
          {
            "id": "48",
            "name": "Zenaida Frank",
            "position": "Software Engineer",
            "salary": "$125,250",
            "start_date": "2010/01/04",
            "office": "New York",
            "extn": "7439"
          },
          {
            "id": "49",
            "name": "Zorita Serrano",
            "position": "Software Engineer",
            "salary": "$115,000",
            "start_date": "2012/06/01",
            "office": "San Francisco",
            "extn": "4389"
          },
          {
            "id": "50",
            "name": "Jennifer Acosta",
            "position": "Junior Javascript Developer",
            "salary": "$75,650",
            "start_date": "2013/02/01",
            "office": "Edinburgh",
            "extn": "3431"
          },
          {
            "id": "51",
            "name": "Cara Stevens",
            "position": "Sales Assistant",
            "salary": "$145,600",
            "start_date": "2011/12/06",
            "office": "New York",
            "extn": "3990"
          },
          {
            "id": "52",
            "name": "Hermione Butler",
            "position": "Regional Director",
            "salary": "$356,250",
            "start_date": "2011/03/21",
            "office": "London",
            "extn": "1016"
          },
          {
            "id": "53",
            "name": "Lael Greer",
            "position": "Systems Administrator",
            "salary": "$103,500",
            "start_date": "2009/02/27",
            "office": "London",
            "extn": "6733"
          },
          {
            "id": "54",
            "name": "Jonas Alexander",
            "position": "Developer",
            "salary": "$86,500",
            "start_date": "2010/07/14",
            "office": "San Francisco",
            "extn": "8196"
          },
          {
            "id": "55",
            "name": "Shad Decker",
            "position": "Regional Director",
            "salary": "$183,000",
            "start_date": "2008/11/13",
            "office": "Edinburgh",
            "extn": "6373"
          },
          {
            "id": "56",
            "name": "Michael Bruce",
            "position": "Javascript Developer",
            "salary": "$183,000",
            "start_date": "2011/06/27",
            "office": "Singapore",
            "extn": "5384"
          },
          {
            "id": "57",
            "name": "Donna Snider",
            "position": "Customer Support",
            "salary": "$112,000",
            "start_date": "2011/01/25",
            "office": "New York",
            "extn": "4226"
          }
        ]
      }';
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
      $html = '<table style="padding-left:50px;width: 100%">';
      foreach($storages as $storage){
        $html .= '<tr>';
        $html .= '<td><div class="text-center">'.'<a href="'.$storage->id.'">'.$storage->name.'</a>'.'</div></td>';
        $html .= '
        <td>
        <div class="text-center">
        <h4 class="small font-weight-bold">'.__('product.show.product_storages.add_to_cart').'</h4>
        <a href="#"><i class="fas fa-plus"></i></a>
        </div>
        </td>
        ';
        $html .= '
        <td>
        <div class="text-center">
        <h4 class="small font-weight-bold">'.__('product.show.product_storages.add_to_wishlist').'</h4>
        <a href="#"><i class="far fa-heart"></i></a>
        </div>
        </td>
        ';
        $html .= '</tr>';
      } 
      $html .= '</table>';
      return $html;
      })
      ->rawColumns(['name','category','storages'])
      ->toJson();
    }
    // '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
    //     '<tr>'+
    //         '<td>Storages:</td>'+
    //         '<td>'+d.storages+'</td>'+
    //     '</tr>'+
    // '</table>'

}
