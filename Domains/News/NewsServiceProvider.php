<?php


namespace Domains\News;


use App\Providers\EhdaServiceProvider;

class NewsServiceProvider extends EhdaServiceProvider
{
    /**
     * @return string
     */
    protected function getName()
    {
        return 'news';
    }

    /**
     * @return bool
     */
    protected function isApp()
    {
        return false;
    }

    /**
     *
     */
    public function boot()
    {
        parent::boot();
    }
}