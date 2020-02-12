<?php

namespace Domains\Location\Services;


use Domains\Location\Contracts\DTOs\DTOMakers\CityDTOMaker;
use Domains\Location\Repositories\CityRepository;
use Domains\Location\Transformers\CityTransformer;
use Domains\Location\Services\Contracts\DTOs\CityDTO;
use Domains\Location\Contracts\DTOs\Converters\CityConverter;

/**
 * Class CityServices
 */
class CityServices
{
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var CityDTOMaker
     */
    private $cityDTOMaker;

    /**
     * CityServices constructor.
     * @param CityRepository $cityRepository
     * @param CityDTOMaker $cityDTOMaker
     */
    public function __construct(CityRepository $cityRepository, CityDTOMaker $cityDTOMaker)
    {
        $this->cityRepository = $cityRepository;
        $this->cityDTOMaker = $cityDTOMaker;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $cities = $this->cityRepository->getAll();
        return $this->cityDTOMaker->convertMany($cities);
    }

    /**
     * @param int $id
     * @return Contracts\DTOs\CityDTO
     */
    public function find(int $id): CityDTO
    {
        $city = $this->cityRepository->find($id);
        return $this->cityDTOMaker->convert($city);
    }

    /**
     * @param $province_id
     * @return array
     */
    public function getCitiesByProvinceId($province_id)
    {
        $cities = $this->cityRepository->findWithProvinceId($province_id);
        return $this->cityDTOMaker->convertMany($cities);
    }
}