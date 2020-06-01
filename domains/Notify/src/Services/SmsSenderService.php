<?php


namespace Domains\Notify\Services;


use Domains\Notify\Events\SendSmsEvent;
use Domains\Notify\Repositories\SmsNotifyRepository;
use Domains\Notify\Services\Contracts\DTOs\SendSmsDTO;

/**
 * Class SmsSenderService
 */
class SmsSenderService
{

    /**
     * @var SmsNotifyRepository
     */
    private $smsNotifyRepository;

    public function __construct(SmsNotifyRepository $smsNotifyRepository)
    {

        $this->smsNotifyRepository = $smsNotifyRepository;
    }
    /**
     * @param SendSmsDTO $sendSmsDTO
     */
    public function sendSms(SendSmsDTO $sendSmsDTO)
    {
        $this->smsNotifyRepository->create($sendSmsDTO);
        event(new SendSmsEvent($sendSmsDTO));
        return;
    }
}