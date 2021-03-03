<?php

namespace Database\Seeders;

use App\Models\User\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => 1,
            'role' => 'customer',
            'created_at' => now(),
            'updated_at' => now()
        ])->save();

        Role::create([
            'id' => 2,
            'role' => 'seller',
            'created_at' => now(),
            'updated_at' => now()
        ])->save();

        Role::create([
            'id' => 3,
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ])->save();

        Role::create([
            'id' => 4,
            'role' => 'spectator',
            'created_at' => now(),
            'updated_at' => now()
        ])->save();

        Role::create([
            'id' => 5,
            'role' => 'super_user',
            'created_at' => now(),
            'updated_at' => now()
        ])->save();
    }
    
}
