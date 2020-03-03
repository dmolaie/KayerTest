<?php

namespace Domains\Menu\Repositories;

use Domains\Menu\Entities\Menus;
use Domains\Menu\Services\Contracts\DTOs\MenusCreateDTO;

class MenusRepository
{
    protected $entityName = Menus::class;

    public function createMenu(MenusCreateDTO $menusCreateDTO) :Menus
    {
        $menus = new $this->entityName;
        $menus->name = $menusCreateDTO->getName();
        $menus->title = $menusCreateDTO->getTitle();
        $menus->alias = $menusCreateDTO->getAlias();
        $menus->type = $menusCreateDTO->getType();
        $menus->link = $menusCreateDTO->getLink();
        $menus->language = $menusCreateDTO->getLanguage();
        $menus->publish_date = $menusCreateDTO->getPublishDate();
        $menus->publisher_id = $menusCreateDTO->getPublisher()->id;
        $menus->parent_id = $menusCreateDTO->getParentId();
        $menus->save();
        return  $menus;
    }

}