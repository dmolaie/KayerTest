<?php


namespace Domains\SmsRegister\Services;


use Domains\NationalAuthentication\Services\Contracts\DTOs\NationalAuthenticationRequestDTO;
use Domains\NationalAuthentication\Services\NationalAuthenticationService;
use Domains\SmsRegister\Events\SmsRegisterEvent;
use Domains\SmsRegister\Events\TemporalLogEvent;
use Domains\SmsRegister\Repositories\SmsRegisterRepository;
use Domains\SmsRegister\Services\Contracts\DTOs\SmsRegisterDTO;
use Domains\SmsRegister\Services\Contracts\DTOs\TemporalLogDTO;
use Domains\User\Exceptions\UserUnAuthorizedException;
use Domains\User\Services\Contracts\DTOs\UserLoginDTO;
use Domains\User\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $this->smsRegisterRepository
            ->createOrUpdateRegister($smsRegisterDTO);
        $smsRegisterDTO->setContent(trans('smsRegister::response.send_birth_date'));
        event(new SmsRegisterEvent($smsRegisterDTO));
        return;
    }

    /**
     * @param SmsRegisterDTO $smsRegisterDTO
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
                ->setMobileNumber($smsRegisterDTO->getMobileNumber());
            $userRegisterDTO = $this->nationalAuthenticationService->verify($nationalAuthenticationDTO);
            $userInfoDTO = $this->userService->register($userRegisterDTO);
            $smsRegisterDTO->setContent($this->makeMessageContent($userInfoDTO));
            event(new SmsRegisterEvent($smsRegisterDTO));
        } catch (ModelNotFoundException $exception) {
            $smsRegisterDTO->setContent(
                (trans('smsRegister::response.send_national_code'))
            );
            event(new SmsRegisterEvent($smsRegisterDTO));
        } catch (UserUnAuthorizedException $exception) {
            $smsRegisterDTO->setContent(
                (trans('smsRegister::response.validation.national_code_unique'))
            );
            event(new SmsRegisterEvent($smsRegisterDTO));
        } catch (\Exception $exception) {

            $temporalLog = new TemporalLogDTO();
            $temporalLog->setLogTitle('register user by sms failed')
                ->setLogData([
                    'content'              => $smsRegisterDTO->getContent(),
                    'mobile'               => $smsRegisterDTO->getMobileNumber(),
                    'secondRequestContent' => $smsRegisterDTO->getSecondRequestContent(),
                    'message'              => $exception->getMessage()
                ]);
            event(new TemporalLogEvent($temporalLog));

        }
        return;
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
            config('app.url')
            . ' ' . PHP_EOL .
            trans('smsRegister::response.card_id')
            . ' ' . $userInfoDTO->getCardId();
    }
}