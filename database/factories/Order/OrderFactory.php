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
        //$statuses = ['awaits','formed','payed'];
        $user_ids = [1,2,3,5];
        return [
            'shipping_id' => rand(1,3),
            'user_id' => $user_ids[array_rand($user_ids)],
            'public_number' => $this->faker->isbn13,
            'created_at' => now(),
            'to_pay' => 0,
            'status' => 'awaits',
            'updated_at' => now()
        ];
    }
}
