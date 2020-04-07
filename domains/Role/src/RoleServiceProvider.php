<?php

namespace Domains\Role;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


class RoleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerRoutes();

        $this->loadAssetsFrom();

        $this->loadConfig();

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

    private function routeConfiguration()
    {
        return [
            'namespace' => 'Domains\Role\Http\Controllers',
            'prefix'    => 'role/v1',
        ];
    }

    /**
     * Load and register package assets.
     */
    protected function loadAssetsFrom(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'role');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'role');
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/role'),
        ], 'lang');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/role'),
        ]);

        $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], 'migrations');
    }

    /**
     * Get the config file path.
     *
     */
    protected function loadConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'role');
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('role.php')], 'config');
    }

}