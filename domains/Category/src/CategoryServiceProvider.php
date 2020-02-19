<?php

namespace Domains\Category;

use Domains\Category\Entities\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerRoutes();

        $this->loadAssetsFrom();

        $this->loadConfig();

        $this->registerPublishing();

        $this->registerPolicies();

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
            'namespace' => 'Domains\Category\Http\Controllers',
            'prefix' => 'category',
        ];
    }

    /**
     * Load and register package assets.
     */
    protected function loadAssetsFrom(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'category');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'category');
    }

    /**
     * Get the config file path.
     *
     * @return string
     */
    protected function loadConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'category');
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('category.php')], 'config');

    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/category'),
        ]);

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/category'),
        ]);

        $this->publishes([__DIR__ . '/../database/migrations' => database_path('migrations')], 'migrations');
    }

    /**
     * Register the application's policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
        foreach ($this->policies() as $key => $value) {
            Gate::policy($key, $value);
        }
    }

    /**
     * Get the policies defined on the provider.
     *
     * @return array
     */
    public function policies()
    {

        return [
            Category::class => \Domains\Category\Policies\CategoryPolicy::class,
        ];
    }
}