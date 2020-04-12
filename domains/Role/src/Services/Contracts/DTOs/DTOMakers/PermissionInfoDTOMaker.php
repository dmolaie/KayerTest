<?php

namespace Domains\Role\Services\Contracts\DTOs\DTOMakers;


use Domains\Role\Services\Contracts\DTOs\PermissionRoleUserInfoDTO;

class PermissionInfoDTOMaker
{
    public function convertMany($permissionsRoleUser)
    {
        return $permissionsRoleUser->map(function ($permissionRoleUser) {
            return $this->convert($permissionRoleUser);
        })->toArray();
    }

    public function convert($permission): array
    {
        $permissionRoleUser = new PermissionRoleUserInfoDTO();
        $permission = $this->getPermissions($permission, $permissionRoleUser);
        return $permission->toArray();

    }

    private function getPermissions($permission, $permissionRoleUser)
    {
        return $permission->map(function ($permission) use ($permissionRoleUser) {
           return
                [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'label' => $permission->label,
                ];
        });
    }
}