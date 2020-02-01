<?php

namespace App\Site\Provider;

use App\Site\SiteServiceProvider as ServiceProvider;

class SiteServiceProvider extends ServiceProvider
{

    protected $resourceAlias = 'app/Site';

    protected $hasViews = true;

    protected $hasTranslations = true;

    protected $hasMigrations = true;



    protected $subProviders = [
        RouteServiceProvider::class,
    ];

}