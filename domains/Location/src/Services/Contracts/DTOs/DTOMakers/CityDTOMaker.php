<?php

namespace Domains\Location\Contracts\DTOs\DTOMakers;


use Domains\Location\Entities\City;
use Domains\Location\Services\Contracts\DTOs\CityDTO;

class CityDTOMaker
{

    /**
     * @var ProvinceDTOMaker
     */
    private $provinceDTOMaker;

    public function __construct(ProvinceDTOMaker $provinceDTOMaker)
    {
        $this->provinceDTOMaker = $provinceDTOMaker;
    }

    /**
     * @param $cities
     * @return array
     */
    public function convertMany($cities): array
    {
        return $cities->map(function ($city) {
            return $this->convert($city);
        })->toArray();
    }

    /**
     * @param City $city
     * @return CityDTO
     */
    public function convert(City $city): CityDTO
    {
        $cityObject = new CityDTO();
        $cityObject->setId($city->id);
        $cityObject->setName($city->name);
        $cityObject->setSlug($city->slug);
        $cityObject->setProvince(
            $this->provinceDTOMaker->convert($city->province)
        );
        return $cityObject;
    }
}