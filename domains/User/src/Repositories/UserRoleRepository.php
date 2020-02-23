<?php


namespace Domains\User\Repositories;

use Domains\User\Entities\UserRole;

class UserRoleRepository
{
    protected $entityName = UserRole::class;

    public function createOrUpdateUserRole(int $userId, int $roleId, string $status)
    {
        return $this->entityName::updateOrCreate(
            ['user_id' => $userId, 'role_id' => $roleId],
            ['status' => $status]
        );
    }

    public function allActiveRoleByUserId(int $userId)
    {
        return $this->entityName::where('user_id', $userId)
            ->where('status', config('user.user_role_active_status'))
            ->orderBy('role_id')
            ->get();
    }

    public function changeUserRoleStatus(int $id, string $status)
    {
        return $this->entityName::where('id', $id)
            ->update(['status' => $status]);
    }

    public function findByUserAndRoleId(int $userId, int $roleId)
    {
        return $this->entityName::where('user_id', $userId)
            ->where('role_id', $roleId)->get();
    }

    public function hasActiveAdminRole(int $userId): bool
    {

        return $this->entityName::where('user_id', $userId)
            ->where('role_id', config('user.user_admin_role_id'))
            ->where('status', config('user.user_role_active_status'))
            ->exists();
    }
}