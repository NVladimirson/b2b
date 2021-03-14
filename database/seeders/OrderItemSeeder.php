<?php

namespace Database\Seeders;

use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $storage_products = [];
        // for ($storage_product_id=1; $storage_product_id <= 5000; $storage_product_id++) { 
        //     $storage_products[] = $storage_product_id;
        // }
        // Cache::set('storage_products', $storage_products);
        // OrderItem::factory(1000)->create();
        // Cache::pull('storage_products');
    }
}
