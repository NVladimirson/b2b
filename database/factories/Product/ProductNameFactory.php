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
            \Cache::set('counter',1);
          }
            $i = \Cache::get('counter');
            $product_id = ceil($i/3);
            if($i%3 == 1){
              \Cache::set('code',$this->faker->unique()->ean8);
              $code = \Cache::get('code');
              $language = 'en';
              $name = 'Product '.$code;
            }
            else if ($i%3 == 2){
              $language = 'ru';
              $name = 'Продукт '.\Cache::get('code');
            }
            else{
              $language = 'uk';
              $name = 'Продукт '.\Cache::get('code');
            }
            \Cache::set('counter',$i+1);
            return [
              'product_id' => $product_id,
              'language' => $language,
              'name' => $name,
              'created_at' => now(),
              'updated_at' => now()
            ];

    }
}
