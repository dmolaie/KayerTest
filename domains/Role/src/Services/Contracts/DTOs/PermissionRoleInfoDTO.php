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
    protected $permission;
    /**
     * @var string
     */
    protected $condition;

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

    /**
     * @return array
     */
    public function getPermission(): array
    {
        return $this->permission;
    }

    /**
     * @param array $permission
     * @return PermissionRoleInfoDTO
     */
    public function setPermission(array $permission): PermissionRoleInfoDTO
    {
        $this->permission = $permission;
        return $this;
    }

    /**
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * @param string $condition
     * @return PermissionRoleInfoDTO
     */
    public function setCondition(string $condition): PermissionRoleInfoDTO
    {
        $this->condition = $condition;
        return $this;
    }

}