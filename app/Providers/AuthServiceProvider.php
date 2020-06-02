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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-users', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('post-reports', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('edit-reports', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('delete-reports', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('manage-specifications', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('edit-quantity', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });

        Gate::define('add-products', function($user){
            return $user->hasAnyRoles(['admin', 'author']);
        });
    }
}
