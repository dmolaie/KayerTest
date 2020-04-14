<?php


namespace Domains\User\Services\Contracts\DTOs\DTOMakers;


use Domains\User\Entities\User;
use Domains\User\Services\Contracts\DTOs\UserAdditionalInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserFullInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserRoleInfoDTO;

class UserRoleInfoDTOMaker
{
    public function convertMany($user)
    {

            return $this->convert($user->roles);
    }


    private function convert($roles)
    {
        return $roles->map(function ($role) {
            $userRoleInfoDTO = new UserRoleInfoDTO();
            $userRoleInfoDTO->setId($role->id)
                ->setLabel($role->label)
                ->setType($role->type)
                ->setStatus($role->pivot->status)
                ->setName($role->name);

            return $userRoleInfoDTO;
        })->toArray();
    }



}