<?php

namespace Domains\Role\Services;


use Domains\Locations\Repositories\CityRepository;
use Domains\Locations\Transformers\CityTransformer;
use Domains\Role\Repositories\RoleRepository;
use Domains\Role\Services\Contracts\DTOs\DTOMakers\PermissionInfoDTOMaker;
use Domains\Role\Services\Contracts\DTOs\DTOMakers\PermissionUserInfoDTOMaker;
use Domains\Role\Services\Contracts\DTOs\DTOMakers\RoleInfoDTOMaker;
use Domains\Role\Services\Contracts\DTOs\PermissionRoleInfoDTO;
use Domains\Role\Services\Contracts\DTOs\PermissionRoleUserInfoDTO;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoleServices
{

    /**
     * @var RoleRepository
     */
    private $roleRepository;
    /**
     * @var RoleInfoDTOMaker
     */
    private $roleInfoDTOMaker;


    public function __construct(
        RoleRepository $roleRepository,
        RoleInfoDTOMaker $roleInfoDTOMaker
    ) {
        $this->roleRepository = $roleRepository;
        $this->roleInfoDTOMaker = $roleInfoDTOMaker;
    }

    public function getRoleWithRoleType(string $roleType, ?int $provinceId = null)
    {
        $roles = $this->roleRepository->getRoleByType($roleType, $provinceId);
        if ($role = $roles->first()) {
            return $this->roleInfoDTOMaker->convert($role);
        }
        throw new ModelNotFoundException();
    }

    public function getRoleWithId(int $roleId)
    {
        $role = $this->roleRepository->getRoleById($roleId);
        return $this->roleInfoDTOMaker->convert($role);
    }

    public function assignPermissionRoleToUser(PermissionRoleInfoDTO $permissionRoleInfoDTO)
    {
        return $this->roleRepository->assignPermissionRole($permissionRoleInfoDTO);
    }

    public function getPermissionRoleToUser(PermissionRoleUserInfoDTO $permissionRoleUserInfoDTO)
    {
        $permissionUserInfoDTO = new PermissionUserInfoDTOMaker();
        $permissionInfoDTO = new PermissionInfoDTOMaker();
        $permissionList = $this->roleRepository->getPermissionsList();
        $permissionsRoleUser = $this->roleRepository->getPermissionRoleUser($permissionRoleUserInfoDTO);
        $permissions['list'] = $permissionInfoDTO->convertMany($permissionList);
        $permissions['user'] = $permissionUserInfoDTO->convertMany($permissionsRoleUser);
        return $permissions;
    }

    public function getRoles()
    {
        return $this->roleInfoDTOMaker->convertMany(
            $this->roleRepository->getAllRoles());
    }

}