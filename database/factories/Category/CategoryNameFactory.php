<?php

namespace Database\Factories\Category;

use App\Models\Category\CategoryName;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryNameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryName::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      // return [
      //   'category_id' => 1,
      //   'language' => 'en',
      //   'name' => ' ',
      //   'created_at' => now(),
      //   'updated_at' => now(),
      // ];
      if( (\Cache::get('counter') == null) ){
        \Cache::set('counter',1);
      }
      $current_category_name_id = \Cache::get('counter');
      \Cache::set('counter',$current_category_name_id+1);

      $parent = intval(ceil($current_category_name_id/3));
      $previous_parent = 0;
      $nested_names = [$parent];
      while ($parent != $previous_parent) {
        $res = \DB::select(
          '
          SELECT parent
          FROM categories
          WHERE id="'.$parent.'"
          '
      );
        $previous_parent = $parent;
        if(!isset($res[0])){
          info($parent);
          $nested_names = ['?'];
          break;
        }
        $parent = $res[0]->parent;
        if($parent != $previous_parent){
            $nested_names[] = $parent;
        }
      }

      if($current_category_name_id % 3 == 1){
        $language = 'ru';
        $name = 'Категория ';
      }
      else if($current_category_name_id % 3 == 2){
        $language = 'uk';
        $name = 'Категорія ';
      }
      else{
        $language = 'en';
        $name = 'Category ';
      }

      $first = true;

      foreach (array_reverse($nested_names) as $key => $name_no) {
        if($first){
          $name .= $name_no;
        }else{
          $name .= '.'.$name_no;
        }
        $first = false;
      }

      return [
        'category_id' => ceil($current_category_name_id/3),
        'name' => $name,
        'language' => $language,
        'created_at' => now(),
        'updated_at' => now()
      ];
    }
}
