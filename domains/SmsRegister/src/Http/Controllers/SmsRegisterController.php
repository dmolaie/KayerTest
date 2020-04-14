<?php


namespace Domains\SmsRegister\Http\Controllers;


use Domains\SmsRegister\Http\Requests\CheckUserInfoWithBirthDateRequest;
use Domains\SmsRegister\Http\Requests\CheckUserNationalCodeRequest;
use Domains\SmsRegister\Services\SmsRegisterService;
use Illuminate\Http\Response;

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

    public function checkUserNationalCode(CheckUserNationalCodeRequest $request)
    {
        $smsRegisterDTO = $request->createSmsRegisterDTO();
        $this->smsRegisterService->createOrUpdateRegister($smsRegisterDTO);
        return response([],Response::HTTP_OK);
    }

    public function registerUserWithSms(CheckUserInfoWithBirthDateRequest $request)
    {
        $smsRegisterDTO = $request->createSmsRegisterDTO();
        $this->smsRegisterService->registerUser($smsRegisterDTO);
        return response([], Response::HTTP_OK);
    }
}