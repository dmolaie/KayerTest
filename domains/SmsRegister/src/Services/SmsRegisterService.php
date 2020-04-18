<?php


namespace Domains\SmsRegister\Services;


use Domains\NationalAuthentication\Services\Contracts\DTOs\NationalAuthenticationRequestDTO;
use Domains\NationalAuthentication\Services\NationalAuthenticationService;
use Domains\SmsRegister\Events\SmsRegisterEvent;
use Domains\SmsRegister\Repositories\SmsRegisterRepository;
use Domains\SmsRegister\Services\Contracts\DTOs\SmsRegisterDTO;
use Domains\User\Services\Contracts\DTOs\UserLoginDTO;
use Domains\User\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use mysql_xdevapi\Exception;

/**
 * Class SmsRegisterService
 */
class SmsRegisterService
{

    /**
     * @var SmsRegisterRepository
     */
    private $smsRegisterRepository;
    /**
     * @var NationalAuthenticationService
     */
    private $nationalAuthenticationService;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * SmsRegisterService constructor.
     * @param SmsRegisterRepository $smsRegisterRepository
     * @param UserService $userService
     * @param NationalAuthenticationService $nationalAuthenticationService
     */
    public function __construct(
        SmsRegisterRepository $smsRegisterRepository,
        UserService $userService,
        NationalAuthenticationService $nationalAuthenticationService
    ) {

        $this->smsRegisterRepository = $smsRegisterRepository;
        $this->nationalAuthenticationService = $nationalAuthenticationService;
        $this->userService = $userService;
    }

    /**
     * @param SmsRegisterDTO $smsRegisterDTO
     */
    public function createOrUpdateRegister(SmsRegisterDTO $smsRegisterDTO)
    {
        return $this->smsRegisterRepository
            ->createOrUpdateRegister($smsRegisterDTO);
    }

    /**
     * @param SmsRegisterDTO $smsRegisterDTO
     * @throws \Domains\User\Exceptions\UserDoseNotHaveActiveRole
     * @throws \Domains\User\Exceptions\UserUnAuthorizedException
     */
    public function registerUser(SmsRegisterDTO $smsRegisterDTO)
    {
        try {
            $nationalCode = $this->smsRegisterRepository
                ->getUserNationalCode($smsRegisterDTO);
            $nationalAuthenticationDTO = new NationalAuthenticationRequestDTO();
            $nationalAuthenticationDTO
                ->setNationalCode($nationalCode)
                ->setBirthDate($smsRegisterDTO->getBirthDate())
                ->setMobileNumber($smsRegisterDTO->getBirthDate());
            $userRegisterDTO = $this->nationalAuthenticationService->verify($nationalAuthenticationDTO);
            $userInfoDTO = $this->userService->register($userRegisterDTO);
            $smsRegisterDTO->setContent($this->makeMessageContent($userInfoDTO));
            event(new SmsRegisterEvent($smsRegisterDTO));
        } catch (Exception $exception) {
            // TODO add log
        }

    }

    /**
     * @param UserLoginDTO $userInfoDTO
     * @return string
     */
    private function makeMessageContent(UserLoginDTO $userInfoDTO)
    {
        return
            trans('smsRegister::response.gender_' . $userInfoDTO->getGender())
            . ' ' .
            $userInfoDTO->getName() . ' ' . $userInfoDTO->getLastName()
            . ' ' .
            trans('smsRegister::response.has_ehda_card')
            . ' ' . PHP_EOL .
            trans('smsRegister::response.ehda_card_address')
            . ' ' . PHP_EOL .
            'http://dev.ehdacenter.io/sms-register/v1/test'
            . ' ' . PHP_EOL .
            trans('smsRegister::response.card_id')
            . ' ' . $userInfoDTO->getCardId();
    }
}