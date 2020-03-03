<?php

namespace Domains\Menus\Services;


use Domains\Menus\Repositories\MenusRepository;
use Domains\Menus\Services\Contracts\DTOs\DTOMakers\MenusInfoDTOMaker;
use Domains\Menus\Services\Contracts\DTOs\MenusCreateDTO;

/**
 * Class EventsService
 */
class MenusService
{
    /**
     * @var MenusRepository
     */
    private $menusRepository;

    /**
     * @var MenusInfoDTOMaker
     */
    private $menusInfoDTOMaker;


    /**
     * NewsService constructor.
     * @param MenusRepository $menusRepository
     * @param MenusInfoDTOMaker $menusInfoDTOMaker
     */
    public function __construct(
        MenusRepository $menusRepository,
        MenusInfoDTOMaker $menusInfoDTOMaker
    )
    {
        $this->menusRepository = $menusRepository;
        $this->menusInfoDTOMaker = $menusInfoDTOMaker;
    }

    public function createMenu(MenusCreateDTO $createDTO)
    {
        $createMenuData = $this->menusRepository->createMenu($createDTO);
        return $this->menusInfoDTOMaker->convert($createMenuData);
    }
}