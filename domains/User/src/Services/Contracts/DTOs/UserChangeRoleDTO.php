<?php


namespace Domains\User\Services\Contracts\DTOs;


/**
 * Class UserChangeRoleDTO
 */
class UserChangeRoleDTO
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
     * @var string
     */
    protected $roleStatus;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return UserChangeRoleDTO
     */
    public function setUserId(int $userId): UserChangeRoleDTO
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
     * @return UserChangeRoleDTO
     */
    public function setRoleId(int $roleId): UserChangeRoleDTO
    {
        $this->roleId = $roleId;
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
     * @return UserChangeRoleDTO
     */
    public function setRoleStatus(string $roleStatus): UserChangeRoleDTO
    {
        $this->roleStatus = $roleStatus;
        return $this;
    }

}