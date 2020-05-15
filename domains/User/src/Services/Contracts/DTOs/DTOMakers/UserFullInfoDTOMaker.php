<?php


namespace Domains\User\Services\Contracts\DTOs\DTOMakers;


use Domains\Location\Entities\Province;
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
        $userFullInfoDTO = new UserFullInfoDTO();
        $userFullInfoDTO
            ->setId($user->id)
            ->setNationalCode($user->national_code)
            ->setGender($user->gender)
            ->setName($user->name)
            ->setLastName($user->last_name)
            ->setFatherName($user->father_name)
            ->setIdentityNumber($user->identity_number)
            ->setProvinceOfBirth($user->birthProvince ? $this->getProvinceInfo($user->birthProvince) : null)
            ->setCityOfBirth($cities[$user->city_of_birth] ?? null)
            ->setDateOfBirth(strtotime($user->date_of_birth))
            ->setJobTitle($user->job_title)
            ->setLastEducationDegree($user->last_education_degree)
            ->setPhone($user->phone)
            ->setMobile($user->mobile)
            ->setEssentialMobile($user->essential_mobile)
            ->setCurrentProvince($user->currentProvince? $this->getProvinceInfo($user->currentProvince):[])
            ->setCurrentCity($cities[$user->current_city_id] ?? null)
            ->setEmail($user->email)
            ->setMaritalStatus($user->marital_status)
            ->setEducationField($user->education_field)
            ->setEducationProvince($user->educationProvince ? $this->getProvinceInfo($user->educationProvince) : null)
            ->setEducationCity($cities[$user->education_city_id] ?? null)
            ->setHomePostalCode($user->home_postal_code)
            ->setProvinceOfWork($user->workProvince?$this->getProvinceInfo($user->workProvince):null)
            ->setCityOfWork($cities[$user->city_of_work] ?? null)
            ->setAddressOfWork($user->address_of_work)
            ->setWorkPhone($user->work_phone)
            ->setWorkPostalCode($user->work_postal_code)
            ->setDayOfCooperation($user->day_of_cooperation)
            ->setKnowCommunityBy($user->know_community_by)
            ->setCurrentAddress($user->current_address)
            ->setRoles($this->getRoles($user->roles))
            ->setMotivationForCooperation($user->motivation_for_cooperation)
            ->setFieldOfActivities($user->field_of_activities)
            ->setReceiveEmail($user->receive_email)
            ->setCardId($user->card_id)
            ->setUpdatedAt($user->updated_at)
            ->setEvent($this->getEventInfo($user))
            ->setCreatedBy($user->createdBy ? [
                'name' => $user->createdBy->name,
                'id'   => $user->createdBy->id,
            ] : null)
            ->setCreatedAt($user->created_at);

        return $userFullInfoDTO;
    }

    private function getRoles($roles)
    {
        return $roles->map(function ($role) {

            return [
                'name'   => $role->name,
                'id'     => $role->id,
                'type'   => $role->type,
                'label'  => $role->label,
                'status' => $role->pivot->status
            ];
        })->toArray();
    }

    private function getEventInfo(User $user)
    {
        if ($user->event) {
            return [
                'id'    => $user->event->id,
                'title' => $user->event->title
            ];
        }
        return;
    }

    private function getProvinceInfo(Province $province)
    {
        return [
            'name' => $province->name,
            'id'   => $province->id,
            'slug' => $province->slug
        ];
    }

}