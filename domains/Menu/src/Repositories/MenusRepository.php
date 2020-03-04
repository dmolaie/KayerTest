<?php

namespace Domains\Menu\Repositories;

use Domains\Menu\Entities\Menus;
use Domains\Menu\Services\Contracts\DTOs\MenusCreateDTO;

class MenusRepository
{
    protected $entityName = Menus::class;

    public function createMenu(MenusCreateDTO $menusCreateDTO): Menus
    {
        $type = config('menus.menus_type');
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
        $menus->priority = $menusCreateDTO->getPriority();
        $menus->active = true;
        $menus->save();
        if(!in_array($menusCreateDTO->getType(),[$type[2],$type[3],$type[1]])){
            $menus->categories()->attach($menusCreateDTO->getManuableId());
        }elseif($menusCreateDTO->getType() == $type[1]){
            $menus->articles()->attach($menusCreateDTO->getManuableId());
        }
        return $menus;
    }

    public function getList(bool $activeList)
    {
        return $this->entityName::whereNull('parent_id')
            ->when($activeList, function ($query) {
                return $query->where('active', true);
            })->orderBy('priority')->get();
    }

}