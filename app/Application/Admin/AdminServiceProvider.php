<?php


namespace App\Application\Admin;


use App\Providers\EhdaServiceProvider;

class AdminServiceProvider extends EhdaServiceProvider
{
    /**
     * @return string
     */
    protected function getName()
    {
        return 'admin';
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