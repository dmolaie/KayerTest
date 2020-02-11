<?php

namespace Domains\Location\Contracts\DTOs\Converters;


use Domains\Location\Entities\City;
use Domains\Location\Services\Contracts\DTOs\CityDTO;

class CityConverter
{
    /**
     * @var ProvinceConverter
     */
    private $provinceConverter;

    public function __construct(ProvinceConverter $provinceConverter)
    {
        $this->provinceConverter = $provinceConverter;
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
            $this->provinceConverter->convert($city->province)
        );
        return $cityObject;
    }
}