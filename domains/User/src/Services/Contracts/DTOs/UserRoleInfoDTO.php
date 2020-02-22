<?php


namespace Domains\User\Services\Contracts\DTOs;


/**
 * Class UserRoleInfoDTO
 */
class UserRoleInfoDTO
{
    /**
     * @var int
     */
    protected $roleId;
    /**
     * @var string
     */
    protected $roleName;
    /**
     * @var string
     */
    protected $roleStatus;

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @param int $roleId
     * @return UserRoleInfoDTO
     */
    public function setRoleId(int $roleId): UserRoleInfoDTO
    {
        $this->roleId = $roleId;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoleName(): string
    {
        return $this->roleName;
    }

    /**
     * @param string $roleName
     * @return UserRoleInfoDTO
     */
    public function setRoleName(string $roleName): UserRoleInfoDTO
    {
        $this->roleName = $roleName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoleStatus(): string
    {
        return $this->roleStatus;
    }

    /**
     * @param string $roleStatus
     * @return UserRoleInfoDTO
     */
    public function setRoleStatus(string $roleStatus): UserRoleInfoDTO
    {
        $this->roleStatus = $roleStatus;
        return $this;
    }
}