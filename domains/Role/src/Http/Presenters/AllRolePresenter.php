<?php


namespace Domains\Role\Http\Presenters;


use Domains\Role\Services\Contracts\DTOs\RoleInfoDTO;

class AllRolePresenter
{

    public function transformMany($roleInfoDTOs): array
    {
        return array_map(function ($role) {
            return $this->transform($role);
        }, $roleInfoDTOs);
    }


    public function transform(RoleInfoDTO $role)
    {
        return [
            'id'       => $role->getId(),
            'name'     => $role->getName(),
            'label'    => $role->getLabel(),
            'type'     => $role->getType(),
            'province' => $role->getProvince(),
        ];

    }
}