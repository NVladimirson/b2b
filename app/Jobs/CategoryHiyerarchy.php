<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Category\Category;
use Illuminate\Support\Arr;


class CategoryHiyerarchy implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $category_names = Category::with('names')
      // ->whereRaw('id = parent')
      ->get()
      ->pluck('names','id')
      ->map(function ($localizations, $id)
       // use($language)
       {

        return $localizations->keyBy('language');
        //return $localizations->firstWhere('language', $language)->name;
      });
      //dd($category_names);
      $category_hierarchy = Category::all()->pluck('parent','id');
      $category_widget_info = [];
      foreach ($category_hierarchy as $category_id => $parent) {
        if($category_id == $parent){
          try {
            $category_widget_info[$category_id]['info'] = $category_names[$category_id];
          } catch (\Exception $e) {
            break;
          }
        }
        else{

          $current_category_id = $category_id;
          $current_parent = $parent;
          $nested_categories = [];
          do{
            $nested_categories[] = $current_parent;
            $current_parent = $category_hierarchy[$current_parent];
            $current_category_id = $category_hierarchy[$current_category_id];
          }
          while ($current_category_id != $current_parent);

          $nested_categories = array_reverse(Arr::prepend($nested_categories, $category_id));

          $childcode='';
          $infocode='';
          $codes = [];


          $firstkey = array_key_first($nested_categories);
          $lastkey = array_key_last($nested_categories);
          foreach($nested_categories as $key => $cat_id)
              {

                  if(($cat_id != $nested_categories[count($nested_categories)-1])){
                      $childcode.= $cat_id.'.childs.';
                  }
                  else{
                      $childcode.= $cat_id;
                  }

                  if($firstkey == $lastkey){
                    $infocode = $cat_id.'.info';
                  }
                  else{
                    if($key == $firstkey){
                      $infocode = $cat_id;
                    }
                    else {
                      $infocode .= '.childs.'.$cat_id;
                    }
                  }

                  $codes['info'][$infocode.'.info'] = $category_names[$cat_id];

              }

           $codes = Arr::prepend($codes, $childcode);

           Arr::set($category_widget_info, $codes[0], []);

           foreach ($codes['info'] as $code => $name) {
             Arr::set($category_widget_info, $code, $name);
           }


           }
         }

         \Cache::set('category_widget_info',$category_widget_info,now()->addMinutes(60));
    }
}
