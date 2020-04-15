<?php


namespace Domains\Role\Services\Contracts\DTOs;


/**
 * Class RoleInfoDTO
 */
class PermissionRoleInfoDTO
{
    /**
     * @var integer
     */
    protected $userId;

    /**
     * @var integer
     */
    protected $roleId;
    /**
     * @var array
     */
    protected $permissionData;

    /**
     * @return object
     */
    public function getPermissionData(): array
    {
        return $this->permissionData;
    }

    /**
     * @param array $permissionData
     * @return PermissionRoleInfoDTO
     */
    public function setPermissionData(array $permissionData): PermissionRoleInfoDTO
    {
        $this->permissionData = $permissionData;
        return $this;
    }


    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return PermissionRoleInfoDTO
     */
    public function setUserId(int $userId): PermissionRoleInfoDTO
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @param int $roleId
     * @return PermissionRoleInfoDTO
     */
    public function setRoleId(int $roleId): PermissionRoleInfoDTO
    {
        $this->roleId = $roleId;
        return $this;
    }

}