<?php

namespace Database\Factories\User;

use App\Models\User\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Cache;

class UserRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserRole::class;

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

        $user_id = Cache::get('counter');
        Cache::set('counter',$user_id + 1);
        

        return [
            'user_id' => $user_id,
            'role_id' => ($user_id == 201) ? 5 : rand(1,4),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
