<?php

namespace Database\Factories\Order;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shipping_id' => rand(1,3),
            'user_id' => rand(0,9) ? 11 : rand(1,10),
            'public_number' => $this->faker->isbn13,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
