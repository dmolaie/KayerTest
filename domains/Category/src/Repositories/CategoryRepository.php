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

    public function findCategoryWithType(string $categoryType)
    {
        return $this->entityName::where('type', '=', $categoryType)
            ->whereNull('parent_id')->get();
    }

    public function createCategory(CategoryCreateDTO $createCategoryCreateDTO): Category
    {
        $category = new $this->entityName;
        $category->name_en = $createCategoryCreateDTO->getNameEn();
        $category->name_fa = $createCategoryCreateDTO->getNameFa();
        $category->type = $createCategoryCreateDTO->getType();
        $category->parent_id = $createCategoryCreateDTO->getParentId();

        $category->save();
        return $category;
    }
}