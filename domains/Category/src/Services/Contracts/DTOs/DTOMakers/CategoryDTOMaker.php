<?php


namespace Domains\Category\Services\Contracts\DTOs\DTOMakers;


use Domains\Category\Entities\Category;
use Domains\Category\Services\Contracts\DTOs\CategoryDTO;

class CategoryDTOMaker
{
    public function convertMany($categories)
    {
        return $categories->map(function ($category) {
            return $this->convert($category);
        })->toArray();
    }

    public function convert(Category $category)
    {
        $categoryDTO = new CategoryDTO();
        $categoryDTO->setName($category->name)
            ->setNameFa($category->name_fa)
            ->setType($category->type)
            ->setChildren(
                $this->getCategoryChildren($category)
            );
        return $categoryDTO;

    }

    private function getCategoryChildren(Category $category)
    {
        return $category->children->map(function ($child) {
            return $this->convert($child);
        });
    }
}