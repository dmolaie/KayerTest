<?php


namespace Domains\User\Services\Contracts\DTOs\DTOMakers;


use Domains\User\Entities\UserRole;
use Domains\User\Services\Contracts\DTOs\UserRoleInfoDTO;

class UserRoleDTOMaker
{
    public function convertMany($userRoles)
    {
        return $userRoles->map(function ($userRole) {
            return $this->convert($userRole);
        })->toArray();
    }

    public function convert(UserRole $userRole): UserRoleInfoDTO
    {
        $userRoleDTO = new UserRoleInfoDTO();
        $userRoleDTO->setRoleId($userRole->role_id)
            ->setRoleStatus($userRole->status)
            ->setRoleName($userRole->role->name);
        return $userRoleDTO;
    }
}