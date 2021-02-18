<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Product\ProductOption::factory(5000)->create();
      \Cache::pull('counter');
    }
}
