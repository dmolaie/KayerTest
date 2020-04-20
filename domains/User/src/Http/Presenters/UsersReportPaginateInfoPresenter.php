<?php


namespace Domains\News\Http\Presenters;


use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Presenters\Http\Presenters\PaginateInfoPresenter;
use Domains\User\Http\Presenters\UserInfoReportPresenter;

class UsersReportPaginateInfoPresenter
{
    /**
     * @var PaginateInfoPresenter
     */
    private $paginateInfoPresenter;
    /**
     * @var NewsInfoPresenter
     */
    private $userInfoReportPresenter;

    public function __construct(
        PaginateInfoPresenter $paginateInfoPresenter,
        UserInfoReportPresenter $userInfoReportPresenter
    ) {
        $this->paginateInfoPresenter = $paginateInfoPresenter;
        $this->userInfoReportPresenter = $userInfoReportPresenter;
    }

    public function transform(PaginationDTOMaker $paginationDTOMaker)
    {
        $paginateResult = $this->paginateInfoPresenter->transform($paginationDTOMaker);
        $paginateResult['items'] = $this->userInfoReportPresenter->transformMany(
            $paginationDTOMaker->getItems()
        );
        return $paginateResult;
    }
}