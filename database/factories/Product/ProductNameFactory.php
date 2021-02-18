<?php

namespace Database\Factories\Product;

use App\Models\Product\ProductName;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductNameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductName::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
          if( (\Cache::get('counter') == null) ){
            $counter = [];
            for ($i=1; $i <= 1000; $i++) {
              $counter[] = $i;
            }
            \Cache::set('counter',$counter);
          }
          $products = \Cache::get('counter');
          if(rand(0,1)){
            return [
              'product_id' => function() use ($products){
                  $key = array_rand($products);
                  $value = $products[$key];
                  if(count($products)>1){
                    unset($products[$key]);
                  }
                  \Cache::set('counter',$products);
                  return strval($value);
              },
              //'user_id' => $this->faker->unique()->numberBetween(1,10),
              'language' => 'en',
              'name' => 'Product '.$this->faker->unique()->ean8,
              'created_at' => now(),
              'updated_at' => now(),
            ];
          }
          else{
            return [
              'product_id' => function() use ($products){
                  $key = array_rand($products);
                  $value = $products[$key];
                  if(count($products)>1){
                    unset($products[$key]);
                  }
                  \Cache::set('counter',$products);
                  return strval($value);
              },
              //'user_id' => $this->faker->unique()->numberBetween(1,10),
              'language' => 'ru',
              'name' => 'Продукт '.$this->faker->unique()->ean8,
              'created_at' => now(),
              'updated_at' => now(),
            ];
          }

    }
}
