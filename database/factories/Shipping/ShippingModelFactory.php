<?php

namespace Database\Factories\Shipping;

use App\Models\Shipping\ShippingModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShippingModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}
