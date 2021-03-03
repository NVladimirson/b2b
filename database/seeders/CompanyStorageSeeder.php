<?php

namespace Database\Seeders;

use App\Models\Company\CompanyStorage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;


class CompanyStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //CompanyStorage::factory(500)->create();

        for ($storage_id=1; $storage_id <=500 ; $storage_id++) { 
            if($storage_id < 101){
                CompanyStorage::create([
                    'storage_id' => $storage_id,
                    'company_id' => $storage_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            else{
                CompanyStorage::create([
                    'storage_id' => $storage_id,
                    'company_id' => rand(1,100),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


    }
}
