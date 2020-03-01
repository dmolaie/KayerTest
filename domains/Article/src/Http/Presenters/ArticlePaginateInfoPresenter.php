<?php


namespace Domains\Article\Http\Presenters;


use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Presenters\Http\Presenters\PaginateInfoPresenter;

class ArticlePaginateInfoPresenter
{
    /**
     * @var PaginateInfoPresenter
     */
    private $paginateInfoPresenter;
    /**
     * @var ArticleInfoPresenter
     */
    private $articleInfoPresenter;

    public function __construct(
        PaginateInfoPresenter $paginateInfoPresenter,
        ArticleInfoPresenter $articleInfoPresenter
    ) {

        $this->paginateInfoPresenter = $paginateInfoPresenter;
        $this->articleInfoPresenter = $articleInfoPresenter;
    }

    public function transform(PaginationDTOMaker $paginationDTOMaker)
    {
        $paginateResult = $this->paginateInfoPresenter->transform($paginationDTOMaker);
        $paginateResult['items'] = $this->articleInfoPresenter->transformMany(
            $paginationDTOMaker->getItems()
        );
        return $paginateResult;
    }
}