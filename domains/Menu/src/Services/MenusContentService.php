<?php

namespace Domains\Menu\Services;


use Domains\Article\Services\ArticleService;
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
     * NewsService constructor.
     * @param MenusRepository $menusRepository
     * @param ArticleService $articleService
     */
    public function __construct(
        MenusRepository $menusRepository,
        ArticleService $articleService
    ) {
        $this->menusRepository = $menusRepository;
        $this->articleService = $articleService;
    }

    public function getPageContent(string $pageSlug): MenuContentDTO
    {
        $page = $this->menusRepository->findByAlias($pageSlug);
        $menuContent = new MenuContentDTO();
        if ($page->type = config('menus.menus_type.article_type')) {
            $menuContent->setType($page->type)
                ->setContentObject(
                    $this->articleService->findWithMenuId($page->id));
            return $menuContent;
        }
    }
}