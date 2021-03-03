<?php

namespace Database\Seeders;

use App\Models\User\RolePermission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->id();
        // $table->unsignedBigInteger('role_id');
        // $table->foreign('role_id')->references('id')->on('roles');
        // $table->boolean('order');
        // $table->boolean('manage_orders');
        // $table->boolean('manage_content_storages');
        // $table->boolean('admin');
        // $table->timestamps();

        RolePermission::create([
            'id' => 1,
            'role_id' => 1,
            'order' => 1,
            'manage_orders' => 0,
            'manage_content_storages' => 0,
            'admin' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ])->save();

        RolePermission::create([
            'id' => 2,
            'role_id' => 2,
            'order' => 0,
            'manage_orders' => 1,
            'manage_content_storages' => 0,
            'admin' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ])->save();

        RolePermission::create([
            'id' => 3,
            'role_id' => 3,
            'order' => 0,
            'manage_orders' => 0,
            'manage_content_storages' => 1,
            'admin' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ])->save();

        RolePermission::create([
            'id' => 4,
            'role_id' => 4,
            'order' => 0,
            'manage_orders' => 0,
            'manage_content_storages' => 0,
            'admin' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ])->save();

        RolePermission::create([
            'id' => 5,
            'role_id' => 4,
            'order' => 1,
            'manage_orders' => 1,
            'manage_content_storages' => 1,
            'admin' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ])->save();
    }
}
