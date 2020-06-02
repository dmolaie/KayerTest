<?php


namespace Domains\Notify\Repositories;


use Domains\Notify\Entities\SmsNotify;
use Domains\Notify\Services\Contracts\DTOs\SendSmsDTO;

class SmsNotifyRepository
{
    protected $entityName = SmsNotify::class;

    public function create(SendSmsDTO $sendSmsDTO)
    {
        $smsNotify = new $this->entityName;
        $smsNotify->mobile_number = $sendSmsDTO->getMobileNumber();
        $smsNotify->channelTypes = $sendSmsDTO->getChannelTypes();
        $smsNotify->content = $sendSmsDTO->getContent();
        $smsNotify->save();
        return;
    }

}