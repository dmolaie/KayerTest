<?php


namespace Domains\User\Http\Presenters;


use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Presenters\Http\Presenters\PaginateInfoPresenter;

class UserAngelPaginateInfoPresenter
{
    /**
     * @var PaginateInfoPresenter
     */
    private $paginateInfoPresenter;
    /**
     * @var UserBriefInfoPresenter
     */
    private $angelBriefInfoPresenter;

    public function __construct(
        PaginateInfoPresenter $paginateInfoPresenter,
        UserAngelBriefInfoPresenter $angelBriefInfoPresenter
    ) {

        $this->paginateInfoPresenter = $paginateInfoPresenter;
        $this->angelBriefInfoPresenter = $angelBriefInfoPresenter;
    }

    public function transform(PaginationDTOMaker $paginationDTOMaker)
    {
        $paginateResult = $this->paginateInfoPresenter->transform($paginationDTOMaker);
        $paginateResult['items'] = $this->angelBriefInfoPresenter->transformMany(
            $paginationDTOMaker->getItems()
        );
        return $paginateResult;
    }
}