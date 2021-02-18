<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'description' => $this->faker->sentences(2, true),
          'category_id' => $this->faker->unique(true)->numberBetween(1,200),
          'article' => $this->faker->unique()->ean8,
          'created_at' => now(),
          'updated_at' => now(),
        ];
    }
}
