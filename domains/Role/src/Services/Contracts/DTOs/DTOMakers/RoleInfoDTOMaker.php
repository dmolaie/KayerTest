<?php


namespace Domains\Role\Services\Contracts\DTOs\DTOMakers;


use Domains\Location\Entities\Province;
use Domains\Role\Entities\Role;
use Domains\Role\Services\Contracts\DTOs\RoleInfoDTO;

class RoleInfoDTOMaker
{

    public function convertMany($roles)
    {
        return $roles->map(function ($role) {
            return $this->convert($role);
        })->toArray();
    }

    public function convert(Role $role): RoleInfoDTO
    {
        $roleInfoDTO = new RoleInfoDTO();
        $roleInfoDTO->setId($role->id)
            ->setName($role->name)
           ->setType($role->type)
            ->setLabel($role->label)
            ->setProvince($role->province?
                $this->getCurrentProvinceInfo($role->province):null);

        return $roleInfoDTO;

    }


    private function getCurrentProvinceInfo(Province $province)
    {

        return [
            'name' => $province->name,
            'id'   => $province->id,
            'slug' => $province->slug
        ];
    }

}