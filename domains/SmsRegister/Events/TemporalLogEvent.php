<?php

namespace Domains\SmsRegister\Events;

use Domains\SmsRegister\Services\Contracts\DTOs\TemporalLogDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TemporalLogEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var TemporalLogDTO
     */
    public $temporalLogDto;

    /**
     * Create a new event instance.
     * @param TemporalLogDTO $temporalLogDto
     */
    public function __construct(TemporalLogDTO $temporalLogDto)
    {

        $this->temporalLogDto = $temporalLogDto;
    }

}
