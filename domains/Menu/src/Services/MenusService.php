<?php

namespace Domains\Menu\Services;


use Domains\Menu\Repositories\MenusRepository;
use Domains\Menu\Services\Contracts\DTOs\DTOMakers\MenusInfoDTOMaker;
use Domains\Menu\Services\Contracts\DTOs\MenusCreateDTO;

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

    public function getList(bool $activeList = false): array
    {
        $menus = $this->menusRepository->getList($activeList);
        return $this->menusInfoDTOMaker->convertMany($menus);
    }
}