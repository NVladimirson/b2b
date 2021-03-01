<?php

namespace Database\Seeders;

use App\Models\Shipping\ShippingModel;
use Illuminate\Database\Seeder;

class ShippingModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingModel::create([
            'id' => 1,
            'info' => json_encode(['name' => ['uk' => 'Самовивіз', 'en' => 'Pickup', 'ru' => 'Самовывоз']]),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        ShippingModel::create([
            'id' => 2,
            'info' => json_encode(['name' => ['uk' => 'Нова Пошта', 'en' => 'Nova Poshta', 'ru' => 'Новая Почта']]),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        ShippingModel::create([
            'id' => 3,
            'info' => json_encode(['name' => ['uk' => 'Укр Пошта', 'en' => 'Ukr Poshta', 'ru' => 'Укр Пошта']]),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
