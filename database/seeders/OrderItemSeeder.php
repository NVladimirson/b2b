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
        OrderItem::factory(1000)->create();
        Cache::pull('counter');
    }
}
