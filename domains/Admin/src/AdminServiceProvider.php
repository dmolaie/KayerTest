<?php

namespace Domains\Admin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


class AdminServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerRoutes();

        $this->loadAssetsFrom();

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
            'namespace' => 'Domains\Admin\Http\Controllers',
        ];
    }

    /**
     * Load and register package assets.
     */
    protected function loadAssetsFrom(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'admin');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'admin');
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/admin'),
        ], 'lang');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/admin'),
        ]);

        $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], 'migrations');
    }

    /**
     * Get the config file path.
     *
     * @return string
     */
    protected function getConfig(): string
    {
        return __DIR__ . '/../config/config.php';
    }

}