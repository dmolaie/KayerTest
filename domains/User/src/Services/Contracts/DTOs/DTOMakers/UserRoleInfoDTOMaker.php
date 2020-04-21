<?php


namespace Domains\User\Services\Contracts\DTOs\DTOMakers;


use Domains\User\Services\Contracts\DTOs\UserRoleInfoDTO;

class UserRoleInfoDTOMaker
{
    public function convertMany($roles)
    {
        return $roles->map(function ($role) {
            return $this->convert($role);
        })->toArray();
    }


    public function convert($role)
    {
        $userRoleInfoDTO = new UserRoleInfoDTO();
        $userRoleInfoDTO->setId($role->id)
            ->setLabel($role->label)
            ->setType($role->type)
            ->setStatus($role->pivot->status)
            ->setName($role->name);

        return $userRoleInfoDTO;
    }


}