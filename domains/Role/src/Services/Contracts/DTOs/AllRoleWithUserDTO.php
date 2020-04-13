<?php


namespace Domains\Role\Services\Contracts\DTOs;


/**
 * Class AllRoleWithUserDTO
 */
class AllRoleWithUserDTO
{
    /**
     * @var array
     */
    protected $allRoles;
    /**
     * @var array
     */
    protected $userRoleIds;

    /**
     * @return array
     */
    public function getAllRoles(): array
    {
        return $this->allRoles;
    }

    /**
     * @param array $allRoles
     * @return AllRoleWithUserDTO
     */
    public function setAllRoles(array $allRoles): AllRoleWithUserDTO
    {
        $this->allRoles = $allRoles;
        return $this;
    }

    /**
     * @return array
     */
    public function getUserRoleIds(): array
    {
        return $this->userRoleIds;
    }

    /**
     * @param array $userRoleIds
     * @return AllRoleWithUserDTO
     */
    public function setUserRoleIds(array $userRoleIds): AllRoleWithUserDTO
    {
        $this->userRoleIds = $userRoleIds;
        return $this;
    }

}