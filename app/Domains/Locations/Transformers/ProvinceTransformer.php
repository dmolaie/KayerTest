<?php

namespace App\Domains\Locations\Transformers;

use App\Domains\Locations\Entities\Province;
use App\Domains\Locations\ValueObjects\ProvinceValueObject;

class ProvinceTransformer
{
    public function transformMany($provinces)
    {
        return $provinces->map(function ($province){
            return $this->transform($province);
        })->toArray();
    }

    public function transform(Province $province): ProvinceValueObject
    {
        $provinceObject = new ProvinceValueObject();
        $provinceObject->setId($province->id);
        $provinceObject->setName($province->name);
        $provinceObject->setSlug($province->slug);
        return $provinceObject;
    }
}