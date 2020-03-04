<?php

namespace Domains\Menu\Services;


use Domains\Menu\Exceptions\MenuNotFoundErrorException;
use Domains\Menu\Repositories\MenusRepository;
use Domains\Menu\Services\Contracts\DTOs\DTOMakers\MenusInfoDTOMaker;
use Domains\Menu\Services\Contracts\DTOs\MenusCreateDTO;
use Domains\Menu\Services\Contracts\DTOs\MenusEditDTO;

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
    ) {
        $this->menusRepository = $menusRepository;
        $this->menusInfoDTOMaker = $menusInfoDTOMaker;
    }

    public function createMenu(MenusCreateDTO $createDTO)
    {
        $createMenuData = $this->menusRepository->createMenu($createDTO);
        return $this->menusInfoDTOMaker->convert($createMenuData);
    }

    public function editMenu(MenusEditDTO $menusEditDTO)
    {
        $editMenuData = $this->menusRepository->editMenu($menusEditDTO);
        return $this->menusInfoDTOMaker->convert($editMenuData);
    }

    /**
     * @param int $menuId
     * @return mixed
     * @throws MenuNotFoundErrorException
     */
    public function destroyEvent(int $menuId)
    {
        $result = $this->menusRepository->destroyMenu($menuId);
        if (!$result) {
            throw new MenuNotFoundErrorException(trans('menus::response.menu_not_found'));
        }
        return $result;
    }

    public function getList(bool $activeList = false): array
    {
        $menus = $this->menusRepository->getList($activeList);
        return $this->menusInfoDTOMaker->convertMany($menus, $activeList);
    }

    public function savePriority(array $priorityDTOs): array
    {
        $menus = $this->menusRepository->savePriority($priorityDTOs);
        return $this->menusInfoDTOMaker->convertMany($menus);
    }
}