<?php

namespace Domains\SmsRegister;


use Domains\SmsRegister\Events\SmsRegisterEvent;
use Domains\SmsRegister\Events\TemporalLogEvent;
use Domains\SmsRegister\Listeners\SendSmsRegisterNotification;
use Domains\SmsRegister\Listeners\TemporalLogListener;
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
        ],
        TemporalLogEvent::class=>[
            TemporalLogListener::class
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
