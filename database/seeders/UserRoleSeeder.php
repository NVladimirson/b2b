<?php

namespace Database\Seeders;

use App\Models\User\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      UserRole::factory(201)->create();
       Cache::pull('counter');
      //  UserPermission::create([
      //    'user_id' => 11,
      //    'admin' => 1,
      //    'created_at' => now(),
      //    'updated_at' => now()
      //  ])->save();
    }
}
