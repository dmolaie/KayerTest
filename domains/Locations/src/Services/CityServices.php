<?php

namespace Domains\Locations\Services;


use Domains\Locations\Http\Resources\CityCollection;
use Domains\Locations\Repositories\CityRepository;
use Domains\Locations\Transformers\CityTransformer;

class CityServices
{
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var CityTransformer
     */
    private $cityTransformer;

    public function __construct(CityRepository $cityRepository,CityTransformer $cityTransformer)
    {

        $this->cityRepository = $cityRepository;
        $this->cityTransformer = $cityTransformer;
    }
    public function getAll()
    {
       $cities = $this->cityRepository->getAll();
       return $this->cityTransformer->transformMany($cities);
    }

    public function find(int $id)
    {
        $city = $this->cityRepository->find($id);
        return $this->cityTransformer->transform($city);
    }
}