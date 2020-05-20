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
        )->where('status', 'not_complete')->first();
        $smsRegister = $smsRegister ?? new $this->entityName;
        $smsRegister->mobile_number = $smsRegisterDTO->getMobileNumber();
        $smsRegister->channelType = $smsRegisterDTO->getChannelType();
        $smsRegister->national_code = $smsRegisterDTO->getNationalCode();
        $smsRegister->request_content = $smsRegisterDTO->getFirstRequestContent();
        $smsRegister->status = 'not_complete';
        if ($smsRegister->getDirty()) {
            $smsRegister->save();
        }
        return;
    }

    public function getUserNationalCode(SmsRegisterDTO $smsRegisterDTO)
    {
        $smsRegister = $this->entityName::where(
            'mobile_number', $smsRegisterDTO->getMobileNumber())->where('status', 'not_complete')
            ->firstOrFail();
        if ($smsRegisterDTO->getSecondRequestContent()) {
            $smsRegister->second_request_content = $smsRegisterDTO->getSecondRequestContent();
            $smsRegister->birth_date = $smsRegisterDTO->getBirthDate();
            $smsRegister->status = 'not_complete';

        }
        if ($smsRegisterDTO->getThirdRequestContent()) {
            $smsRegister->third_request_content = $smsRegisterDTO->getThirdRequestContent();
            $smsRegister->status = 'not_complete';

        }
        if ($smsRegister->getDirty()) {
            $smsRegister->save();
        }
        return $smsRegister;
    }

    public function changeToComplete($nationalCode)
    {
        $smsRegisters = $this->entityName::where(
            'national_code', $nationalCode
        )->where('status' . 'not_complete')->get();
        foreach ($smsRegisters as $smsRegister) {
            $smsRegister->status = 'complete';
            if ($smsRegister->getDirty()) {
                $smsRegister->save();
            }
        }
        return;
    }

}