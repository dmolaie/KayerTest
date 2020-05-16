<?php


namespace Domains\Arvanvod\Services;



use Domains\Arvanvod\Exceptions\ArvanvodNotFoundErrorException;
use Domains\Arvanvod\Exceptions\ArvanvodRepeatErrorException;
use Domains\Arvanvod\Repositories\ArvanvodRepository;
use Domains\Arvanvod\Services\Contracts\DTOs\ArvanvodCreateDTO;
use Domains\Arvanvod\Services\Contracts\DTOs\ArvanvodListDTO;
use Domains\Arvanvod\Services\Contracts\DTOs\DTOMakers\ArvanvodInfoDTOMaker;

/**
 * Class ArvanvodService
 */
class ArvanvodService
{
    /**
     * @var ArvanvodRepository
     */
    private $arvanvodRepository;
    /**
     * @var ArvanvodInfoDTOMaker
     */
    private $arvanvodInfoDTOMaker;

    /**
     * @param ArvanvodRepository $arvanvodRepository
     * @param ArvanvodInfoDTOMaker $arvanvodInfoDTOMaker
     */
    public function __construct(ArvanvodRepository $arvanvodRepository,ArvanvodInfoDTOMaker $arvanvodInfoDTOMaker)
    {
        $this->arvanvodRepository = $arvanvodRepository;
        $this->arvanvodInfoDTOMaker = $arvanvodInfoDTOMaker;
    }

    /**
     * @param ArvanvodCreateDTO $arvanvodCreateDTO
     * @return mixed
     * @throws ArvanvodRepeatErrorException
     */
    public function createArvanvod(ArvanvodCreateDTO $arvanvodCreateDTO)
    {
        $arvanvodListDTO = new ArvanvodListDTO();
        $arvanvodListDTO->setUserId($arvanvodCreateDTO->getUserId());
        $this->arvanvodRepository->destroyArvanvod($arvanvodListDTO);
        $arvanvod = $this->arvanvodRepository->create($arvanvodCreateDTO);
        return $this->arvanvodInfoDTOMaker->convert($arvanvod);
    }

    /**
     * @param ArvanvodListDTO $arvanvodListDTO
     * @return mixed
     */
    public function getList(ArvanvodListDTO $arvanvodListDTO)
    {
        $arvanvod = $this->arvanvodRepository->findOrFailByUserId($arvanvodListDTO);
        return $this->arvanvodInfoDTOMaker->convert($arvanvod);
    }

    /**
     * @param ArvanvodListDTO $arvanvodListDTO
     * @return mixed
     * @throws ArvanvodNotFoundErrorException
     */
    public function destroyArvanvod(ArvanvodListDTO $arvanvodListDTO)
    {
        $result =  $this->arvanvodRepository->destroyArvanvod($arvanvodListDTO);
        if (!$result) {
            throw new ArvanvodNotFoundErrorException(trans('arvanvod::response.arvanvod_not_found'));
        }
        return $result;
    }

}