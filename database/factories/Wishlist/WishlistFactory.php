<?php

namespace Database\Factories\Wishlist;

use App\Models\Wishlist\Wishlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class WishlistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Wishlist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(0,9) ? 11 : rand(1,10),
            'name' => $this->faker->realText(10,1),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
