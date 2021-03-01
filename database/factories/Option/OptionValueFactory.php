<?php

namespace Database\Factories\Option;

use App\Models\Option\OptionValue;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class OptionValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OptionValue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      // $table->id();
      // $table->unsignedBigInteger('option_id');
      // $table->foreign('option_id')->references('id')->on('options');
      // $table->timestamps();
      if( (Cache::get('counter') == null) ){
        Cache::set('counter',1);
      }
      $current_value_id = Cache::get('counter');
      $current_option_id = intval(ceil($current_value_id/3));
      Cache::set('counter',$current_value_id+1);

      return [
        //'option_id' => $current_option_id + 100,
        'option_id' => $current_option_id,
        'created_at' => now(),
        'updated_at' => now()
      ];

    }
}
