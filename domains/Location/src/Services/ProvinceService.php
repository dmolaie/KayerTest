<?php

namespace Domains\Location\Services;


use Domains\Location\Contracts\DTOs\DTOMakers\ProvinceDTOMaker;
use Domains\Location\Repositories\ProvinceRepository;
use Domains\Location\Services\Contracts\DTOs\SearchProvinceDTO;
use Domains\Location\Transformers\ProvinceTransformer;
use Domains\Location\Services\Contracts\DTOs\ProvinceDTO;
use Domains\Location\Contracts\DTOs\Converters\ProvinceConverter;

/**
 * Class ProvinceServices
 */
class ProvinceService
{
    /**
     * @var provinceRepository
     */
    private $provinceRepository;
    /**
     * @var ProvinceDTOMaker
     */
    private $provinceDTOMaker;

    /**
     * ProvinceServices constructor.
     * @param provinceRepository $provinceRepository
     * @param ProvinceDTOMaker $provinceDTOMaker
     */
    public function __construct(provinceRepository $provinceRepository, ProvinceDTOMaker $provinceDTOMaker)
    {
        $this->provinceRepository = $provinceRepository;
        $this->provinceDTOMaker = $provinceDTOMaker;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $cities = $this->provinceRepository->getAll();
        return $this->provinceDTOMaker->convertMany($cities);
    }

    /**
     * @param int $id
     * @return Contracts\DTOs\ProvinceDTO
     */
    public function find(int $id): ProvinceDTO
    {
        $province = $this->provinceRepository->find($id);
        return $this->provinceDTOMaker->convert($province);
    }

    /**
     * @param $province_id
     * @return array
     */
    public function getProvincesByProvinceId($province_id)
    {
        $cities = $this->provinceRepository->findWithProvinceId($province_id);
        return $this->provinceDTOMaker->convertMany($cities);
    }

    public function searchProvinces(SearchProvinceDTO $provinceSearchDTO)
    {
        $provices = $this->provinceRepository->searchProvinces($provinceSearchDTO->getProvinceIds());
        return $this->provinceDTOMaker->convertMany($provices);
    }
}