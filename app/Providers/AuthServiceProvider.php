<?php

namespace App\Providers;

use Auth;
use App\Authentication\UserProvider;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
     /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot()
    {
        Auth::provider('dmm_user_provider', function($app, array $config) {
            return new UserProvider();
        });
    }
}
