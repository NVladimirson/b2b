<?php

namespace App\Http\Controllers;


use App\Models\Category\Category;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\Miscellaneous;
use Illuminate\Support\Arr;

class DashboardController extends Controller
{
  public function index()
  {

    SEOTools::setTitle(trans('dashboard.page_name'));

    return view('home'
    // ,compact(
    //     'order_counts',
    //         'success_procent',
    //         'success_total',
    //         'success_weight',
    //         'orders',
    //         'last_orders',
    //         'last_payment',
    //         'last_messages',
    //         'topOrderProducts',
    //         'mostPopularOrderProducts',
    //         'newsData'
    //     )
      );
    }

    public function dtlocalization(){
      return (json_encode(__('miscellaneous.datatable.localization_link')));
    }


}
