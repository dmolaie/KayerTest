<?php


namespace Domains\Role\Repositories;

use Domains\Role\Enitites\Permission;
use Domains\Role\Entities\Role;
use Domains\Role\Services\Contracts\DTOs\PermissionRoleInfoDTO;
use Domains\Role\Services\Contracts\DTOs\PermissionRoleUserInfoDTO;
use Domains\User\Entities\User;
use Illuminate\Support\Facades\DB;

class RoleRepository
{
    protected $entityName = Role::class;

    public function getRoleByType(string $type, ?int $provinceId)
    {
        return $this->entityName::where('type', $type)
            ->when($provinceId, function ($query) use ($provinceId) {
                return $query->where('province_id', $provinceId);
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
            $user = User::find($permissionRoleInfoDTO->getUserId());
            $user->permissions()->wherePivot('role_id', '=', $permissionRoleInfoDTO->getRoleId())->sync([]);
            $user->permissions()->attach($permissionRoleInfoDTO->getPermission(), ['role_id' => $permissionRoleInfoDTO->getRoleId()], ['condition' => $permissionRoleInfoDTO->getCondition()]);
        });
    }

    public function getPermissionRoleUser(PermissionRoleUserInfoDTO $permissionRoleUserInfoDTO)
    {
        $user = User::find($permissionRoleUserInfoDTO->getUserId());
        return $user->permissions()->wherePivot('role_id', '=', $permissionRoleUserInfoDTO->getRoleId())->withPivot('role_id')->get()->groupBy('model');

    }

    public function getPermissionsList()
    {
        return Permission::get()->groupBy('model');
    }
}