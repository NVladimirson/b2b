<?php

namespace Database\Factories\Order;

use App\Models\Order\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'order_id' => rand(0,100),
            'product_id' => rand(0,1000),
            'quantity' => rand(1,100),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
