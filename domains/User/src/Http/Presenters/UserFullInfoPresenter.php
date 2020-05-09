<?php


namespace Domains\User\Http\Presenters;

use Domains\Location\Services\Contracts\DTOs\CityDTO;
use Domains\Location\Services\Contracts\DTOs\ProvinceDTO;
use Domains\User\Services\Contracts\DTOs\UserFullInfoDTO;

class UserFullInfoPresenter
{
    public function transform(UserFullInfoDTO $userFullInfoDTO)
    {
        return [
            'id'                         => $userFullInfoDTO->getId(),
            'national_code'              => $userFullInfoDTO->getNationalCode(),
            'gender'                     => array_flip(config('user.user_genders'))[$userFullInfoDTO->getGender()],
            'name'                       => $userFullInfoDTO->getName(),
            'last_name'                  => $userFullInfoDTO->getLastName(),
            'father_name'                => $userFullInfoDTO->getFatherName(),
            'identity_number'            => $userFullInfoDTO->getIdentityNumber(),
            'province_of_birth'          => $userFullInfoDTO->getProvinceOfBirth(),
            'city_of_birth'              => $this->getCityInfo($userFullInfoDTO->getCityOfBirth()),
            'date_of_birth'              => $userFullInfoDTO->getDateOfBirth(),
            'job_title'                  => $userFullInfoDTO->getJobTitle(),
            'last_education_degree'      => $userFullInfoDTO->getLastEducationDegree() ? array_flip(config('user.education_degree'))[$userFullInfoDTO->getLastEducationDegree()] : null,
            'phone'                      => $userFullInfoDTO->getPhone(),
            'mobile'                     => $userFullInfoDTO->getMobile(),
            'essential_mobile'           => $userFullInfoDTO->getEssentialMobile(),
            'current_province'           => $userFullInfoDTO->getCurrentProvince(),
            'current_city'               => $this->getCityInfo($userFullInfoDTO->getCurrentCity()),
            'email'                      => $userFullInfoDTO->getEmail(),
            'marital_status'             => $userFullInfoDTO->getMaritalStatus() ? array_flip(config('user.user_marital_statuses'))[$userFullInfoDTO->getMaritalStatus()] : null,
            'education_field'            => $userFullInfoDTO->getEducationField(),
            'education_province'         => $userFullInfoDTO->getEducationProvince(),
            'education_city'             => $this->getCityInfo($userFullInfoDTO->getEducationCity()),
            'home_postal_code'           => $userFullInfoDTO->getHomePostalCode(),
            'province_of_work'           => $userFullInfoDTO->getProvinceOfWork(),
            'city_of_work'               => $this->getCityInfo($userFullInfoDTO->getCityOfWork()),
            'address_of_work'            => $userFullInfoDTO->getAddressOfWork(),
            'work_phone'                 => $userFullInfoDTO->getWorkPhone(),
            'work_postal_code'           => $userFullInfoDTO->getWorkPostalCode(),
            'day_of_cooperation'         => $userFullInfoDTO->getDayOfCooperation(),
            'know_community_by'          => $userFullInfoDTO->getKnowCommunityBy() ? array_flip(config('user.know_community_by'))[$userFullInfoDTO->getKnowCommunityBy()] : null,
            'motivation_for_cooperation' => $userFullInfoDTO->getMotivationForCooperation(),
            'field_of_activities'        => is_null($userFullInfoDTO->getFieldOfActivities()) ? array_map('intval',
                explode(',', $userFullInfoDTO->getFieldOfActivities())) : [],
            'current_address'            => $userFullInfoDTO->getCurrentAddress(),
            'roles'                      => $userFullInfoDTO->getRoles(),
            'receive_email'              => $userFullInfoDTO->getReceiveEmail(),
            'event'                      => $userFullInfoDTO->getEvent(),
            'card_id'                    => $this->getCardId($userFullInfoDTO),
            'created_by'                 => $userFullInfoDTO->getCreatedBy(),
            'created_at'                 => strtotime($userFullInfoDTO->getCreatedAt()),
            'updated_at'                 => strtotime($userFullInfoDTO->getUpdatedAt())
        ];
    }

    private function getProvinceInfo(?ProvinceDTO $provinceDTO)
    {
        if (!$provinceDTO) {
            return null;
        }
        return [
            'name' => $provinceDTO->getName(),
            'slug' => $provinceDTO->getSlug(),
            'id'   => $provinceDTO->getId(),
        ];
    }

    private function getCityInfo(?CityDTO $city)
    {
        if (!$city) {
            return null;
        }
        return [
            'name' => $city->getName(),
            'slug' => $city->getSlug(),
            'id'   => $city->getId(),
        ];
    }

    private function getCardId(UserFullInfoDTO $userFullInfoDTO)
    {
        $roleIds = collect($userFullInfoDTO->getRoles())->pluck('type')->toArray();
        if (in_array(config('user.client_role_type'), $roleIds)) {
            return $userFullInfoDTO->getCardId();
        }
        return null;
    }
}