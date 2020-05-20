<?php


namespace Domains\Category\Repositories;

use Domains\Category\Entities\Category;
use Domains\Category\Services\Contracts\DTOs\CategoryCreateDTO;

class CategoryRepository
{
    protected $entityName = Category::class;

    public function getAll()
    {
        return $this->entityName::all();
    }

    public function find(int $id)
    {
        return $this->entityName::find($id);
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    public function findCategoryWithType(string $categoryType, $justActive = false)
    {
        return $this->entityName::where('type', '=', $categoryType)
            ->when($justActive, function ($query) {
                $query->where('is_active', '1');
            })
            ->whereNull('parent_id')->get();
    }

    public function findCategoryWithParentSlug(string $parentCategory, $justActive = false)
    {
        return $this->entityName::whereHas('parent',
            function ($q) use ($parentCategory) {
                $q->where('slug', '=', $parentCategory);

            })
            ->when($justActive, function ($query) {
                $query->where('is_active', '1');
            })->get();
    }

    public function findCategoryWithSlugs(array $categorySlugs)
    {
        return $this->entityName::whereIn('slug', $categorySlugs)
            ->where('is_active', 1)->get();
    }

    public function createCategory(CategoryCreateDTO $createCategoryCreateDTO): Category
    {
        $category = new $this->entityName;
        $category->name_en = $createCategoryCreateDTO->getNameEn();
        $category->name_fa = $createCategoryCreateDTO->getNameFa();
        $category->type = $createCategoryCreateDTO->getType();
        $category->slug = $createCategoryCreateDTO->getSlug();
        $category->is_active = $createCategoryCreateDTO->isStatus();
        $category->parent_id = $createCategoryCreateDTO->getParentId();

        $category->save();
        return $category;
    }

    public function findWithMenuId(int $menuId)
    {
        return $this->entityName::whereHas('menus', function ($q) use ($menuId) {
            $q->where('id', '=', $menuId);

        })->firstOrFail();
    }
}