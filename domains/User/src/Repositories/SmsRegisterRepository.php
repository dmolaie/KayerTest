<?php


namespace Domains\User\Repositories;


use Domains\User\Entities\SmsRegister;
use Domains\User\Services\Contracts\DTOs\SmsRegisterDTO;

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
        $smsRegister->request_content = $smsRegisterDTO->getRequestContent();
        if($smsRegister->getDirty()){
            $smsRegister->save();
        }
        return $smsRegister;
    }
}