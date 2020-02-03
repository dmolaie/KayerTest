<?php


namespace App\Application\Site;


use App\Providers\EhdaServiceProvider;

class SiteServiceProvider extends EhdaServiceProvider
{
    /**
     * @return string
     */
    protected function getName()
    {
        return 'site';
    }

    /**
     * @return bool
     */
    protected function isApp()
    {
        return true;
    }

    /**
     *
     */
    public function boot()
    {
        parent::boot();
    }
}