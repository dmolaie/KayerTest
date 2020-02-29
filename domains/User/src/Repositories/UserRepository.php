<?php


namespace Domains\User\Repositories;

use Domains\User\Entities\User;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;

class UserRepository
{
    protected $entityName = User::class;

    public function createNewUser(UserRegisterInfoDTO $userRegisterInfoDTO): User
    {
        $user = new $this->entityName;
        $user->name = $userRegisterInfoDTO->getName();
        $user->email = $userRegisterInfoDTO->getEmail();
        $user->password = bcrypt($userRegisterInfoDTO->getPassword());
        $user->address_of_obtaining_degree = $userRegisterInfoDTO->getAddressOfObtainingDegree();
        $user->last_education_degree = $userRegisterInfoDTO->getLastEducationalDegree();
        $user->educational_field = $userRegisterInfoDTO->getEducationalField();
        $user->job_title = $userRegisterInfoDTO->getJobTitle();
        $user->marital_status = $userRegisterInfoDTO->getMaritalStatus();
        $user->identity_number = $userRegisterInfoDTO->getIdentityNumber();
        $user->city_of_birth = $userRegisterInfoDTO->getCityOfBirth();
        $user->province_of_birth = $userRegisterInfoDTO->getProvinceOfBirth();
        $user->essential_mobile = $userRegisterInfoDTO->getEssentialMobile();
        $user->city_of_work = $userRegisterInfoDTO->getCityOfWork();
        $user->province_of_work = $userRegisterInfoDTO->getProvinceOfWork();
        $user->phone = $userRegisterInfoDTO->getPhone();
        $user->current_address = $userRegisterInfoDTO->getCurrentAddress();
        $user->current_city_id = $userRegisterInfoDTO->getCurrentCityId();
        $user->current_province_id = $userRegisterInfoDTO->getCurrentProvinceId();
        $user->mobile = $userRegisterInfoDTO->getMobile();
        $user->date_of_birth = $userRegisterInfoDTO->getDateOfBirth();
        $user->gender = $userRegisterInfoDTO->getGender();
        $user->last_name = $userRegisterInfoDTO->getLastName();
        $user->national_code = $userRegisterInfoDTO->getNationalCode();
        $user->day_of_cooperation = $userRegisterInfoDTO->getDayOfCooperation();
        $user->know_community_by = $userRegisterInfoDTO->getKnowCommunityBy();
        $user->motivation_for_cooperation = $userRegisterInfoDTO->getMotivationForCooperation();
        $user->field_of_activities = $userRegisterInfoDTO->getFieldOfActivities();
        $user->address_of_work = $userRegisterInfoDTO->getAddressOfWork();
        $user->work_phone = $userRegisterInfoDTO->getWorkPhone();

        $user->save();
        $user->roles()->attach(
            $userRegisterInfoDTO->getRoleId(),
            ['status' => $userRegisterInfoDTO->getRoleStatus()]);

        return $user;
    }

    public function getAll()
    {
        return $this->entityName::all();
    }

    public function find(int $id)
    {
        return $this->entityName::find($id);
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    public function isUserAdmin(int $userId): bool
    {
        return $this->entityName::findOrFail($userId)
            ->roles()->where('status', config('user.user_role_active_status'))
            ->where('role_id', config('user.admin_role_id'))
            ->orderBy('role_id')
            ->exists();
    }

    public function getActiveAndPendingRoles(int $userId)
    {
        return $this->entityName::findOrFail($userId)
            ->roles()->whereIn(
                'status',
                [
                    config('user.user_role_active_status'),
                    config('user.user_role_pending_status')
                ])
            ->orderBy('role_id')->first();
    }

    public function editUserInfo(int $userId, UserRegisterInfoDTO $userEditDTO)
    {
        $user = $this->entityName::findOrFail($userId);
        $user->name = $userEditDTO->getName();
        $user->email = $userEditDTO->getEmail();
        if ($userEditDTO->getPassword()) {
            $user->password = bcrypt($userEditDTO->getPassword());
        }
        $user->address_of_obtaining_degree = $userEditDTO->getAddressOfObtainingDegree();
        $user->last_education_degree = $userEditDTO->getLastEducationalDegree();
        $user->educational_field = $userEditDTO->getEducationalField();
        $user->job_title = $userEditDTO->getJobTitle();
        $user->marital_status = $userEditDTO->getMaritalStatus();
        $user->identity_number = $userEditDTO->getIdentityNumber();
        $user->city_of_birth = $userEditDTO->getCityOfBirth();
        $user->province_of_birth = $userEditDTO->getProvinceOfBirth();
        $user->essential_mobile = $userEditDTO->getEssentialMobile();
        $user->city_of_work = $userEditDTO->getCityOfWork();
        $user->province_of_work = $userEditDTO->getProvinceOfWork();
        $user->phone = $userEditDTO->getPhone();
        $user->current_address = $userEditDTO->getCurrentAddress();
        $user->current_city_id = $userEditDTO->getCurrentCityId();
        $user->current_province_id = $userEditDTO->getCurrentProvinceId();
        $user->mobile = $userEditDTO->getMobile();
        $user->date_of_birth = $userEditDTO->getDateOfBirth();
        $user->gender = $userEditDTO->getGender();
        $user->last_name = $userEditDTO->getLastName();
        $user->day_of_cooperation = $userEditDTO->getDayOfCooperation();
        $user->know_community_by = $userEditDTO->getKnowCommunityBy();
        $user->motivation_for_cooperation = $userEditDTO->getMotivationForCooperation();
        $user->field_of_activities = $userEditDTO->getFieldOfActivities();
        $user->address_of_work = $userEditDTO->getAddressOfWork();
        $user->work_phone = $userEditDTO->getWorkPhone();
        if (!empty($user->getDirty())) {
            $user->save();
        }
        return $user;
    }

    public function checkHasRoleClient(int $nationalCode)
    {
        return $this->entityName::where('national_code', '=', $nationalCode)->firstOrFail()
            ->roles()->whereIn(
                'status',
                [
                    config('user.user_role_active_status'),
                    config('user.user_role_pending_status')
                ])->where('role_id','=', config('user.client_role_id')
            )->exists();
    }

    public function checkHasRoleLegate(int $nationalCode)
    {
        return $this->entityName::where('national_code', '=', $nationalCode)->firstOrFail()
            ->roles()->whereIn(
                'status',
                [
                    config('user.user_role_active_status'),
                    config('user.user_role_pending_status')
                ])->where('role_id','=', config('user.legate_role_id')
            )->exists();
    }
}