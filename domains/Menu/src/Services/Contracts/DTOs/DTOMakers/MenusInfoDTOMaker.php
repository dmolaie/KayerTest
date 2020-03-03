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
            ->setTitle($menu->title)
            ->setName($menu->name)
            ->setType($menu->type)
            ->setLink($menu->link)
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
        $child = $menu->child()->when($activeList, function ($query) {
            return $query->where('active', true);
        })->orderBy('priority')->get();
        return $child->map(function ($child) {
            return $this->convert($child);
        })->toArray();
    }
}