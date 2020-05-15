<?php


namespace Domains\SmsRegister\Repositories;


use Domains\SmsRegister\Entities\SmsRegister;
use Domains\SmsRegister\Services\Contracts\DTOs\SmsRegisterDTO;

class SmsRegisterRepository
{
    protected $entityName = SmsRegister::class;

    public function createOrUpdateRegister(SmsRegisterDTO $smsRegisterDTO)
    {
        $smsRegister = $this->entityName::where(
            'national_code', $smsRegisterDTO->getNationalCode()
        )->first();
        $smsRegister = $smsRegister ?? new $this->entityName;
        $smsRegister->mobile_number = $smsRegisterDTO->getMobileNumber();
        $smsRegister->channelType = $smsRegisterDTO->getChannelType();
        $smsRegister->national_code = $smsRegisterDTO->getNationalCode();
        $smsRegister->request_content = $smsRegisterDTO->getFirstRequestContent();
        if ($smsRegister->getDirty()) {
            $smsRegister->save();
        }
        return;
    }

    public function getUserNationalCode(SmsRegisterDTO $smsRegisterDTO)
    {
        $smsRegister = $this->entityName::where(
            'mobile_number', $smsRegisterDTO->getMobileNumber())
            ->firstOrFail();
        if($smsRegisterDTO->getSecondRequestContent()){
            $smsRegister->second_request_content = $smsRegisterDTO->getSecondRequestContent();
            $smsRegister->birth_date=$smsRegisterDTO->getBirthDate();

        }
        if ($smsRegisterDTO->getThirdRequestContent()) {
            $smsRegister->third_request_content = $smsRegisterDTO->getThirdRequestContent();

        }
        if ($smsRegister->getDirty()) {
            $smsRegister->save();
        }
        return $smsRegister;
    }
}