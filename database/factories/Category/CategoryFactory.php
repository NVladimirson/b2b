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

      // return [
      //   'priority' => 1,
      //    'parent' => 1,
      //   'created_at' => now(),
      //   'updated_at' => now(),
      // ];
      if( (\Cache::get('counter') == null) ){
        \Cache::set('counter',1);
      }
      $current_category_id = \Cache::get('counter');

      \Cache::set('counter',$current_category_id+1);

      return [
        'parent' => rand(0,3) ? rand(1,$current_category_id) : $current_category_id,
        'priority' => 1,
        'created_at' => now(),
        'updated_at' => now()
      ];

    }
}
