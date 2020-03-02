<?php

namespace Domains\Menus\Services;


use Domains\Menus\Repositories\MenusRepository;
use Domains\Menus\Services\Contracts\DTOs\MenusCreateDTO;

/**
 * Class EventsService
 */
class MenusService
{
    /**
     * @var MenusRepository
     */
    private $menus;


    /**
     * NewsService constructor.
     * @param MenusRepository $menus
     */
    public function __construct(MenusRepository $menus)
    {
        $this->menus = $menus;
    }

    public function createMenu(MenusCreateDTO $createDTO)
    {

    }
}