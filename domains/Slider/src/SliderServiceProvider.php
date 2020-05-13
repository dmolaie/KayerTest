<?php


namespace Domains\Slider;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class SliderServiceProvider extends ServiceProvider
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
            'namespace' => 'Domains\Slider\Http\Controllers',
            'prefix'    => 'slider/v1',
        ];
    }

    /**
     * Load and register package assets.
     */
    protected function loadAssetsFrom(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'slider');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'slider');
    }

    /**
     * Get the config file path.
     *
     * @return string
     */
    protected function loadConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'slider');
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('slider.php')], 'slider');

    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/slider'),
        ]);

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/slider'),
        ]);

        $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], 'migrations');
    }
}