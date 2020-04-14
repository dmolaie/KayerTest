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
        $smsRegister->second_request_content = $smsRegisterDTO->getSecondRequestContent();
        if ($smsRegister->getDirty()) {
            $smsRegister->save();
        }
        return $smsRegister->national_code;
    }
}