<?php

namespace Domains\Location\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CityCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            return [
                'id'       => $item->getId(),
                'name'     => $item->getName(),
                'Province' => [
                    'id'   => $item->getProvince()->getId(),
                    'name' => $item->getProvince()->getName()
                ]
            ];
        });
    }
}
