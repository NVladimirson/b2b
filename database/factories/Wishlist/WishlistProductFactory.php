<?php

namespace Database\Factories\Wishlist;

use App\Models\Wishlist\WishlistProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class WishlistProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WishlistProduct::class;

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
          $current_wishlist_id = Cache::get('counter');
          Cache::set('counter',$current_wishlist_id+1);
          
        return [
            'product_id' => rand(1,1000),
            'wishlist_id' => ceil($current_wishlist_id/1000),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
