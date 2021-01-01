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

        Gate::before(function ($user, $permission)
        {
            if ($user->hasPermission('full-control')) {
                return true;
            }
        });

        Gate::define('role-control', function ($user)
        {
            if ($user->hasPermission('role-control')) {
                return true;
            }
        });

        Gate::define('user-control', function ($user)
        {
            if ($user->hasPermission('user-control')) {
                return true;
            }
        });

        Gate::define('product-control', function ($user)
        {
            if ($user->hasPermission('product-control')) {
                return true;
            }
        });

        Gate::define('category-control', function ($user)
        {
            if ($user->hasPermission('category-control')) {
                return true;
            }
        });
    }
}
