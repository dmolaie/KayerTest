<?php


namespace Domains\Role\Http\Presenters;


use Domains\Role\Services\Contracts\DTOs\AllRoleWithUserDTO;

class AllRoleWithUserPresenter
{

    public function transform(AllRoleWithUserDTO $allRoleWithUserDTO):array
    {
        return [
            'user_role_ids'=>$allRoleWithUserDTO->getUserRoleIds(),
            'roles'=>$this->getRoleInfo($allRoleWithUserDTO->getAllRoles())
        ];
    }


    private function getRoleInfo(array $allRoles)
    {
        return array_map(function ($role){
            return [
                'id'=>$role->getId(),
                'name'=>$role->getName(),
                'label'=>$role->getLabel(),
                'type'=>$role->getType(),
                'province'=>$role->getProvince(),
            ];
        },$allRoles);
    }
}