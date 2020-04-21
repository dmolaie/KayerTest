<?php


namespace Domains\SmsRegister\Http\Controllers;


use Domains\SmsRegister\Http\Requests\CheckUserInfoWithBirthDateRequest;
use Domains\SmsRegister\Http\Requests\CheckUserNationalCodeRequest;
use Domains\SmsRegister\Services\SmsRegisterService;
use Illuminate\Http\Response;
use Morilog\Jalali\Jalalian;

class SmsRegisterController
{

    /**
     * @var SmsRegisterService
     */
    private $smsRegisterService;

    public function __construct(SmsRegisterService $smsRegisterService)
    {
        $this->smsRegisterService = $smsRegisterService;
    }

    public function registerUserWithSms(CheckUserNationalCodeRequest $request)
    {
        $smsRegisterDTO = $request->createSmsRegisterDTO();
        if ($smsRegisterDTO->getFirstRequestContent()) {
            $this->smsRegisterService->createOrUpdateRegister($smsRegisterDTO);
        } else {
            $this->smsRegisterService->registerUser($smsRegisterDTO);
        }
        return response([], Response::HTTP_OK);
    }
}