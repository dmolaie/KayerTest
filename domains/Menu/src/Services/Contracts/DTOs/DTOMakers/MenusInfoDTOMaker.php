<?php

namespace Domains\Menu\Services\Contracts\DTOs\DTOMakers;

use Domains\Menu\Entities\Menus;
use Domains\Menu\Services\Contracts\DTOs\MenusInfoDTO;

class MenusInfoDTOMaker
{
    public function convertMany($menuCollection)
    {
        return $menuCollection->map(function ($menu) {
            return $this->convert($menu);
        })->toArray();
    }

    public function convert(Menus $menu): MenusInfoDTO
    {
        $menusInfoDTO = new MenusInfoDTO();
        $menusInfoDTO->setId($menu->id)
            ->setTitle($menu->title)
            ->setName($menu->name)
            ->setType($menu->type)
            ->setLink($menu->link)
            ->setPriority($menu->priority)
            ->setParent($menu->parent)
            ->setChilde(
                $this->getMenuChildren($menu->child))
            ->setPublishDate($menu->publish_date)
            ->setLanguage($menu->language)
            ->setAlias($menu->alias)
            ->setPublisher($menu->publisher)
            ->setEditorId($menu->editor_id);
        return $menusInfoDTO;
    }

    private function getMenuChildren($child)
    {
        if(is_null($child)){
            return [];
        }
        return $child->map(function ($child) {
            return $this->convert($child);
        });
    }
}