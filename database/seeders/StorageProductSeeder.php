<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class StorageProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=9.99; $i <= 999.99; $i = $i + 10) {
          $prices[] = $i;
        }
        Cache::set('prices',$prices);
        \App\Models\Storage\StorageProduct::factory(5000)->create();
        Cache::pull('counter');

    }
}
