<?php


namespace Domains\News\Http\Presenters;


use Domains\Role\Services\Contracts\DTOs\PermissionRoleUserInfoDTO;

class PermissionRoleUserPresenter
{
    public function transformMany(array $permissionUserRole): array
    {
        $permissionUser = $permissionUserRole['user'];
        $permissionList = $permissionUserRole['list'];
        $permissionUserList['list'] = array_map(function ($permissionList) {
            return $this->transform($permissionList);
        }, $permissionList);

        $permissionUserList['user'] = array_map(function ($permissionUser) {
                return $this->transform($permissionUser);
        }, $permissionUser);
;
        return $permissionUserList;
    }

    public function transform($permissionRoleUserInfoDTO):array
    {
        $permissionRoleUser = new PermissionRoleUserInfoDTO();
        return $this->getPermissions($permissionRoleUserInfoDTO, $permissionRoleUser);
    }

    private function getPermissions($permission,$permissionRoleUser)
    {
        return array_map(function ($permission) use ($permissionRoleUser) {
              return $permission;
        },$permission);
    }
}