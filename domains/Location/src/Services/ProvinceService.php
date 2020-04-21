<?php

namespace Domains\Location\Services;


use Domains\Location\Contracts\DTOs\DTOMakers\ProvinceDTOMaker;
use Domains\Location\Repositories\ProvinceRepository;
use Domains\Location\Services\Contracts\DTOs\SearchProvinceDTO;
use Domains\Location\Transformers\ProvinceTransformer;
use Domains\Location\Services\Contracts\DTOs\ProvinceDTO;
use Domains\Location\Contracts\DTOs\Converters\ProvinceConverter;
use Domains\User\Services\UserService;

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
     * @var UserService
     */
    private $userService;

    /**
     * ProvinceServices constructor.
     * @param provinceRepository $provinceRepository
     * @param ProvinceDTOMaker $provinceDTOMaker
     * @param UserService $userService
     */
    public function __construct(
        provinceRepository $provinceRepository,
        ProvinceDTOMaker $provinceDTOMaker,
        UserService $userService
    )
    {
        $this->provinceRepository = $provinceRepository;
        $this->provinceDTOMaker = $provinceDTOMaker;
        $this->userService = $userService;
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
     * @param $provinceIds
     * @return array
     */
    public function getProvincesByProvinceIds(array $provinceIds)
    {
        $provinces = $this->provinceRepository->findWithProvinceIds($provinceIds);
        return $this->provinceDTOMaker->convertMany($provinces);
    }

    public function searchProvinces(SearchProvinceDTO $provinceSearchDTO)
    {
        $provinces = $this->provinceRepository->searchProvinces($provinceSearchDTO->getProvinceIds());
        return $this->provinceDTOMaker->convertMany($provinces);
    }

    public function finBySlug($slug)
    {
        return $this->provinceRepository->finBySlug($slug);
    }

    public function getUserProvinces(int $userId)
    {
        $provinceIds =  $this->userService->getProvinceIds($userId);
        if(empty($provinceIds)){
            return $this->getAll();
        }
        return $this->getProvincesByProvinceIds($provinceIds);
    }
}