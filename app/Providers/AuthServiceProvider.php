<?php

namespace App\Providers;

use App\Services\Auth\JwtGuard;
use App\Services\Auth\JwtProvider;
use App\Services\Auth\JwtProviderInterface;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    public function register()
    {
        $this->app->singleton(JwtProviderInterface::class, function (Application $application) {
            return new JwtProvider($application->config->get('jwt.secret'));
        });
    }

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::extend('jwt', function (Application $app, $name, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\Guard...

            return new JwtGuard(Auth::createUserProvider($config['provider']), $app->request, $app->get(JwtProviderInterface::class));
        });

    }
}
