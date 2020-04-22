<?php

namespace Domains\SmsRegister\Listeners;

use Domains\SmsRegister\Events\TemporalLogEvent;
use Domains\SmsRegister\Services\TemporalLogService;


class TemporalLogListener
{

    /**
     * @var TemporalLogService
     */
    private $temporalLogService;

    public function __construct(TemporalLogService $temporalLogService)
    {

        $this->temporalLogService = $temporalLogService;
    }
    /**
     * Handle the event.
     *
     * @param  TemporalLogEvent $event
     * @return void
     */
    public function handle(TemporalLogEvent $event)
    {
        $this->temporalLogService->log($event->temporalLogDto);
    }


}
