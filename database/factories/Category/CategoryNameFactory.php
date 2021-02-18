<?php

namespace Database\Factories\Category;

use App\Models\Category\CategoryName;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryNameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryName::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        'category_id' => 1,
        'language' => 'en',
        'name' => ' ',
        'created_at' => now(),
        'updated_at' => now(),
      ];
    }
}
