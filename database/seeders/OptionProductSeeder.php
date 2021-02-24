<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class OptionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \Cache::pull('counter');
      for ($product_id = 1; $product_id <= 1000; $product_id++) {
        for ($option_number = 1; $option_number <= rand(1,5); $option_number ++) {
          \App\Models\Option\OptionProduct::create([
            'product_id' => $product_id,
            'option_value' => rand(1,2700),
            'created_at' => now(),
            'updated_at' => now()
          ]);
        }
      }
    }
}
