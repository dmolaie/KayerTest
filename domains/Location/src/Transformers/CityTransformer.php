<?php

namespace Domains\Location\Transformers;

use  Domains\Location\Entities\City;
use Domains\Location\Services\Contracts\LocationDTOs\CityDTO;

class CityTransformer
{
    /**
     * @var ProvinceTransformer
     */
    private $provinceTransformer;

    /**
     * CityTransformer constructor.
     * @param ProvinceTransformer $provinceTransformer
     */
    public function __construct(ProvinceTransformer $provinceTransformer)
    {
        $this->provinceTransformer = $provinceTransformer;
    }

    /**
     * @param $cities
     * @return array
     */
    public function transformMany($cities): array
    {
        return $cities->map(function ($city) {
            return $this->transform($city);
        })->toArray();
    }

    /**
     * @param City $city
     * @return CityDTO
     */
    public function transform(City $city): CityDTO
    {
        $cityObject = new CityDTO();
        $cityObject->setId($city->id);
        $cityObject->setName($city->name);
        $cityObject->setSlug($city->slug);
        $cityObject->setProvince(
            $this->provinceTransformer->transform($city->province)
        );
        return $cityObject;
    }
}