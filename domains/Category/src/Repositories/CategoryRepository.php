<?php


namespace Domains\Category\Repositories;

use Domains\Category\Entities\Category;

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
}