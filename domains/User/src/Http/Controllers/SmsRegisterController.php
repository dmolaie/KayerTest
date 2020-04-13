<?php


namespace Domains\User\Http\Controllers;


use Domains\User\Http\Requests\CheckUserNationalCodeRequest;
use Domains\User\Services\SmsRegisterService;

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
    }
}