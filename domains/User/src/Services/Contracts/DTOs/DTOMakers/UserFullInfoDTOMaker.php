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
        $userFullInfoDTO
            ->setId($user->id)
            ->setNationalCode($user->national_code)
            ->setGender($user->gender)
            ->setName($user->name)
            ->setLastName($user->last_name)
            ->setFatherName($user->father_name)
            ->setIdentityNumber($user->identity_number)
            ->setProvinceOfBirth($provinces[$user->province_of_birth] ?? null)
            ->setCityOfBirth($cities[$user->city_of_birth] ?? null)
            ->setDateOfBirth(strtotime($user->date_of_birth))
            ->setJobTitle($user->job_title)
            ->setLastEducationDegree($user->last_education_degree)
            ->setPhone($user->phone)
            ->setMobile($user->mobile)
            ->setEssentialMobile($user->essential_mobile)
            ->setCurrentProvince($provinces[$user->current_province_id] ?? null)
            ->setCurrentCity($cities[$user->current_city_id] ?? null)
            ->setEmail($user->email)
            ->setMaritalStatus($user->marital_status)
            ->setEducationField($user->education_field)
            ->setEducationProvince($provinces[$user->education_province_id] ?? null)
            ->setEducationCity($cities[$user->education_city_id] ?? null)
            ->setHomePostalCode($user->home_postal_code)
            ->setProvinceOfWork($provinces[$user->province_of_work] ?? null)
            ->setCityOfWork($cities[$user->city_of_work] ?? null)
            ->setAddressOfWork($user->address_of_work)
            ->setWorkPhone($user->work_phone)
            ->setWorkPostalCode($user->woke_postaal_code)
            ->setDayOfCooperation($user->day_of_cooperation)
            ->setKnowCommunityBy($user->know_community_by)
            ->setCurrentAddress($user->current_address)
            ->setRoles($this->getRoles($user->roles))
            ->setMotivationForCooperation($user->motivation_for_cooperation)
            ->setFieldOfActivities($user->field_of_activities)
            ->setReceiveEmail($user->receive_email)
            ->setCardId($user->card_id);

        return $userFullInfoDTO;
    }

    private function getRoles($roles)
    {
        return $roles->map(function ($role) {

            return [
                'name'   => $role->name,
                'id'     => $role->id,
                'label'  => $role->label,
                'status' => $role->pivot->status
            ];
        })->toArray();
    }


}