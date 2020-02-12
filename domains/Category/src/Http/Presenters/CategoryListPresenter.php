<?php


namespace Domains\Category\Http\Presenters;


use Domains\Category\Services\Contracts\DTOs\CategoryDTO;

class CategoryListPresenter
{
    public function transformMany($categoryDTOs)
    {
        return array_map(function ($categoryDTO) {
            return $this->transform($categoryDTO);
        }, $categoryDTOs);
    }

    public function transform(CategoryDTO $categoryDTO)
    {
        return [
            'name'     => $categoryDTO->getName(),
            'name_fa'  => $categoryDTO->getNameFa(),
            'type'     => $categoryDTO->getType(),
            'children' => $this->transformMany(
                $categoryDTO->getChildren()->toArray()
            )
        ];
    }
}