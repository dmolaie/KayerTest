<?php


namespace Domains\Location\Services\Contracts\DTOs;


class SearchProvinceDTO
{
    protected $provinceIds;

    /**
     * @return array
     */
    public function getProvinceIds()
    {
        return $this->provinceIds;
    }

    public function addProvinceId(int $province)
    {
        $this->provinceIds[$province] = $province;
        return $this;
    }
}