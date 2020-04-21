<?php


namespace Domains\User\Services\Contracts\DTOs;


/**
 * Class UserAdditionalInfoDTO
 */
class UserAdditionalInfoDTO
{
    /**
     * @var array
     */
    protected $cities;

    /**
     * @return array
     */
    public function getCities(): array
    {
        return $this->cities;
    }

    /**
     * @param array $cities
     * @return UserAdditionalInfoDTO
     */
    public function setCities(array $cities): UserAdditionalInfoDTO
    {
        $this->cities = $cities;
        return $this;
    }

}