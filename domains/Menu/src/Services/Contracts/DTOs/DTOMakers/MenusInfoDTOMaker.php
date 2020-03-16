<?php

namespace Domains\Menu\Services\Contracts\DTOs\DTOMakers;

use Domains\Menu\Entities\Menus;
use Domains\Menu\Services\Contracts\DTOs\MenusInfoDTO;

class MenusInfoDTOMaker
{
    public function convertMany($menuCollection, Bool $activeList = false)
    {

        return $menuCollection->map(function ($menu) use ($activeList) {
            return $this->convert($menu, $activeList);
        })->toArray();
    }

    public function convert(Menus $menu, Bool $activeList = false): MenusInfoDTO
    {

        $menusInfoDTO = new MenusInfoDTO();
        $menusInfoDTO->setId($menu->id)
            ->setMenuableId($this->getMenuableId($menu))
            ->setTitle($menu->title)
            ->setName($menu->name)
            ->setType($menu->type)
            ->setLink($menu->link)
            ->setPriority($menu->priority)
            ->setParent($menu->parent)
            ->setChild(
                $this->getMenuChildren($menu, $activeList))
            ->setPublishDate($menu->publish_date)
            ->setLanguage($menu->language)
            ->setAlias($menu->alias)
            ->setPublisher($menu->publisher)
            ->setActive($menu->active)
            ->setPriority($menu->priority)
            ->setEditorId($menu->editor_id);
        return $menusInfoDTO;
    }

    private function getMenuChildren(Menus $menu, $activeList)
    {
        $child = $menu->child;
        return $child->map(function ($child) {
            return $this->convert($child);
        })->toArray();
    }

    private function getMenuableId(Menus $menu)
    {
        $type = config('menus.menus_type');

        if ($menu->type == $type['article_type']) {
            return $menu->articles->first()? $menu->articles->first()->id:null;
        }
        if (in_array($menu->type, [$type['list_news_type'], $type['list_event_type'], $type['list_article_type']])) {
            return $menu->categories->first()? $menu->categories->first()->id:null;
        }
        return null;
    }
}