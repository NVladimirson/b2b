<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\Storage\Storage::factory(500)->create();
       \Cache::pull('counter');
       \App\Models\Storage\StorageName::factory(1500)->create();
        \Cache::pull('counter');
    }
}
