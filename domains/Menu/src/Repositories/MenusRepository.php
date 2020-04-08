<?php

namespace Domains\Menu\Repositories;

use Domains\Menu\Entities\Menus;
use Domains\Menu\Services\Contracts\DTOs\MenusCreateDTO;
use Domains\Menu\Services\Contracts\DTOs\MenusEditDTO;

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
        if (!in_array($menusCreateDTO->getType(), [$type['link_type'], $type['separator_type'], $type['article_type']])) {
            $menus->categories()->attach($menusCreateDTO->getManuableId());
        } elseif ($menusCreateDTO->getType() == $type['article_type']) {
            $menus->articles()->attach($menusCreateDTO->getManuableId());
        }
        return $menus;
    }

    public function editMenu(MenusEditDTO $menusEditDTO): Menus
    {
        $type = config('menus.menus_type');
        $menus = $this->entityName::findOrFail($menusEditDTO->getMenuId());
        $menus->name = $menusEditDTO->getName();
        $menus->title = $menusEditDTO->getTitle();
        $menus->alias = $menusEditDTO->getAlias();
        $menus->type = $menusEditDTO->getType();
        $menus->link = $menusEditDTO->getLink();
        $menus->language = $menusEditDTO->getLanguage();
        $menus->publish_date = $menusEditDTO->getPublishDate();
        $menus->editor_id = $menusEditDTO->getEditor()->id;
        $menus->parent_id = $menusEditDTO->getParentId();
        $menus->priority = $menusEditDTO->getPriority();
        $menus->active = $menusEditDTO->getActive();
        $getDirty = $menus->getDirty();
        if (!empty($getDirty)) {
            $menus->save();
        }
        $menus->categories()->sync([]);
        $menus->articles()->sync([]);

        if (!in_array($menusEditDTO->getType(), [$type['link_type'], $type['separator_type'], $type['article_type']])) {
            $menus->categories()->attach($menusEditDTO->getManuableId());
        } elseif ($menusEditDTO->getType() == $type['article_type']) {
            $menus->articles()->attach($menusEditDTO->getManuableId());
        }
        return $menus;
    }

    public function destroyMenu(int $menuId)
    {
        $this->entityName::where('parent_id', '=', $menuId)->delete();
        return $this->entityName::where('id', '=', $menuId)->delete();
    }

    public function savePriority(array $priorityDTOs)
    {
        return \DB::transaction(function () use ($priorityDTOs) {
            foreach ($priorityDTOs as $priorityDTO) {
                $menu = $this->entityName::findOrFail($priorityDTO->getId());
                $menu->priority = $priorityDTO->getPriority();
                $menu->parent_id = $priorityDTO->getParentId();
                if ($menu->getDirty()) {
                    $menu->save();
                }
            }
            return $this->getList(false);
        });
    }

    public function getList(bool $activeList)
    {
        return $this->entityName::whereNull('parent_id')
            ->when($activeList, function ($query) {
                return $query->where('active', true);
            })->orderBy('priority')->with([
                'child' => function ($q)use($activeList) {
                    $q->orderBy('priority')
                    ->when($activeList,function ($query) {
                        return $query->where('active', true);
                    });
                }
            ])->get();
    }

    public function findByAlias(string $pageAlias)
    {
        return $this->entityName::where('alias', $pageAlias)
            ->firstOrFail();
    }

}