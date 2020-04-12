<?php


namespace Domains\Role\Services\Contracts\DTOs;


/**
 * Class RoleInfoDTO
 */
class PermissionInfoDTO
{
    /**
     * @var array
     */
    protected $permissionsList;

    /**
     * @return array
     */
    public function getPermissionsList(): array
    {
        return $this->permissionsList;
    }

    /**
     * @param array $permissionsList
     * @return PermissionInfoDTO
     */
    public function setPermissionsList(array $permissionsList):PermissionInfoDTO
    {
        $this->permissionsList = $permissionsList;
        return $this;
    }
}