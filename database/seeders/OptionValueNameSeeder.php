<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OptionValueNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Option\OptionValueName::factory(8100)->create();
       \Cache::pull('counter');
       \Cache::pull('code');
    }
}
