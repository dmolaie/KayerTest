<?php


namespace Domains\User\Http\Presenters;


use Domains\Location\Services\Contracts\DTOs\CityDTO;
use Domains\Location\Services\Contracts\DTOs\ProvinceDTO;
use Domains\User\Services\Contracts\DTOs\UserBriefInfoDTO;

class UserBriefInfoPresenter
{
    public function transform(UserBriefInfoDTO $userBriefInfoDTO)
    {
        return [
            'name'                => $userBriefInfoDTO->getName(),
            'last_name'           => $userBriefInfoDTO->getLastName(),
            'id'                  => $userBriefInfoDTO->getId(),
            'national_code'       => $userBriefInfoDTO->getNationalCode(),
            'current_province_id' => $this->getProvinceInfo($userBriefInfoDTO->getCurrentProvince()),
            'current_city'        => $this->getCityInfo($userBriefInfoDTO->getCurrentCity()),
            'identity_number'     => $userBriefInfoDTO->getIdentityNumber(),
            'roles'               => $userBriefInfoDTO->getRoles()
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