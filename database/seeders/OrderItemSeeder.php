<?php

namespace Database\Seeders;

use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(100)->create();
        OrderItem::factory(1000)->create();
    }
}
