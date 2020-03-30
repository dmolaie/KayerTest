<?php

namespace Domains\Site\Services;


use Domains\Category\Services\CategoryService;
use Domains\Locations\Repositories\CityRepository;
use Domains\Locations\Transformers\CityTransformer;
use Domains\Menu\Services\MenusContentService;
use Domains\News\Services\Contracts\DTOs\NewsFilterDTO;
use Domains\News\Services\NewsService;

class SiteServices
{
    /**
     * @var MenusContentService
     */
    private $menusService;

    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * @var NewsFilterDTO
     */
    private $newsFilterDTO;

    /**
     * @var NewsService
     */
    private $newsService;


    public function __construct(MenusContentService $menusService,CategoryService $categoryService,NewsService $newsService,NewsFilterDTO $newsFilterDTO)
    {
        $this->menusService = $menusService;
        $this->categoryService = $categoryService;
        $this->newsFilterDTO = $newsFilterDTO;
        $this->newsService = $newsService;
    }

    public function getAll()
    {
    }

    public function find(int $id)
    {
    }

    public function getPageContent(string $pageSlug)
    {
        return $this->menusService->getPageContent($pageSlug);
    }

    private function getIdCategoryNews($categorySlug)
    {
        return $this->categoryService->getCategoryBySlug($categorySlug);
    }

    public function getFilterNews($categories)
    {
        $categoryId = $this->getIdCategoryNews($categories);
        $this->newsFilterDTO->setCategoryIds([$categoryId]);
        $this->newsFilterDTO->setNewsInputStatus('accept');
        $this->newsFilterDTO->setSort('DESC');
        return $this->newsService->filterNews($this->newsFilterDTO);
    }

    public function getDetailNews($slug)
    {
        return $this->newsService->getNewsDetailWithSlug($slug);
    }

    public function getActiveCategoryByType($type)
    {
        return $this->categoryService->getActiveCategoryByType($type);
    }
}