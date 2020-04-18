<?php


namespace Domains\SmsRegister;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class SmsRegisterServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->register(EventServiceProvider::class);

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
            'namespace' => 'Domains\SmsRegister\Http\Controllers',
            'prefix'    => 'sms-register/v1',
        ];
    }

    /**
     * Load and register package assets.
     */
    protected function loadAssetsFrom(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'smsRegister');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'smsRegister');
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/smsRegister'),
        ]);

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/smsRegister'),
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
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'smsRegister');
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('smsRegister.php')], 'config');

    }
}