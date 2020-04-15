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

    public function getRoleByType(string $type, ?int $provinceId=null)
    {
        return $this->entityName::where('type', $type)
            ->when($provinceId, function ($query) use ($provinceId) {
                return $query->where('province_id', $provinceId);
            })
            ->get();
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
            foreach ($permissionRoleInfoDTO->getPermissionData() as $permissionData){
                $user->permissions()->attach($permissionData['permission_id'],[ 'role_id' => $permissionRoleInfoDTO->getRoleId(), 'condition' => json_encode($permissionData['permission_condition']) ]);
            }
        });
    }

    public function getPermissionRoleUser(PermissionRoleUserInfoDTO $permissionRoleUserInfoDTO)
    {
        $user = User::find($permissionRoleUserInfoDTO->getUserId());
        return $user->permissions()->wherePivot('role_id', '=', $permissionRoleUserInfoDTO->getRoleId())->withPivot('role_id','condition')->get()->groupBy('model');

    }

    public function getPermissionsList()
    {
        return Permission::get()->groupBy('model');
    }

    public function getUserRoleByType($type, int $userId)
    {
        return $this->entityName::where('type', $type)->
        whereHas('users',
            function ($q) use ($userId) {
                $q->where('users.id', '=', $userId);

            })->get();
    }

    public function getAllRoles()
    {
        return $this->entityName::all();
    }
}