<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\User::factory(200)->create();
      \App\Models\User::create([
        'name' => 'Super Admin',
        'email'=>'super@test.admin',
        'password' => '$2y$10$FO/WYrR.WMvwdMqqHPSCdO.GwkTdhFDPMpcJtLvZxKV7BARGF884S',
        'company_id' => rand(1,100),
        'created_at' => '2021-02-22 07:10:00',
        'updated_at' => '2021-02-22 07:10:00'
        ])->save();
        Cache::pull('counter');

      // \App\Models\User::create([
      //   'name' => $this->faker->name,
      //   'email' => $this->faker->unique()->safeEmail,
      //   'email_verified_at' => now(),
      //   'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
      //   'company_id' => rand(1,100),
      //   'remember_token' => Str::random(10),
      //   'created_at' => now(),
      //   'updated_at' => now()
      // ]);

    }
}
