<?php

namespace Domains\Menu\Services;


use Domains\Article\Services\ArticleService;
use Domains\Category\Services\CategoryService;
use Domains\Menu\Repositories\MenusRepository;
use Domains\Menu\Services\Contracts\DTOs\MenuContentDTO;

/**
 * Class MenusContentService
 */
class MenusContentService
{
    /**
     * @var MenusRepository
     */
    private $menusRepository;
    /**
     * @var ArticleService
     */
    private $articleService;
    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * NewsService constructor.
     * @param MenusRepository $menusRepository
     * @param ArticleService $articleService
     * @param CategoryService $categoryService
     */
    public function __construct(
        MenusRepository $menusRepository,
        ArticleService $articleService,
        CategoryService $categoryService
    ) {
        $this->menusRepository = $menusRepository;
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
    }

    public function getPageContent(string $pageSlug): MenuContentDTO
    {
        $page = $this->menusRepository->findByAlias($pageSlug);
        $menuContent = new MenuContentDTO();
        $menuContent->setType($page->type);
        if ($page->type == config('menus.menus_type.article_type')) {
            $menuContent->setContentObject(
                    $this->articleService->findWithMenuId($page->id));
            return $menuContent;
        }
        if (in_array($page->type ,[
            config('menus.menus_type.list_news_type'),
            config('menus.menus_type.list_event_type'),
            config('menus.menus_type.list_article_type'),
        ])) {
            $menuContent->setContentObject(
                    $this->categoryService->findWithMenuId($page->id));
            return $menuContent;
        }
        return $menuContent;

    }
}