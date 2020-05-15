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
    )
    {

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
            if (!$this->checkSmsRegisterData($smsRegisterDTO, $nationalCode)) {
                return;
            }
            $nationalAuthenticationDTO
                ->setNationalCode($nationalCode->national_code)
                ->setBirthDate($nationalCode->birth_date)
                ->setLastName($smsRegisterDTO->getLastName())
                ->setName($smsRegisterDTO->getName())
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
                    'content' => $smsRegisterDTO->getContent(),
                    'mobile' => $smsRegisterDTO->getMobileNumber(),
                    'secondRequestContent' => $smsRegisterDTO->getSecondRequestContent(),
                    'message' => $exception->getMessage()
                ]);
            event(new TemporalLogEvent($temporalLog));

        }
        return;
    }

    /**
     * @param SmsRegisterDTO $smsRegisterDTO
     * @param $nationalCode
     * @return bool
     */
    protected function checkSmsRegisterData(SmsRegisterDTO $smsRegisterDTO, $nationalCode): bool
    {
        if (!$nationalCode->national_code) {
            $smsRegisterDTO->setContent(
                (trans('smsRegister::response.send_national_code'))
            );
            event(new SmsRegisterEvent($smsRegisterDTO));
            return false;
        }
        if (!$nationalCode->birth_date) {
            $smsRegisterDTO->setContent(
                (trans('smsRegister::response.send_birth_date'))
            );
            event(new SmsRegisterEvent($smsRegisterDTO));
            return false;
        }
        return true;
    }

    /**
     * @param UserLoginDTO $userInfoDTO
     * @return string
     */
    private function makeMessageContent(UserLoginDTO $userInfoDTO)
    {
        return
            $userInfoDTO->getName() . ' ' . $userInfoDTO->getLastName() .'،'
            . ' ' . PHP_EOL .
            trans('smsRegister::response.ehda_card_address')
            . ' ' . PHP_EOL .
            route('social-url-secound', $userInfoDTO->getRole()->pivot->pivotParent->uuid)
            . ' ' . PHP_EOL .
            trans('smsRegister::response.card_id')
            . ' ' . $userInfoDTO->getCardId()
            . ' ' . PHP_EOL .
            trans('smsRegister::response.site');

    }

    public function addBirthDate(SmsRegisterDTO $smsRegisterDTO)
    {
        try {
            $this->smsRegisterRepository
                ->getUserNationalCode($smsRegisterDTO);
            $smsRegisterDTO->setContent(trans('smsRegister::response.send_name_lastName'));
            event(new SmsRegisterEvent($smsRegisterDTO));
            return;
        } catch (ModelNotFoundException $exception) {
            $smsRegisterDTO->setContent(
                (trans('smsRegister::response.send_national_code'))
            );
            event(new SmsRegisterEvent($smsRegisterDTO));
        }
    }
}