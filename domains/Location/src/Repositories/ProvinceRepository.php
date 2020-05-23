<?php

namespace Domains\Location\Repositories;

use Domains\Location\Entities\Province;

class ProvinceRepository
{
    protected $entityName = Province::class;

    public function getAll()
    {
        return $this->entityName::where('is_show','=',true)->get();
    }

    public function find(int $id)
    {
        return $this->entityName::find($id);
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    public function findWithProvinceIds(array $provinceIds)
    {
        return $this->entityName::whereIn('id', $provinceIds)
            ->get();
    }

    public function searchProvinces(array $provinceIds)
    {
        return $this->entityName::whereIn('id', $provinceIds)
            ->get();
    }

    public function finBySlug($slug)
    {
        return $this->entityName::where('slug','=',$slug)->first();
    }
}