<?php


namespace Domains\User\Services\Contracts\DTOs\DTOMakers;


use Domains\User\Entities\User;
use Domains\User\Services\Contracts\DTOs\UserAdditionalInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserFullInfoDTO;

class UserFullInfoDTOMaker
{
    public function convertMany($users, UserAdditionalInfoDTO $userAdditionalInfoDTO)
    {
        return $users->map(function ($user) use ($userAdditionalInfoDTO) {
            return $this->convert($user, $userAdditionalInfoDTO);
        })->toArray();
    }

    public function convert(User $user, UserAdditionalInfoDTO $userAdditionalInfoDTO)
    {
        $cities = $userAdditionalInfoDTO->getCities();
        $provinces = $userAdditionalInfoDTO->getProvinces();

        $userFullInfoDTO = new UserFullInfoDTO();
        $userFullInfoDTO->setId($user->id)
            ->setName($user->name)
            ->setLastName($user->last_name)
            ->setPhone($user->phone)
            ->setProvinceOfWork($provinces[$user->province_of_work] ?? null)
            ->setProvinceOfBirth($provinces[$user->province_of_birth] ?? null)
            ->setNationalCode($user->national_code)
            ->setMaritalStatus($user->marital_status)
            ->setMobile($user->mobile)
            ->setAddressOfObtainingDegree($user->address_of_obtaining_degree)
            ->setCityOfBirth($cities[$user->city_of_birth]??null)
            ->setCityOfWork($cities[$user->city_of_work] ?? null)
            ->setCurrentAddress($user->current_address)
            ->setCurrentCity($cities[$user->current_city_id] ?? null)
            ->setCurrentProvince($provinces[$user->current_province_id] ?? null)
            ->setDateOfBirth(strtotime($user->date_of_birth))
            ->setEducationalField($user->educational_field)
            ->setEmail($user->email)
            ->setEssentialMobile($user->essential_mobile)
            ->setGender($user->gender)
            ->setIdentityNumber($user->identity_number)
            ->setJobTitle($user->job_title)
            ->setRoles($this->getRoles($user->roles))
            ->setLastEducationalDegree($user->last_education_degree)
            ->setMotivationForCooperation($user->motivation_for_cooperation)
            ->setFieldOfActivities($user->field_of_activities)
            ->setDayOfCooperation($user->day_of_cooperation)
            ->setKnowCommunityBy($user->know_community_by)
            ->setWorkPhone($user->work_phone)
            ->setAddressOfWork($user->address_of_work);
        return $userFullInfoDTO;
    }

    private function getRoles($roles)
    {
        return $roles->map(function ($role) {

            return [
                'name'   => $role->name,
                'status' => $role->pivot->status
            ];
        })->toArray();
    }


}