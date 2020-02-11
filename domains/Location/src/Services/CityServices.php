<?php

namespace Domains\Location\Services;


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
     * @var CityConverter
     */
    private $cityConverter;

    /**
     * CityServices constructor.
     * @param CityRepository $cityRepository
     * @param CityConverter $cityConverter
     */
    public function __construct(CityRepository $cityRepository, CityConverter $cityConverter)
    {
        $this->cityRepository = $cityRepository;
        $this->cityConverter = $cityConverter;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $cities = $this->cityRepository->getAll();
        return $this->cityConverter->convertMany($cities);
    }

    /**
     * @param int $id
     * @return Contracts\DTOs\CityDTO
     */
    public function find(int $id): CityDTO
    {
        $city = $this->cityRepository->find($id);
        return $this->cityConverter->convert($city);
    }

    /**
     * @param $province_id
     * @return array
     */
    public function getCitiesByProvinceId($province_id)
    {
        $cities = $this->cityRepository->findWithProvinceId($province_id);
        return $this->cityConverter->convertMany($cities);
    }
}