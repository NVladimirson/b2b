<?php

namespace Database\Factories\Option;

use App\Models\Option\OptionName;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class OptionNameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OptionName::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

      if( (Cache::get('counter') == null) ){
        Cache::set('counter',1);
      }
      $current_option_name_id = Cache::get('counter');
      Cache::set('counter',$current_option_name_id+1);

      // $parent = intval(ceil($current_option_name_id/3));
      // $previous_parent = 0;
      // $nested_names = [$parent];
      // while ($parent != $previous_parent) {
      //   $res = \DB::select(
      //     '
      //     SELECT parent
      //     FROM options
      //     WHERE id="'.$parent.'"
      //     '
      // );
      //   $previous_parent = $parent;
      //   if(!isset($res[0])){
      //     info($parent);
      //     $nested_names = ['?'];
      //     break;
      //   }
      //   $parent = $res[0]->parent;
      //   if($parent != $previous_parent){
      //       $nested_names[] = $parent;
      //   }
      // }

      if($current_option_name_id % 3 == 1){
        $language = 'ru';
        $name = 'Опция ';
      }
      else if($current_option_name_id % 3 == 2){
        $language = 'uk';
        $name = 'Опція ';
      }
      else{
        $language = 'en';
        $name = 'Option ';
      }
      $name .= ceil($current_option_name_id/3);
      // $first = true;

      // foreach (array_reverse($nested_names) as $key => $name_no) {
      //   if($first){
      //     $name .= $name_no;
      //   }else{
      //     $name .= '.'.$name_no;
      //   }
      //   $first = false;
      // }

      return [
        'option_id' => ceil($current_option_name_id/3),
        'name' => $name,
        'language' => $language,
        'created_at' => now(),
        'updated_at' => now()
      ];

    }
}
