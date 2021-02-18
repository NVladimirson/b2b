<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\User\UserInfo::factory(10)->create();
      \Cache::pull('counter');
    }
}
