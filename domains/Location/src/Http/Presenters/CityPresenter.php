<?php

namespace Domains\Location\Http\Presenters;


use Domains\Location\Services\Contracts\DTOs\CityDTO;

/**
 * Class CityPresenter
 */
class CityPresenter
{
    /**
     * @param $cityDTOs
     * @return mixed
     */
    public function transformMany($cityDTOs): array
    {
        return array_map(function ($cityDTO) {
            return $this->transform($cityDTO);
        }, $cityDTOs);
    }

    /**
     * @param CityDTO $cityDTO
     * @return array
     */
    public function transform(CityDTO $cityDTO): array
    {
        return [
            'id'       => $cityDTO->getId(),
            'name'     => $cityDTO->getName(),
            'slug'     => $cityDTO->getSlug(),
            'province' => [
                'id'   => $cityDTO->getProvince()->getId(),
                'name' => $cityDTO->getProvince()->getName(),
                'slug' => $cityDTO->getProvince()->getSlug()
            ]
        ];
    }
}
