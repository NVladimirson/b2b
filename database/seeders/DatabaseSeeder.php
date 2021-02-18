<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User\UserInfo::factory(10)->create();
        // \App\Models\User\UserPermission::factory(10)->create();
        {
          $this->call([
            UserSeeder::class,
            UserInfoSeeder::class,
            UserPermissionSeeder::class,

            CategorySeeder::class,
            CategoryNameSeeder::class,

            ProductSeeder::class,
            ProductNameSeeder::class,
            #ProductOptionSeeder::class,
            #ProductOptionNameSeeder::class,

          ]);
        }

    }
    // public function run()

}
