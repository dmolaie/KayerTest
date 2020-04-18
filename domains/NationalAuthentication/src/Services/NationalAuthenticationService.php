<?php

namespace Domains\NationalAuthentication\Services;




use Domains\NationalAuthentication\Services\Contracts\DTOs\NationalAuthenticationRequestDTO;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;

class NationalAuthenticationService
{


    public function verify(NationalAuthenticationRequestDTO $nationalAuthenticationDTO)
    {
        $userRegisterDTO = new UserRegisterInfoDTO();
        $userRegisterDTO->setNationalCode($nationalAuthenticationDTO->getNationalCode())
            ->setGender(config('user.user_genders')[1])
            ->setName('مطهره')
            ->setLastName('قتبس')
            ->setFatherName('father_name')
            ->setProvinceOfBirth(1)
            ->setCityOfBirth(1)
            ->setDateOfBirth($nationalAuthenticationDTO->getBirthDate())
            ->setMobile($nationalAuthenticationDTO->getMobileNumber())
            ->setCurrentCityId(1)
            ->setCurrentProvinceId(1)
            ->setPassword($nationalAuthenticationDTO->getMobileNumber())
            ->setRoleType(config('user.client_role_type'))
            ->setRoleStatus(config('user.user_role_active_status'));
        return $userRegisterDTO;
    }
}