<?php


namespace Domains\Role\Repositories;

use Domains\Role\Entities\Role;
use Domains\Role\Services\Contracts\DTOs\PermissionRoleInfoDTO;
use Illuminate\Support\Facades\DB;

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

    public function assignPermissionRole(PermissionRoleInfoDTO $permissionRoleInfoDTO)
    {
        return DB::transaction(function () use ($permissionRoleInfoDTO) {
            $role = Role::find($permissionRoleInfoDTO->getRoleId());
            $role->permissions()->sync($permissionRoleInfoDTO->getPermission(), ['user_id' => $permissionRoleInfoDTO->getUserId()], ['condition' => $permissionRoleInfoDTO->getCondition()]);
        });
    }

}