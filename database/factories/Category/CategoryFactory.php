<?php

namespace Database\Factories\Category;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

      // if( (\Cache::get('counter') == null) ){
      //   $counter = [];
      //   for ($i=1; $i <= 200; $i++) {
      //     $counter[] = $i;
      //   }
      //   \Cache::set('counter',$counter);
      // }
      // $parent_categories = \Cache::get('counter');
      //     if(rand(0,9)){
      //       return [
      //         'priority' => 1,
      //         'parent' => function() use ($parent_categories){
      //             $key = array_rand($parent_categories);
      //             $value = $parent_categories[$key];
      //             if(count($parent_categories)>1){
      //               unset($parent_categories[$key]);
      //             }
      //             \Cache::set('counter',$parent_categories);
      //             return strval($value);
      //         },
      //         'created_at' => now(),
      //         'updated_at' => now(),
      //       ];
      //     }
      //     else{
      //       return [
      //         'priority' => 1,
      //         'parent' => 0,
      //         'created_at' => now(),
      //         'updated_at' => now(),
      //       ];
      //     }
      return [
        'priority' => 1,
         'parent' => 1,
        'created_at' => now(),
        'updated_at' => now(),
      ];

    }
}
