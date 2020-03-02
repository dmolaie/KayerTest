<?php

namespace Domains\Menus\Services\Contracts\DTOs\DTOMakers;

use Domains\Menus\Entities\Menus;
use Domains\Menus\Services\Contracts\DTOs\MenusInfoDTO;

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
            ->setPublishDate($menu->publish_date)
            ->setLanguage($menu->language)
            ->setAlias($menu->alias)
            ->setPublisher($menu->publisher)
            ->setEditorId($menu->editor_id);
        return $menusInfoDTO;
    }
}