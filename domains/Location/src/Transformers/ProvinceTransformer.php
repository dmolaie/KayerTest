<?php

namespace Domains\Location\Transformers;

use Domains\Location\Entities\Province;
use Domains\Location\Services\Contracts\LocationDTOs\ProvinceDTO;

class ProvinceTransformer
{
    public function transformMany($provinces)
    {
        return $provinces->map(function ($province){
            return $this->transform($province);
        })->toArray();
    }

    public function transform(Province $province): ProvinceDTO
    {
        $provinceObject = new ProvinceDTO();
        $provinceObject->setId($province->id);
        $provinceObject->setName($province->name);
        $provinceObject->setSlug($province->slug);
        return $provinceObject;
    }
}