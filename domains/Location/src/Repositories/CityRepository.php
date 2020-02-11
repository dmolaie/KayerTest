<?php

namespace Domains\Location\Repositories;

use Domains\Location\Entities\City;

class CityRepository
{
    protected $entityName = City::class;

    public function getAll()
    {
        return $this->entityName::all();
    }

    public function find(int $id)
    {
        return $this->entityName::find($id);
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    public function findWithProvinceId($province_id)
    {
        return $this->entityName::where('province_id', '=', $province_id)
            ->get();
    }
}