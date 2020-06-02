<?php

namespace Domains\Notify\Events;

use Domains\Notify\Services\Contracts\DTOs\SendSmsDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendSmsEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var SendSmsDTO
     */
    public $sendSmsDTO;

    /**
     * Create a new event instance.
     *
     * @param SendSmsDTO $sendSmsDTO
     */
    public function __construct(SendSmsDTO $sendSmsDTO)
    {
        $this->sendSmsDTO = $sendSmsDTO;
    }

}
