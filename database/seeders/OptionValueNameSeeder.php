<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class OptionValueNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Option\OptionValueName::factory(3000)->create();
       Cache::pull('counter');
       Cache::pull('code');
    }
}
