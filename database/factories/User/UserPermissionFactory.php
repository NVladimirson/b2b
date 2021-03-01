<?php

namespace Database\Factories\User;

use App\Models\User\UserPermission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class UserPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserPermission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if( (Cache::get('counter') == null) ){
          $counter = [];
          for ($i=1; $i <= 10; $i++) {
            $counter[] = $i;
          }
          Cache::set('counter',$counter);
        }
        $users = Cache::get('counter');
        return [
            //'user_id' => $this->faker->unique(true)->numberBetween(1,10),
            'user_id' => function() use ($users){
                $key = array_rand($users);
                $value = $users[$key];
                if(count($users)>1){
                  unset($users[$key]);
                }
                Cache::set('counter',$users);
                return strval($value);
            },
            'admin' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
