<?php

namespace Domains\SmsRegister;


use Domains\SmsRegister\Events\SmsRegisterEvent;
use Domains\SmsRegister\Listeners\SendSmsRegisterNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        SmsRegisterEvent::class => [
            SendSmsRegisterNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
