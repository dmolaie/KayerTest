<?php


namespace Domains\User\Services;


use Domains\Notify\Services\Contracts\DTOs\SendSmsDTO;
use Domains\Notify\Services\SmsSenderService;
use Domains\User\Exceptions\PasswordResetMobileValidationException;
use Domains\User\Repositories\PasswordResetRepository;
use Domains\User\Services\Contracts\DTOs\DTOMakers\ResetPasswordDTO;
use Domains\User\Services\Contracts\DTOs\UserBriefInfoDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class PasswordResetService
 */
class PasswordResetService
{

    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var PasswordResetRepository
     */
    private $passwordResetRepository;
    /**
     * @var SmsSenderService
     */
    private $smsSenderService;

    /**
     * PasswordResetService constructor.
     * @param UserService $userService
     * @param PasswordResetRepository $passwordResetRepository
     * @param SmsSenderService $smsSenderService
     */
    public function __construct(
        UserService $userService,
        PasswordResetRepository $passwordResetRepository,
        SmsSenderService $smsSenderService
    ) {
        $this->userService = $userService;
        $this->passwordResetRepository = $passwordResetRepository;
        $this->smsSenderService = $smsSenderService;
    }

    /**
     * @param string $nationalCode
     * @param string $mobile
     * @throws PasswordResetMobileValidationException
     */
    public function generateToken(string $nationalCode, string $mobile)
    {
        $userInfo = $this->getUserInfo($nationalCode);
        if ($mobile == $userInfo->getMobile()) {
            $token = $this->makeToken($nationalCode, $mobile);
            $this->smsSenderService->sendSms($this->makeSmsDTO($token, $mobile));
            return;
        }
        throw new PasswordResetMobileValidationException(trans('user::response.mobile_validation'));
    }

    /**
     * @param string $nationalCode
     * @return Contracts\DTOs\UserBriefInfoDTO
     */
    protected function getUserInfo(string $nationalCode): UserBriefInfoDTO
    {
        $userInfo = $this->userService->getUserInfoByNationalCode($nationalCode);
        if (!$userInfo) {
            throw new ModelNotFoundException(trans('user::response.user_not_found'));
        }
        return $userInfo;
    }

    /**
     * @param string $nationalCode
     * @param string $mobile
     * @return int
     */
    protected function makeToken(string $nationalCode, string $mobile): int
    {
        $passwordResetToken = $this->passwordResetRepository->findLessThanTwoMinuteToken($nationalCode);
        if (!$passwordResetToken) {
            $passwordResetToken = $this->passwordResetRepository->create($nationalCode, $mobile);
        }
        return $passwordResetToken->token;
    }

    /**
     * @param int $token
     * @param string $mobile
     * @return SendSmsDTO
     */
    private function makeSmsDTO(int $token, string $mobile): SendSmsDTO
    {
        $sendSmsDTO = new SendSmsDTO();
        $sendSmsDTO->setMobileNumber($mobile)
            ->setContent(trans('user::response.passwordResetToken') . $token);
        return $sendSmsDTO;
    }

    /**
     * @param ResetPasswordDTO $resetPasswordDTO
     */
    public function changePassword(ResetPasswordDTO $resetPasswordDTO)
    {
        $this->validateToken($resetPasswordDTO);
        $userInfo = $this->getUserInfo($resetPasswordDTO->getNationalCode());
        $this->userService->changePasswordByAdmin($userInfo->getId(),$resetPasswordDTO->getPassword());
        return;

    }

    public function validateToken(ResetPasswordDTO $resetPasswordDTO)
    {
        $this->passwordResetRepository->findNotExpireToken($resetPasswordDTO);
        return;
    }
}