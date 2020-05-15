<?php

namespace Domains\Payment\Listeners;

use Domains\Payment\Events\PaymentEvent;
use Domains\Payment\Http\Helper\RSAProcessor;

class PaymentListener
{

    /**
     * Handle the event.
     *
     * @param PaymentEvent $event
     * @return void
     */
    public function handle(PaymentEvent $event)
    {
        try {
            $sendMessageUrl = config('smsRegister.sendMessageUrl');
            $jsonToSend = $this->makeRequestBody($event);
            $this->sendNotification($jsonToSend, $sendMessageUrl);
            return;
        } catch (\Exception $exception) {
            $this->addLog('exception SmsRegisterEvent', [
                $event->smsRegisterDTO->getMobileNumber(),
                $event->smsRegisterDTO->getContent(),
                $exception->getMessage()
            ]);
        }

    }

    private  function payment(){


    }

}
