<?php


namespace Domains\Notify;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class NotifyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->register(EventServiceProvider::class);

        $this->loadAssetsFrom();

        $this->setConfig();

        $this->registerPublishing();

    }

    /**
     * Load and register package assets.
     */
    protected function loadAssetsFrom(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'notify');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'notify');
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/notify'),
        ]);

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/notify'),
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
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'notify');
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('notify.php')], 'config');

    }
}