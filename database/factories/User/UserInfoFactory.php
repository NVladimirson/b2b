<?php

namespace Database\Factories\User;

use App\Models\User\UserInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      if( (\Cache::get('counter') == null) ){
        $counter = [];
        for ($i=1; $i <= 10; $i++) {
          $counter[] = $i;
        }
        \Cache::set('counter',$counter);
      }
      $users = \Cache::get('counter');
        return [
          'user_id' => function() use ($users){
              $key = array_rand($users);
              $value = $users[$key];
              if(count($users)>1){
                unset($users[$key]);
              }
              \Cache::set('counter',$users);
              return strval($value);
          },
          //'user_id' => $this->faker->unique()->numberBetween(1,10),
          'field' => $this->faker->unique()->word,
          'value' => $this->faker->unique()->word,
          'created_at' => now(),
          'updated_at' => now(),
        ];
    }
}
