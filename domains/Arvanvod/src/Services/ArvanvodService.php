<?php


namespace Domains\Arvanvod\Services;



use Domains\Arvanvod\Repositories\ArvanvodRepository;
use Domains\Arvanvod\Services\Contracts\DTOs\ArvanvodCreateDTO;

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
     * @param ArvanvodRepository $arvanvodRepository
     */
    public function __construct(ArvanvodRepository $arvanvodRepository)
    {
        $this->arvanvodRepository = $arvanvodRepository;
    }

    public function createArvanvod(ArvanvodCreateDTO $arvanvodCreateDTO)
    {
        $arvanvod = $this->arvanvodRepository->create($arvanvodCreateDTO);
        return $this->eventInfoDTOMaker->convert($arvanvod);
    }

}