<?php

namespace Database\Factories\User;

use App\Models\User\UserInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

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
      if( (Cache::get('counter') == null) ){
        Cache::set('counter',1);
      }
      $users = Cache::get('counter');
        return [
          // 'user_id' => function() use ($users){
          //     $key = array_rand($users);
          //     $value = $users[$key];
          //     if(count($users)>1){
          //       unset($users[$key]);
          //     }
          //     Cache::set('counter',$users);
          //     return strval($value);
          // },
          'user_id' => rand(1,11),
          'field' => $this->faker->realText(10,1),
          'value' => $this->faker->realText(10,1),
          'created_at' => now(),
          'updated_at' => now(),
        ];
    }
}
