<?php

namespace Domains\Site\Services;


use Domains\Article\Services\ArticleService;
use Domains\Article\Services\Contracts\DTOs\ArticleFilterDTO;
use Domains\Category\Services\CategoryService;
use Domains\Event\Services\Contracts\DTOs\EventFilterDTO;
use Domains\Event\Services\EventService;
use Domains\Location\Services\ProvinceService;
use Domains\Locations\Repositories\CityRepository;
use Domains\Locations\Transformers\CityTransformer;
use Domains\Media\Services\Contracts\DTOs\MediaFilterDTO;
use Domains\Media\Services\MediaService;
use Domains\Menu\Services\MenusContentService;
use Domains\News\Services\Contracts\DTOs\NewsFilterDTO;
use Domains\News\Services\NewsService;
use Domains\Slider\Services\Contracts\DTOs\SliderFilterDTO;
use Domains\Slider\Services\SliderService;
use Domains\User\Services\UserService;

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

    /**
     * @var ProvinceService
     */
    private $provinceService;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var MediaService
     */
    private $mediaService;
    /**
     * @var SliderService
     */
    private $sliderService;


    public function __construct(
        MenusContentService $menusService,
        CategoryService $categoryService,
        NewsService $newsService,
        NewsFilterDTO $newsFilterDTO,
        EventService $eventService,
        EventFilterDTO $eventFilterDTO,
        ArticleService $articleService,
        ProvinceService $provinceService,
        UserService $userService,
        MediaService $mediaService,
        SliderService $sliderService
    ) {
        $this->menusService = $menusService;
        $this->categoryService = $categoryService;
        $this->newsFilterDTO = $newsFilterDTO;
        $this->newsService = $newsService;
        $this->eventService = $eventService;
        $this->articleService = $articleService;
        $this->eventFilterDTO = $eventFilterDTO;
        $this->provinceService = $provinceService;
        $this->userService = $userService;
        $this->mediaService = $mediaService;
        $this->sliderService = $sliderService;
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

    public function getFilterNews(NewsFilterDTO $newsFilterDTO, $subDomain = null, $categorySlugs = null)
    {
        $province = $subDomain ?? $this->getLocations('global-fa');
        $newsFilterDTO->setCategoryIds(
            $categorySlugs ? $this->getCategoryIdBySlug($categorySlugs) : null)
            ->setProvinceIds([$province->id]);
        $newsList = $this->newsService->filterNews($newsFilterDTO);

        if (!empty($newsList->getItems())) {
            return $newsList->getPaginationRecords();
        }
        $newsFilterDTO->setProvinceIds([$this->getLocations('global-fa')->id]);

        return $this->newsService->filterNews($newsFilterDTO)->getPaginationRecords();
    }

    private function getCategoryIdBySlug($categorySlugs)
    {
        return $this->categoryService->getCategoryBySlugs($categorySlugs);
    }

    public function getLocations($slug)
    {
        return $this->provinceService->finBySlug($slug);
    }

    public function getFilterEvent(EventFilterDTO $eventFilterDTO, $subDomain = null, $categorySlugs = null)
    {
        $province = $subDomain ?? $this->getLocations('global-fa');
        $eventFilterDTO->setCategoryIds(
            $categorySlugs ? $this->getCategoryIdBySlug($categorySlugs) : null)
            ->setProvinceIds([$province->id]);
        $eventList = $this->eventService->filterEvent($eventFilterDTO);

        if (!empty($eventList->getItems())) {
            return $eventList->getPaginationRecords();
        }
        $eventFilterDTO->setProvinceIds([$this->getLocations('global-fa')->id]);

        return $this->eventService->filterEvent($eventFilterDTO)->getPaginationRecords();
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

    public function getNews($status, $sort, $subdomain = null)
    {
        $globalSubDomain = $this->getLocations('global-fa');
        $this->newsFilterDTO->setNewsInputStatus($status);
        $this->newsFilterDTO->setSort($sort);

        if (!$subdomain) {
            $this->newsFilterDTO->addProvinceId($globalSubDomain->id);
            return $this->newsService->filterNews($this->newsFilterDTO)->getItems();
        }
        $this->newsFilterDTO->addProvinceId($subdomain->id);
        $news = $this->newsService->filterNews($this->newsFilterDTO)->getItems();

        if (empty($news)) {
            $this->newsFilterDTO->setProvinceIds([]);
            $this->newsFilterDTO->addProvinceId($globalSubDomain->id);
            return $this->newsService->filterNews($this->newsFilterDTO)->getItems();
        }
        return $news;
    }

    public function getEvent($status, $sort, $subdomain = null)
    {
        $globalSubDomain = $this->getLocations('global-fa');
        $this->eventFilterDTO->setEventInputStatus($status);
        $this->eventFilterDTO->setSort($sort);
        if (!$subdomain) {
            $this->eventFilterDTO->addProvinceId($globalSubDomain->id);
            return $this->eventService->filterEvent($this->eventFilterDTO)->getItems();
        }
        $this->eventFilterDTO->addProvinceId($subdomain->id);
        $events = $this->eventService->filterEvent($this->eventFilterDTO)->getItems();

        if (empty($events)) {
            $this->newsFilterDTO->setProvinceIds([]);
            $this->eventFilterDTO->addProvinceId($globalSubDomain->id);
            return $this->eventService->filterEvent($this->eventFilterDTO)->getItems();
        }

        return $this->eventService->filterEvent($this->eventFilterDTO)->getItems();
    }

    public function getSubdomain($url)
    {
        $urlPart = explode('.', $url);
        $categoryList = $this->getLocations($urlPart[0]);
        if ($categoryList) {
            return $categoryList;
        }
        return null;
    }

    public function getInfoUserWithUuid($uuid)
    {
        return $this->userService->getUserBaseInfoWithUuid($uuid);
    }

    public function getMediaListByType(MediaFilterDTO $mediaFilter, $subDomain = null, $categorySlugs = null)
    {
        $province = $subDomain ?? $this->getLocations('global-fa');
        $mediaFilter->setCategoryIds(
            $categorySlugs ? $this->getCategoryIdBySlug($categorySlugs) : null)
            ->setProvinceId($province->id);
        $media = $this->mediaService->filterMedia($mediaFilter);
        if (!empty($media->getItems())) {
            return $media;
        }
        $mediaFilter->setProvinceId($this->getLocations('global-fa')->id);
        return $this->mediaService->filterMedia($mediaFilter);
    }

    public function getMediaByUuid(string $uuid)
    {
        return $this->mediaService->getMediaDetailWithUuid($uuid);
    }

    public function getDetailMedia($slug)
    {
        return $this->mediaService->getMediaDetailWithSlug($slug);
    }

    public function getArticleList(ArticleFilterDTO $articleFilterDTO, $subDomain = null, $categorySlugs = null)
    {
        $province = $subDomain ?? $this->getLocations('global-fa');
        $articleFilterDTO->setCategoryIds(
            $categorySlugs ? $this->getCategoryIdBySlug($categorySlugs) : null)
            ->setProvinceId($province->id);
        $articles = $this->articleService->filterArticle($articleFilterDTO);

        if (!empty($articles->getItems())) {
            return $articles->getPaginationRecords();
        }
        $articleFilterDTO->setProvinceId($this->getLocations('global-fa')->id);
        return $this->articleService->filterArticle($articleFilterDTO)->getPaginationRecords();
    }

    public function getDetailArticle(string $slug)
    {
        return $this->articleService->getArticleDetailWithSlug($slug);

    }

    public function getSliderList(SliderFilterDTO $sliderFilterDTO, $subDomain = null)
    {
        $province = $subDomain ?? $this->getLocations('global-fa');
        $sliderFilterDTO->setProvinceIds([$province->id]);
        $sliders = $this->sliderService->filterSlider($sliderFilterDTO);
        if (!empty($sliders->getItems())) {
            return $sliders->getItems();
        }
        $sliderFilterDTO->setProvinceIds([$this->getLocations('global-fa')->id]);
        return $this->sliderService->filterSlider($sliderFilterDTO)->getItems();
    }

    public function getActiveCategoryByParentSlug(string $slug)
    {
        return $this->categoryService->findCategoryWithParentSlug($slug);
    }
}