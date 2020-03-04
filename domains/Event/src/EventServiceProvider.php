<?php


namespace Domains\Event;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
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

    /**
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'namespace' => 'Domains\Event\Http\Controllers',
            'prefix' => 'event/v1',
        ];
    }

    /**
     * Load and register package assets.
     */
    protected function loadAssetsFrom(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'event');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'event');
    }

    /**
     * Get the config file path.
     *
     * @return string
     */
    protected function loadConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'event');
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('event.php')], 'event');

    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/event'),
        ]);

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/event'),
        ]);

        $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], 'migrations');
    }
}