<?php


namespace Domains\User\Http\Presenters;


use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Presenters\Http\Presenters\PaginateInfoPresenter;

class UserPaginateInfoPresenter
{
    /**
     * @var PaginateInfoPresenter
     */
    private $paginateInfoPresenter;
    /**
     * @var UserBriefInfoPresenter
     */
    private $briefInfoPresenter;

    public function __construct(
        PaginateInfoPresenter $paginateInfoPresenter,
        UserBriefInfoPresenter $briefInfoPresenter
    ) {

        $this->paginateInfoPresenter = $paginateInfoPresenter;
        $this->briefInfoPresenter = $briefInfoPresenter;
    }

    public function transform(PaginationDTOMaker $paginationDTOMaker)
    {
        $paginateResult = $this->paginateInfoPresenter->transform($paginationDTOMaker);
        $paginateResult['items'] = $this->briefInfoPresenter->transformMany(
            $paginationDTOMaker->getItems()
        );
        return $paginateResult;
    }
}