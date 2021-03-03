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
              RoleSeeder::class,
              RolePermissionSeeder::class,

              CompanySeeder::class,
               StorageSeeder::class,
               CompanyStorageSeeder::class,

             UserSeeder::class,
             UserInfoSeeder::class,
             UserRoleSeeder::class,
             CompanyUserSeeder::class,
            // //
            CategorySeeder::class,
            CategoryNameSeeder::class,

              ProductSeeder::class,
              ProductNameSeeder::class,
              StorageProductSeeder::class,
            //

             OptionSeeder::class,
             OptionNameSeeder::class,
             OptionValueSeeder::class,
             OptionValueNameSeeder::class,
             OptionProductSeeder::class,

             ShippingModelSeeder::class,

             OrderSeeder::class,
             OrderItemSeeder::class,
            


          ]);
        }

    }
    // public function run()

}
