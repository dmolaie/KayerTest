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
            'name'                        => $userFullInfoDTO->getName(),
            'last_name'                   => $userFullInfoDTO->getLastName(),
            'id'                          => $userFullInfoDTO->getId(),
            'national_code'               => $userFullInfoDTO->getNationalCode(),
            'gender'                      => $userFullInfoDTO->getGender(),
            'date_of_birth'               => $userFullInfoDTO->getDateOfBirth(),
            'mobile'                      => $userFullInfoDTO->getMobile(),
            'current_province_id'         => $this->getProvinceInfo($userFullInfoDTO->getCurrentProvince()),
            'current_city'                => $this->getCityInfo($userFullInfoDTO->getCurrentCity()),
            'marital_status'              => $userFullInfoDTO->getMaritalStatus(),
            'current_address'             => $userFullInfoDTO->getCurrentAddress(),
            'phone'                       => $userFullInfoDTO->getPhone(),
            'email'                       => $userFullInfoDTO->getEmail(),
            'essential_mobile'            => $userFullInfoDTO->getEssentialMobile(),
            'job_title'                   => $userFullInfoDTO->getJobTitle(),
            'educational_field'           => $userFullInfoDTO->getEducationalField(),
            'last_educational_degree'     => $userFullInfoDTO->getLastEducationalDegree(),
            'address_of_obtaining_degree' => $userFullInfoDTO->getAddressOfObtainingDegree(),
            'day_of_cooperation'          => $userFullInfoDTO->getDayOfCooperation(),
            'know_community_by'           => $userFullInfoDTO->getKnowCommunityBy(),
            'motivation_for_cooperation'  => $userFullInfoDTO->getMotivationForCooperation(),
            'field_of_activities'         => $userFullInfoDTO->getFieldOfActivities(),
            'address_of_work'             => $userFullInfoDTO->getAddressOfWork(),
            'work_phone'                  => $userFullInfoDTO->getWorkPhone(),
            'province_of_birth'           => $this->getProvinceInfo($userFullInfoDTO->getProvinceOfBirth()),
            'city_of_birth'               => $this->getCityInfo($userFullInfoDTO->getCityOfBirth()),
            'province_of_work'            => $this->getProvinceInfo($userFullInfoDTO->getProvinceOfWork()),
            'city_of_work'                => $this->getCityInfo($userFullInfoDTO->getCityOfWork()),
            'day_of_cooperation'          => $userFullInfoDTO->getDayOfCooperation(),
            'identity_number'             => $userFullInfoDTO->getIdentityNumber(),
            'roles'=>$userFullInfoDTO->getRoles()
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
}