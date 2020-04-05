<?php

namespace Domains\Role\Services;


use Domains\Locations\Repositories\CityRepository;
use Domains\Locations\Transformers\CityTransformer;
use Domains\Role\Repositories\RoleRepository;
use Domains\Role\Services\Contracts\DTOs\DTOMakers\RoleInfoDTOMaker;

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

    public function __construct(RoleRepository $roleRepository, RoleInfoDTOMaker $roleInfoDTOMaker)
    {
        $this->roleRepository = $roleRepository;
        $this->roleInfoDTOMaker = $roleInfoDTOMaker;
    }

    public function getRoleWithRoleType(string $roleType,?int $provinceId=null)
    {
        $role = $this->roleRepository->getRoleByType($roleType, $provinceId);
        return $this->roleInfoDTOMaker->convert($role);
    }

    public function getRoleWithId(int $roleId)
    {
        $role = $this->roleRepository->getRoleById($roleId);
        return $this->roleInfoDTOMaker->convert($role);
    }

}