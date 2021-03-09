<?php

namespace Database\Factories\Order;

use App\Models\Order\OrderItem;
use App\Models\Storage\StorageProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class OrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $storage_products = Cache::get('storage_products');
            $rand_storage_product_id = $storage_products[array_rand($storage_products)];
            unset($storage_products[array_rand($storage_products)]);
            Cache::set('storage_products', $storage_products);

            //$rand_storage_product_id = $rand_storage_product_id['rand_storage_product_id'];
            $storage_product = StorageProduct::find($rand_storage_product_id);
            $quantity = $storage_product->amount;
            $topay = $storage_product->price;
            return [
                'order_id' => rand(1,100),
                'storage_product_id' => $rand_storage_product_id,
                'to_pay' => $topay,
                'quantity' => $quantity,
                'created_at' => now(),
                'updated_at' => now()
            ];
        
    }
}
