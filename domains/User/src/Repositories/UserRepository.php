<?php


namespace Domains\User\Repositories;

use Domains\User\Entities\User;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserSearchDTO;

class UserRepository
{
    protected $entityName = User::class;

    public function createOrUpdateUser(UserRegisterInfoDTO $userRegisterInfoDTO, ?User $user): User
    {
        $user = $user ?? new $this->entityName;
        $user->national_code = $userRegisterInfoDTO->getNationalCode() ?? $user->national_code;
        $user->gender = $userRegisterInfoDTO->getGender() ?? $user->gender;
        $user->name = $userRegisterInfoDTO->getName() ?? $user->name;
        $user->last_name = $userRegisterInfoDTO->getLastName() ?? $user->last_name;
        $user->father_name = $userRegisterInfoDTO->getFatherName() ?? $user->father_name;
        $user->identity_number = $userRegisterInfoDTO->getIdentityNumber() ?? $user->identity_number;
        $user->city_of_birth = $userRegisterInfoDTO->getCityOfBirth() ?? $user->city_of_birth;
        $user->province_of_birth = $userRegisterInfoDTO->getProvinceOfBirth() ?? $user->province_of_birth;
        $user->date_of_birth = $userRegisterInfoDTO->getDateOfBirth() ?? $user->date_of_birth;
        $user->job_title = $userRegisterInfoDTO->getJobTitle() ?? $user->job_title;
        $user->last_education_degree = $userRegisterInfoDTO->getLastEducationDegree() ?? $user->last_education_degree;
        $user->phone = $userRegisterInfoDTO->getPhone() ?? $user->phone;
        $user->mobile = $userRegisterInfoDTO->getMobile() ?? $user->mobile;
        $user->essential_mobile = $userRegisterInfoDTO->getEssentialMobile() ?? $user->essential_mobile;
        $user->current_city_id = $userRegisterInfoDTO->getCurrentCityId() ?? $user->current_city_id;
        $user->current_province_id = $userRegisterInfoDTO->getCurrentProvinceId() ?? $user->current_province_id;
        $user->email = $userRegisterInfoDTO->getEmail() ?? $user->email;
        $user->marital_status = $userRegisterInfoDTO->getMaritalStatus() ?? $user->marital_status;
        $user->education_field = $userRegisterInfoDTO->getEducationField() ?? $user->education_field;
        $user->education_province_id = $userRegisterInfoDTO->getEducationProvinceId()?? $user->education_province_id;
        $user->education_city_id = $userRegisterInfoDTO->getEducationCityId()?? $user->education_city_id;
        $user->current_address = $userRegisterInfoDTO->getCurrentAddress() ?? $user->current_address;
        $user->home_postal_code = $userRegisterInfoDTO->getHomePostalCode()??$user->home_postal_code;
        $user->city_of_work = $userRegisterInfoDTO->getCityOfWork() ?? $user->city_of_work;
        $user->province_of_work = $userRegisterInfoDTO->getProvinceOfWork() ?? $user->province_of_work;
        $user->address_of_work = $userRegisterInfoDTO->getAddressOfWork() ?? $user->address_of_work;
        $user->work_phone = $userRegisterInfoDTO->getWorkPhone() ?? $user->work_phone;
        $user->work_postal_code = $userRegisterInfoDTO->getWorkPostalCode()??$user->work_postal_code;
        $user->know_community_by = $userRegisterInfoDTO->getKnowCommunityBy() ?? $user->know_community_by;
        $user->motivation_for_cooperation = $userRegisterInfoDTO->getMotivationForCooperation() ?? $user->motivation_for_cooperation;
        $user->day_of_cooperation = $userRegisterInfoDTO->getDayOfCooperation() ?? $user->day_of_cooperation;
        $user->field_of_activities = $userRegisterInfoDTO->getFieldOfActivities() ?? $user->field_of_activities;
        $user->event_id = $userRegisterInfoDTO->getEventId()??$user->event_id;
        $user->receive_email = $userRegisterInfoDTO->getReceiveEmail()??$user->receive_email;
        $user->creator_id = $userRegisterInfoDTO->getCreatedBy()??$user->creator_id;
        $cardId = $this->entityName::latest('id')->first()? $this->entityName::latest('id')->first()->id+1:1;
        $user->card_id = $user->card_id??$cardId;

        if ($userRegisterInfoDTO->getPassword()) {
            $user->password = bcrypt($userRegisterInfoDTO->getPassword());
        }
        if (!empty($user->getDirty())) {
            $user->save();
        }
        $user->roles()->detach($userRegisterInfoDTO->getRoleId());
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

    public function getActiveAndPendingRoles(User $user)
    {
        return $user->roles()->whereIn(
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
        $user->gender = $userEditDTO->getGender();
        $user->name = $userEditDTO->getName();
        $user->last_name = $userEditDTO->getLastName();
        $user->father_name = $userEditDTO->getFatherName();
        $user->identity_number = $userEditDTO->getIdentityNumber();
        $user->city_of_birth = $userEditDTO->getCityOfBirth();
        $user->province_of_birth = $userEditDTO->getProvinceOfBirth();
        $user->date_of_birth = $userEditDTO->getDateOfBirth();
        $user->job_title = $userEditDTO->getJobTitle();
        $user->last_education_degree = $userEditDTO->getLastEducationDegree();
        $user->phone = $userEditDTO->getPhone();
        $user->mobile = $userEditDTO->getMobile();
        $user->essential_mobile = $userEditDTO->getEssentialMobile();
        $user->current_city_id = $userEditDTO->getCurrentCityId();
        $user->current_province_id = $userEditDTO->getCurrentProvinceId();
        $user->email = $userEditDTO->getEmail();
        $user->marital_status = $userEditDTO->getMaritalStatus();
        $user->education_field = $userEditDTO->getEducationField();
        $user->education_province_id = $userEditDTO->getEducationProvinceId();
        $user->education_city_id = $userEditDTO->getEducationCityId();
        $user->current_address = $userEditDTO->getCurrentAddress();
        $user->home_postal_code = $userEditDTO->getHomePostalCode();
        $user->city_of_work = $userEditDTO->getCityOfWork();
        $user->province_of_work = $userEditDTO->getProvinceOfWork();
        $user->address_of_work = $userEditDTO->getAddressOfWork();
        $user->work_phone = $userEditDTO->getWorkPhone();
        $user->work_postal_code = $userEditDTO->getWorkPostalCode();
        $user->know_community_by = $userEditDTO->getKnowCommunityBy();
        $user->motivation_for_cooperation = $userEditDTO->getMotivationForCooperation();
        $user->day_of_cooperation = $userEditDTO->getDayOfCooperation();
        $user->field_of_activities = $userEditDTO->getFieldOfActivities();
        $user->event_id = $userEditDTO->getEventId();
        $user->receive_email = $userEditDTO->getReceiveEmail();


        if ($userEditDTO->getPassword()) {
            $user->password = bcrypt($userEditDTO->getPassword());
        }
        if (!empty($user->getDirty())) {
            $user->save();
        }
        return $user;
    }

    public function searchUser(UserSearchDTO $userSearchDTO)
    {
        return $this->entityName
            ::when($userSearchDTO->getId(), function ($query) use ($userSearchDTO) {
                return $query->where('id', $userSearchDTO->getId());
            })->when($userSearchDTO->getName(), function ($query) use ($userSearchDTO) {
                return $query->where('name', 'like', '%' . $userSearchDTO->getName() . '%')
                    ->orWhere('last_name', 'like', '%' . $userSearchDTO->getName() . '%');
            })
            ->when($userSearchDTO->getNationalCode(), function ($query) use ($userSearchDTO) {

                return $query->where('national_code', $userSearchDTO->getNationalCode());
            })
            ->when($userSearchDTO->getRoleId(), function ($query) use ($userSearchDTO) {
                return $query->whereHas(
                    'roles', function ($query) use ($userSearchDTO) {
                    $query->where('roles.id', $userSearchDTO->getRoleId());
                });
            })
            ->paginate(config('user.user_paginate_count'));
    }

    public function findByNationalCode(string $nationalCode):?User
    {
        return $this->entityName::where('national_code',$nationalCode)
            ->first();
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