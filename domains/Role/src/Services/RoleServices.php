<?php

namespace Domains\Role\Services;


use Domains\Locations\Repositories\CityRepository;
use Domains\Locations\Transformers\CityTransformer;

class RoleServices
{

    public function __construct()
    {
    }

    public function getRoleIdWithRoleName(string $roleName): int
    {
        return config('role.roles.' . $roleName . '.id');
    }

    public function getAll()
    {
    }

    public function find(int $id)
    {
    }

}