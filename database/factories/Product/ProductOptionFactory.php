<?php

namespace Database\Factories\Product;

use App\Models\Product\ProductOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductOptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductOption::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'product_id' => rand(1,1000),
          'created_at' => now(),
          'updated_at' => now(),
        ];
    }
}
