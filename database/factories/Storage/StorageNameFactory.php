<?php

namespace Database\Factories\Storage;

use App\Models\Storage\StorageName;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class StorageNameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StorageName::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        if( (Cache::get('counter') == null) ){
          Cache::set('counter',1);
        }
        $i = Cache::get('counter');
        $storage_id = ceil($i/3);
        if($i%3 == 1){
          Cache::set('code',$this->faker->unique()->ean8);
          $code = Cache::get('code');
          $language = 'en';
          $name = 'Storage '.Cache::get('code');
        }
        else if ($i%3 == 2){
          $language = 'ru';
          $name = 'Склад '.Cache::get('code');
        }
        else{
          $language = 'uk';
          $name = 'Склад (укр.) '.Cache::get('code');
        }
          
        Cache::set('counter',$i+1);
        return [
          'storage_id' => $storage_id,
          'language' => $language,
          'name' => $name,
          'created_at' => now(),
          'updated_at' => now()
        ];
    }
}
