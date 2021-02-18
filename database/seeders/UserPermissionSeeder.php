<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\User\UserPermission::factory(10)->create();
       \Cache::pull('counter');
    }
}
