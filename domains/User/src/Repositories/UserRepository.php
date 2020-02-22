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
            ->orderBy('role_id')
            ->exists();
    }

    public function getActiveRoles(int $userId)
    {
        return $this->entityName::findOrFail($userId)
            ->roles()->where('status', config('user.user_role_active_status'))
            ->orderBy('role_id')->first();
    }
}