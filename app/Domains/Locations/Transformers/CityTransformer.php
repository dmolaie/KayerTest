<?php

namespace App\Domains\Locations\Transformers;

use App\Domains\Locations\Entities\City;
use App\Domains\Locations\ValueObjects\CityValueObject;

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
     * @return CityValueObject
     */
    public function transform(City $city): CityValueObject
    {
        $cityObject = new CityValueObject();
        $cityObject->setId($city->id);
        $cityObject->setName($city->name);
        $cityObject->setSlug($city->slug);
        $cityObject->setProvince(
            $this->provinceTransformer->transform($city->province)
        );
        return $cityObject;
    }
}