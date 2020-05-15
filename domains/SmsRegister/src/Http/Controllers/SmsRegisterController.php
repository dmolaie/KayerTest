<?php


namespace Domains\SmsRegister\Http\Controllers;


use Domains\SmsRegister\Http\Requests\CheckUserInfoWithBirthDateRequest;
use Domains\SmsRegister\Http\Requests\CheckUserNationalCodeRequest;
use Domains\SmsRegister\Services\SmsRegisterService;
use Illuminate\Http\Response;

/**
 * Class SmsRegisterController
 */
class SmsRegisterController
{

    /**
     * @var SmsRegisterService
     */
    private $smsRegisterService;

    /**
     * SmsRegisterController constructor.
     * @param SmsRegisterService $smsRegisterService
     */
    public function __construct(SmsRegisterService $smsRegisterService)
    {
        $this->smsRegisterService = $smsRegisterService;
    }

    /**
     * @param CheckUserNationalCodeRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function registerUserWithSms(CheckUserNationalCodeRequest $request)
    {
        $smsRegisterDTO = $request->createSmsRegisterDTO();
        if ($smsRegisterDTO->getFirstRequestContent()) {
            $this->smsRegisterService->createOrUpdateRegister($smsRegisterDTO);
            return response([], Response::HTTP_OK);
        }
        if ($smsRegisterDTO->getSecondRequestContent()) {
            $this->smsRegisterService->addBirthDate($smsRegisterDTO);
            return response([], Response::HTTP_OK);
        }
        $this->smsRegisterService->registerUser($smsRegisterDTO);
        return response([], Response::HTTP_OK);

    }
}