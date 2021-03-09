<?php

namespace Database\Factories\Storage;

use App\Models\Storage\StorageProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class StorageProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StorageProduct::class;

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
        $i = Cache::get('counter');
        $storage_id = ceil($i/10);
        Cache::set('counter',$i+1);
        $prices = Cache::get('prices');
        return [
          'product_id' => rand(1,1000),
          'storage_id' => $storage_id,
          'amount' => rand(0,3) ? rand(1,999) : 0,
          'price' => $prices[array_rand($prices)],
          'created_at' => now(),
          'updated_at' => now()
        ];
    }
}
