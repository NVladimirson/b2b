<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\User::factory(10)->create();
      \App\Models\User::create([
        'name' => 'test',
        'email'=>'test@test.test',
        'password' => '$2y$10$FO/WYrR.WMvwdMqqHPSCdO.GwkTdhFDPMpcJtLvZxKV7BARGF884S',
        'created_at' => '2021-02-22 07:10:00',
        'updated_at' => '2021-02-22 07:10:00'
        ])->save();
        \Cache::pull('counter');
    }
}
