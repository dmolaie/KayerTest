<?php


namespace Domains\Role\Repositories;

use Domains\Role\Entities\Role;

class RoleRepository
{
    protected $entityName = Role::class;

    public function getRoleByType(string $type, ?int $provinceId)
    {
        return $this->entityName::where('type', $type)
            ->when($provinceId, function ($query) use ($provinceId){
                return $query->where('province_id',$provinceId);
            })
            ->firstOrFail();
    }

    public function getRoleById(int $roleId)
    {
        return $this->entityName::findOrFail($roleId);
    }

}