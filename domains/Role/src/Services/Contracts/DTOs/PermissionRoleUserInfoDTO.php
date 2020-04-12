<?php


namespace Domains\Role\Services\Contracts\DTOs;


/**
 * Class RoleInfoDTO
 */
class PermissionRoleUserInfoDTO
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
    protected $permissions;

    /**
     * @var array
     */
    protected $entity;


    /**
     * @return string
     */
    public function getEntity(): string
    {
        return $this->entity;
    }

    /**
     * @param string $entity
     * @return PermissionRoleUserInfoDTO
     */
    public function setEntity(string $entity): PermissionRoleUserInfoDTO
    {
        $this->entity = $entity;
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
     * @return PermissionRoleUserInfoDTO
     */
    public function setUserId(int $userId): PermissionRoleUserInfoDTO
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
     * @return PermissionRoleUserInfoDTO
     */
    public function setRoleId(int $roleId): PermissionRoleUserInfoDTO
    {
        $this->roleId = $roleId;
        return $this;
    }

    /**
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * @param array $permissions
     * @return PermissionRoleUserInfoDTO
     */
    public function setPermissions(array $permissions): PermissionRoleUserInfoDTO
    {
        $this->permissions = $permissions;
        return $this;
    }


}