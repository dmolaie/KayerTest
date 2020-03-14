<?php

namespace Domains\Location\Http\Presenters;

use Domains\Location\Services\Contracts\DTOs\ProvinceDTO;

/**
 * Class ProvincePresenter
 */
class ProvincePresenter
{
    /**
     * @param $provinceDTOs
     * @return mixed
     */
    public function transformMany($provinceDTOs): array
    {
        return array_map(function ($provinceDTO) {
            return $this->transform($provinceDTO);
        }, $provinceDTOs);
    }

    /**
     * @param ProvinceDTO $provinceDTO
     * @return array
     */
    public function transform(ProvinceDTO $provinceDTO): array
    {
        return [

            'id'   => $provinceDTO->getId(),
            'name' => $provinceDTO->getName(),
            'slug' => $provinceDTO->getSlug()
        ];
    }
}
