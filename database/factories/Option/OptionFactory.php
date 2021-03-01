<?php

namespace Database\Factories\Option;

use App\Models\Option\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Option::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

      // if( (\Cache::get('counter') == null) ){
      //   \Cache::set('counter',1);
      // }
      // $current_option_id = \Cache::get('counter');

      // \Cache::set('counter',$current_option_id+1);

      return [
        // 'parent' => ($current_option_id<=100) ? $current_option_id : rand(1,100),
        // 'position' => 1,
        // 'main' =>($current_option_id<=100) ? 1 : 0,
        'created_at' => now(),
        'updated_at' => now()
      ];


    }
}
