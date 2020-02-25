<?php


namespace Domains\User\Services\Contracts\DTOs\DTOMakers;


use Domains\User\Entities\User;
use Domains\User\Services\Contracts\DTOs\UserAdditionalInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserBriefInfoDTO;

class UserBriefInfoDTOMaker
{

    public function convertMany($users, UserAdditionalInfoDTO $userAdditionalInfo)
    {
        return $users->map(function ($user) use ($userAdditionalInfo) {
            return $this->convert($user, $userAdditionalInfo);
        })->toArray();
    }

    public function convert(User $user, UserAdditionalInfoDTO $userAdditionalInfo): UserBriefInfoDTO
    {
        $userBriefInfoDTO = new UserBriefInfoDTO();
        $userBriefInfoDTO->setId($user->id)
            ->setName($user->name)
            ->setLastName($user->last_name)
            ->setNationalCode($user->national_code)
            ->setIdentityNumber($user->identity_number)
            ->setCreatedAt(strtotime($user->created_at))
            ->setCurrentCity($userAdditionalInfo->getCities()[$user->current_city_id])
            ->setCurrentProvince($userAdditionalInfo->getProvinces()[$user->current_province_id])
            ->setRoles($this->getRoles($user));

        return $userBriefInfoDTO;

    }

    private function getRoles(User $user)
    {
        return $user->roles->map(function ($role) {

            return [
                'name'   => $role->name,
                'status' => $role->pivot->status
            ];
        })->toArray();
    }
}