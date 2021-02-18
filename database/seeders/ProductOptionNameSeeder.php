<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductOptionNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Product\ProductOptionName::factory(10000)->create();
      \Cache::pull('counter');
    }
}
