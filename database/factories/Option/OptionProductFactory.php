<?php

namespace Database\Factories\Option;

use App\Models\Product\ProductOption;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class OptionProduct extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductOption::class;

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
        $i = Cache::get('counter') ;
        $product_id = ceil($i/5);
        $current_i = $i;
        Cache::set('counter',$i+1);
        return [
          'product_id' => $product_id,
           // 'parent'
          'created_at' => now(),
          'updated_at' => now(),
        ];
    }
}
