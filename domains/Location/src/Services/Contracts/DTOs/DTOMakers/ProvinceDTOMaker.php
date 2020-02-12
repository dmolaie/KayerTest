<?php

namespace Domains\Location\Contracts\DTOs\DTOMakers;

use Domains\Location\Entities\Province;
use Domains\Location\Services\Contracts\DTOs\ProvinceDTO;

class ProvinceDTOMaker
{
    public function convertMany($provinces)
    {
        return $provinces->map(function ($province){
            return $this->convert($province);
        })->toArray();
    }

    public function convert(Province $province): ProvinceDTO
    {
        $provinceObject = new ProvinceDTO();
        $provinceObject->setId($province->id);
        $provinceObject->setName($province->name);
        $provinceObject->setSlug($province->slug);
        return $provinceObject;
    }
}