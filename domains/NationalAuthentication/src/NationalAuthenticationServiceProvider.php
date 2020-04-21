<?php


namespace Domains\NationalAuthentication;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class NationalAuthenticationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerRoutes();

        $this->loadAssetsFrom();

        $this->setConfig();

        $this->registerPublishing();

    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes(): void
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        });
    }

    /**
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'namespace' => 'Domains\NationalAuthentication\Http\Controllers',
            'prefix'    => 'authentication/v1',
        ];
    }

    /**
     * Load and register package assets.
     */
    protected function loadAssetsFrom(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nationalAuthentication');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'nationalAuthentication');
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/nationalAuthentication'),
        ]);

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/nationalAuthentication'),
        ]);

        $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], 'migrations');
    }

    /**
     * Get the config file path.
     *
     * @return string
     */
    protected function setConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'nationalAuthentication');
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('nationalAuthentication.php')], 'config');

    }
}