<?php

namespace Domains\Site\Services;


use Domains\Locations\Repositories\CityRepository;
use Domains\Locations\Transformers\CityTransformer;
use Domains\Menu\Services\MenusContentService;

class SiteServices
{
    /**
     * @var MenusContentService
     */
    private $menusService;

    public function __construct(MenusContentService $menusService)
    {
        $this->menusService = $menusService;
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
}