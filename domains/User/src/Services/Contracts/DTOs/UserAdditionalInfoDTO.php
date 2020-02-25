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
     * @var array
     */
    protected $provinces;

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

    /**
     * @return array
     */
    public function getProvinces(): array
    {
        return $this->provinces;
    }

    /**
     * @param array $provinces
     * @return UserAdditionalInfoDTO
     */
    public function setProvinces(array $provinces): UserAdditionalInfoDTO
    {
        $this->provinces = $provinces;
        return $this;
    }
}