<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes(null, ['prefix' => 'api/oauth']);
        Passport::tokensExpireIn(now()->addMinutes(90));
        Passport::personalAccessTokensExpireIn(now()->addMinutes(10));
        Passport::refreshTokensExpireIn(now()->addMinutes(15));
    }
}
