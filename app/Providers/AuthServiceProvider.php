<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
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
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //create a gate to check if authenticated user is admin
        Gate::define('is_admin' , function($user){
            if ($user->is_admin == 1) {
                return true;
            };
            return false;
        });
        Gate::define('is_verified' , function($user){
            if ($user->status == 1) {
                return true;
            };
            return false;
        });
    }
}
