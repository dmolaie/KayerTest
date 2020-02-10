<?php


namespace Domains\User\Repositories;

use Domains\User\Entities\User;
use Illuminate\Support\Facades\Hash;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;

class UserRepository
{
    protected $entityName = User::class;

    public function createNewUser(UserRegisterInfoDTO $userRegisterInfoDTO): User
    {
        $user = new $this->entityName;
        $user->name = $userRegisterInfoDTO->getName();
        $user->email = $userRegisterInfoDTO->getEmail();
        $user->password = Hash::make($userRegisterInfoDTO->getPassword());
        $user->role_id = $userRegisterInfoDTO->getRoleId();
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
}