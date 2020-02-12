<?php


namespace Domains\Category\Services;


use Domains\Category\Repositories\CategoryRepository;
use Domains\Category\Services\Contracts\DTOs\DTOMakers\CategoryDTOMaker;

class CategoryService
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var CategoryDTOMaker
     */
    private $categoryDTOMaker;

    public function __construct(CategoryRepository $categoryRepository, CategoryDTOMaker $categoryDTOMaker)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryDTOMaker = $categoryDTOMaker;
    }

    public function getCategoryByType(string $categoryType): array
    {
        $categories = $this->categoryRepository->findCategoryWithType($categoryType);
        return $this->categoryDTOMaker->convertMany($categories);
    }
}