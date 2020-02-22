<?php


namespace Domains\User\Services;


use Domains\User\Repositories\UserRoleRepository;
use Domains\User\Services\Contracts\DTOs\DTOMakers\UserRoleDTOMaker;

class UserRoleService
{
    /**
     * @var UserRoleRepository
     */
    private $userRoleRepository;
    /**
     * @var UserRoleDTOMaker
     */
    private $userRoleDTOMaker;

    public function __construct(UserRoleRepository $userRoleRepository, UserRoleDTOMaker $userRoleDTOMaker)
    {

        $this->userRoleRepository = $userRoleRepository;
        $this->userRoleDTOMaker = $userRoleDTOMaker;
    }

    public function createOrUpdateUserRole(
        int $userId,
        int $roleId,
        string $status
    ): array {
        $this->userRoleRepository->
        createOrUpdateUserRole($userId, $roleId, $status);
        $allUserRoles = $this->userRoleRepository
            ->allActiveRoleByUserId($userId);
        return $this->userRoleDTOMaker->convertMany($allUserRoles);
    }

    public function getUserActiveRoles(int $userId):array
    {
        $allUserRoles = $this->userRoleRepository
            ->allActiveRoleByUserId($userId);
        return $this->userRoleDTOMaker->convertMany($allUserRoles);
    }
}