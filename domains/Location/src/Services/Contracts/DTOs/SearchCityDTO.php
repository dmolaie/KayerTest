<?php


namespace Domains\Location\Services\Contracts\DTOs;


class SearchCityDTO
{
    protected $cityIds;

    /**
     * @return array
     */
    public function getCityIds()
    {
        return $this->cityIds;
    }

    public function addCityId(int $cityId)
    {
        $this->cityIds[$cityId] = $cityId;
        return $this;
    }
}