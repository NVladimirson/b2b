<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OptionValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Option\OptionValue::factory(2700)->create();
       \Cache::pull('counter');
       \Cache::pull('code');
    }
}
