<?php


namespace Domains\Site\Http\Presenters;


use Domains\Category\Services\Contracts\DTOs\CategoryDTO;

class CategoryInfoPresenter
{
    public function transformMany(array $categoryDTOs): array
    {
        $data = [];
        return $this->categoryData($categoryDTOs, $data);
    }

    private function categoryData($categoryDTOs, &$data, $parentId = null)
    {
        foreach ($categoryDTOs as $categoryDTO) {
            /**
             * @var $categoryDTO CategoryDTO
             */
            $data[] = [
                'id'        => $categoryDTO->getId(),
                'name_fa'   => $categoryDTO->getNameFa(),
                'name_en'   => $categoryDTO->getNameEn(),
                'type'      => $categoryDTO->getType(),
                'is_active' => $categoryDTO->isStatus(),
                'slug'      => $categoryDTO->getSlug(),
                'parentId'  => $parentId,

            ];
            $data = $this->categoryData($categoryDTO->getChildren(), $data, $categoryDTO->getId());

        }
        return $data;
    }

}