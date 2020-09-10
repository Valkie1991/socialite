<?php

namespace Henri\Socialite;

use Illuminate\Support\ServiceProvider;

class SocialiteServiceProvider extends ServiceProvider
{
    /**
    * Indicates if loading of the provider is deferred.
    *
    * @var bool
    */
    protected $defer = false;

    /**
    * Register any application services.
    *
    * @return void
    */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/socialite.php', 'socialite'
        );
    }

    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\Install::class,
            ]);

            $this->publishes([
                __DIR__.'/config/socialite.php' => config_path('socialite.php')
            ], 'config');
        }

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'socialite');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
}
