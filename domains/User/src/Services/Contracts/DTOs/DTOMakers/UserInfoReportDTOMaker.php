<?php


namespace Domains\User\Services\Contracts\DTOs\DTOMakers;


use Domains\User\Services\Contracts\DTOs\UserInfoReportDTO;

class UserInfoReportDTOMaker
{
    public function convertMany($users)
    {
        return $users->map(function ($user) {
            return $this->convert($user);
        })->toArray();
    }

    public function convert($user)
    {
        $userFullInfoDTO = new UserInfoReportDTO();
        $userFullInfoDTO
            ->setNationalCode($user->national_code)
            ->setName($user->name)
            ->setLastName($user->last_name)
            ->setDateOfBirth(strtotime($user->date_of_birth))
            ->setMobile($user->mobile)
            ->setEmail($user->email);
        return $userFullInfoDTO;
    }
}