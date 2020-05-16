<?php

namespace Domains\NationalAuthentication\Services;




use Domains\NationalAuthentication\Services\Contracts\DTOs\NationalAuthenticationRequestDTO;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;

class NationalAuthenticationService
{


    public function verify(NationalAuthenticationRequestDTO $nationalAuthenticationDTO)
    {
        $userRegisterDTO = new UserRegisterInfoDTO();
        $mobile = $this->convertMobile($nationalAuthenticationDTO->getMobileNumber());
        $userRegisterDTO->setNationalCode($nationalAuthenticationDTO->getNationalCode())
            ->setName($nationalAuthenticationDTO->getName())
            ->setLastName($nationalAuthenticationDTO->getLastName())
            ->setDateOfBirth($nationalAuthenticationDTO->getBirthDate())
            ->setMobile($mobile)
            ->setPassword($mobile)
            ->setRoleType(config('user.client_role_type'))
            ->setRegisterType(config('user.user_register_type.by_sms'))
            ->setRoleStatus(config('user.user_role_active_status'));
        return $userRegisterDTO;
    }

    private function convertMobile(string $mobileNumber)
    {
        if (strlen($mobileNumber) == 10) {
            return '0' . $mobileNumber;
        }
        if (strlen($mobileNumber) == 11) {
            return $mobileNumber;
        }
        if ( strlen($mobileNumber) == 12) {
            $mobileNumber = '0' . substr($mobileNumber, 2);
            return $mobileNumber;
        }
        throw new \Exception(trans('smsRegister::response.validation.userPhoneNumber_regex'));
    }
}