<?php


namespace Domains\News\Http\Presenters;


use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Presenters\Http\Presenters\PaginateInfoPresenter;

class NewsPaginateInfoPresenter
{
    /**
     * @var PaginateInfoPresenter
     */
    private $paginateInfoPresenter;
    /**
     * @var NewsInfoPresenter
     */
    private $newsInfoPresenter;

    public function __construct(
        PaginateInfoPresenter $paginateInfoPresenter,
        NewsInfoPresenter $newsInfoPresenter
    ) {

        $this->paginateInfoPresenter = $paginateInfoPresenter;
        $this->newsInfoPresenter = $newsInfoPresenter;
    }

    public function transform(PaginationDTOMaker $paginationDTOMaker)
    {
        $paginateResult = $this->paginateInfoPresenter->transform($paginationDTOMaker);
        $paginateResult['items'] = $this->newsInfoPresenter->transformMany(
            $paginationDTOMaker->getItems()
        );
        return $paginateResult;
    }
}