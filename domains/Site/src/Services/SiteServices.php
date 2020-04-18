<?php

namespace Domains\Site\Services;


use Domains\Article\Services\ArticleService;
use Domains\Category\Services\CategoryService;
use Domains\Event\Services\Contracts\DTOs\EventFilterDTO;
use Domains\Event\Services\EventService;
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
    /**
     * @var EventService
     */
    private $eventService;
    /**
     * @var ArticleService
     */
    private $articleService;
    /**
     * @var EventFilterDTO
     */
    private $eventFilterDTO;


    public function __construct(MenusContentService $menusService, CategoryService $categoryService, NewsService $newsService, NewsFilterDTO $newsFilterDTO, EventService $eventService, EventFilterDTO $eventFilterDTO, ArticleService $articleService)
    {
        $this->menusService = $menusService;
        $this->categoryService = $categoryService;
        $this->newsFilterDTO = $newsFilterDTO;
        $this->newsService = $newsService;
        $this->eventService = $eventService;
        $this->articleService = $articleService;
        $this->eventFilterDTO = $eventFilterDTO;
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

    public function getFilterNews($categories)
    {
        $categoryId = $this->getIdCategoryNews($categories);
        $this->newsFilterDTO->setCategoryIds([$categoryId]);
        $this->newsFilterDTO->setNewsInputStatus('accept');
        $this->newsFilterDTO->setSort('DESC');
        return $this->newsService->filterNews($this->newsFilterDTO);
    }

    private function getIdCategoryNews($categorySlug)
    {
        return $this->categoryService->getCategoryBySlug($categorySlug);
    }

    public function getFilterEvent()
    {
        $this->eventFilterDTO->setEventInputStatus('accept');
        $this->eventFilterDTO->setSort('DESC');
        return $this->eventService->filterEvent($this->eventFilterDTO);
    }

    public function getDetailNews($slug)
    {
        return $this->newsService->getNewsDetailWithSlug($slug);
    }

    public function getDetailEvents($slug)
    {
        return $this->eventService->getEventsDetailWithSlug($slug);
    }

    public function getActiveCategoryByType($type)
    {
        return $this->categoryService->getActiveCategoryByType($type);
    }

    public function getNewsWithUuid($uuid)
    {
        return $this->newsService->getNewsDetailWithUuid($uuid);
    }

    public function getEventsWithUuid($uuid)
    {
        return $this->eventService->getEventDetailWithUuid($uuid);
    }

    public function getArticleWithUuid($uuid)
    {
        return $this->articleService->getArticleDetailWithUuid($uuid);
    }

    public function getNews($status, $sort)
    {
        $this->newsFilterDTO->setNewsInputStatus($status);
        $this->newsFilterDTO->setSort($sort);
        return $this->newsService->filterNews($this->newsFilterDTO)->getItems();

    }

    public function getEvent($status, $sort, $slugCategory)
    {
        $this->eventFilterDTO->setEventInputStatus($status);
        $this->eventFilterDTO->setCategoryIds([$this->categoryService->getCategoryBySlug($slugCategory)]);
        $this->eventFilterDTO->setSort($sort);
        return $this->eventService->filterEvent($this->eventFilterDTO)->getItems();
    }

}