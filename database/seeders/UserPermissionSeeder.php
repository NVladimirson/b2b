<?php

namespace Database\Seeders;

use App\Models\User\UserPermission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

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
       Cache::pull('counter');
       UserPermission::create([
         'user_id' => 11,
         'admin' => 1,
         'created_at' => now(),
         'updated_at' => now()
       ])->save();
    }
}
