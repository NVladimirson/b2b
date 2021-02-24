<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Product\ProductName::factory(3000)->create();
       \Cache::pull('counter');
       \Cache::pull('code');
    }
}
