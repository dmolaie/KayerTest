<?php

namespace Domains\SmsRegister\Events;

use Domains\SmsRegister\Services\Contracts\DTOs\SmsRegisterDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SmsRegisterEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var SmsRegisterDTO
     */
    public $smsRegisterDTO;

    /**
     * Create a new event instance.
     *
     * @param SmsRegisterDTO $smsRegisterDTO
     */
    public function __construct(SmsRegisterDTO $smsRegisterDTO)
    {
        $this->smsRegisterDTO = $smsRegisterDTO;
    }

}
