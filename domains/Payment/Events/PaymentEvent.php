<?php

namespace Domains\Payment\Events;

use Domains\Payment\Services\Contracts\DTOs\DonationInfoDTO;
use Domains\SmsRegister\Services\Contracts\DTOs\SmsRegisterDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var DonationInfoDTO
     */
    private $donationInfoDTO;

    /**
     * Create a new event instance.
     *
     * @param DonationInfoDTO $donationInfoDTO
     */
    public function __construct(DonationInfoDTO $donationInfoDTO)
    {
        $this->donationInfoDTO = $donationInfoDTO;
    }

}
