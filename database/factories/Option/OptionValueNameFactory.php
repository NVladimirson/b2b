<?php

namespace Database\Factories\Option;

use App\Models\Option\OptionValueName;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class OptionValueNameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OptionValueName::class;

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
      $current_value_name_id = Cache::get('counter');
      $current_value_id = intval(ceil($current_value_name_id/3));
      Cache::set('counter',$current_value_name_id+1);

      if($current_value_name_id % 3 == 1){
        $language = 'ru';
        $name = 'Значение ';
      }
      else if($current_value_name_id % 3 == 2){
        $language = 'uk';
        $name = 'Значення ';
      }
      else{
        $language = 'en';
        $name = 'Option ';
      }

      // $table->id();
      // $table->unsignedBigInteger('option_value_id');
      // $table->foreign('option_value_id')->references('id')->on('option_values');
      // $table->enum('language', ['en','ru','uk']);
      // $table->text('name');
      // $table->timestamps();
        return [
          'option_value_id' => $current_value_id,
          'language' => $language,
          'name' => $name . $current_value_id,
          'created_at' => now(),
          'updated_at' => now()
        ];
    }
}
