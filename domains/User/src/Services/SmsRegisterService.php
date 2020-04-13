<?php


namespace Domains\User\Services;


use Domains\User\Repositories\SmsRegisterRepository;
use Domains\User\Services\Contracts\DTOs\SmsRegisterDTO;

class SmsRegisterService
{

    /**
     * @var SmsRegisterRepository
     */
    private $smsRegisterRepository;

    public function __construct(SmsRegisterRepository $smsRegisterRepository)
    {

        $this->smsRegisterRepository = $smsRegisterRepository;
    }

    public function createOrUpdateRegister(SmsRegisterDTO $smsRegisterDTO)
    {
        $this->smsRegisterRepository->createOrUpdateRegister($smsRegisterDTO);

    }
}