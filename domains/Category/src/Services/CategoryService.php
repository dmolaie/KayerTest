<?php


namespace Domains\Category\Services;


use Domains\Article\Services\ArticleService;
use Domains\Article\Services\Contracts\DTOs\ArticleFilterDTO;
use Domains\Category\Repositories\CategoryRepository;
use Domains\Category\Services\Contracts\DTOs\CategoryCreateDTO;
use Domains\Category\Services\Contracts\DTOs\CategoryDTO;
use Domains\Category\Services\Contracts\DTOs\DTOMakers\CategoryDTOMaker;
use Domains\Event\Services\Contracts\DTOs\EventFilterDTO;
use Domains\Event\Services\EventService;
use Domains\News\Services\Contracts\DTOs\NewsFilterDTO;
use Domains\News\Services\NewsService;

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
    /**
     * @var NewsService
     */
    private $newsService;
    /**
     * @var EventService
     */
    private $eventService;
    /**
     * @var ArticleService
     */
    private $articleService;

    public function __construct(
        CategoryRepository $categoryRepository,
        CategoryDTOMaker $categoryDTOMaker,
        NewsService $newsService,
        EventService $eventService,
        ArticleService $articleService
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->categoryDTOMaker = $categoryDTOMaker;
        $this->newsService = $newsService;
        $this->eventService = $eventService;
        $this->articleService = $articleService;
    }

    public function getCategoryByType(string $categoryType): array
    {
        $categories = $this->categoryRepository->findCategoryWithType($categoryType);
        return $this->categoryDTOMaker->convertMany($categories);
    }

    public function getCategoryBySlug(string $categorySlug): int
    {
        $category = $this->categoryRepository->findCategoryWithSlug($categorySlug);
        return $this->categoryDTOMaker->convert($category)->getId();
    }

    public function createCategory(CategoryCreateDTO $createCategoryCreateDTO): CategoryDTO
    {
        $category = $this->categoryRepository->createCategory($createCategoryCreateDTO);
        return $this->categoryDTOMaker->convert($category);
    }

    public function findWithMenuId($menuId)
    {
        $category = $this->categoryRepository->findWithMenuId($menuId);

        if ($category->type == config('category.news_type')) {
            $newsFilter = new NewsFilterDTO();
            $newsFilter->setCategoryIds([$category->id]);
            return $this->newsService->filterNews($newsFilter);
        }
        if ($category->type == config('category.event_type')) {
            $eventFilterDTO = new EventFilterDTO();
            $eventFilterDTO->setCategoryIds([$category->id]);
            return $this->eventService->filterEvent($eventFilterDTO);
        }
        if ($category->type == config('category.article_type')) {
            $articleFilterDTO = new ArticleFilterDTO();
            $articleFilterDTO->setCategoryIds([$category->id]);
            return $this->articleService->filterArticle($articleFilterDTO);
        }
        return;
    }

    public function getActiveCategoryByType(string $categoryType): array
    {
        $categories = $this->categoryRepository->findCategoryWithType(
            $categoryType,true);
        return $this->categoryDTOMaker->convertMany($categories);
    }
}