<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('able_to_order', function(){
            return intval(auth()->user()->getRole->getRolePermission->order);
        });

        Gate::define('able_to_manage_orders', function(){
            return intval(auth()->user()->getRole->getRolePermission->manage_orders);
        });

        Gate::define('able_to_manage_content_storages', function(){
            return intval(auth()->user()->getRole->getRolePermission->manage_content_storages);
        });

        Gate::define('admin', function(){
            return intval(auth()->user()->getRole->getRolePermission->admin);
        });

        // Gate::define('ocreate-rder', function ($user, $order) {
        //     return $user->id === $post->user_id;
        // });

    }
}
