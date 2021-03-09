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
      // UserRole::factory(201)->create();
      //  Cache::pull('counter');
        UserRole::create([
            'user_id' => 1,
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
       ])->save();

      UserRole::create([
          'user_id' => 2,
          'role_id' => 2,
          'created_at' => now(),
          'updated_at' => now(),
      ])->save();

        UserRole::create([
          'user_id' => 3,
          'role_id' => 3,
          'created_at' => now(),
          'updated_at' => now(),
      ])->save();

      UserRole::create([
        'user_id' => 4,
        'role_id' => 4,
        'created_at' => now(),
        'updated_at' => now(),
      ])->save();

      UserRole::create([
        'user_id' => 5,
        'role_id' => 5,
        'created_at' => now(),
        'updated_at' => now(),
      ])->save();
    }
}
