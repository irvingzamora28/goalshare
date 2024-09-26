<?php

namespace App\Providers;

use App\Http\Middleware\PremiumUser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->app['router']->aliasMiddleware('premium', PremiumUser::class);
    }
}
