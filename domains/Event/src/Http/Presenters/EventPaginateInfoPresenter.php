<?php


namespace Domains\Event\Http\Presenters;


use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Presenters\Http\Presenters\PaginateInfoPresenter;

class EventPaginateInfoPresenter
{
    /**
     * @var PaginateInfoPresenter
     */
    private $paginateInfoPresenter;

    /**
     * @var EventInfoPresenter
     */
    private $eventInfoPresenter;

    public function __construct(PaginateInfoPresenter $paginateInfoPresenter, EventInfoPresenter $eventInfoPresenter)
    {
        $this->paginateInfoPresenter = $paginateInfoPresenter;
        $this->eventInfoPresenter = $eventInfoPresenter;
    }

    public function transform(PaginationDTOMaker $paginationDTOMaker)
    {
        $paginateResult = $this->paginateInfoPresenter->transform($paginationDTOMaker);
        $paginateResult['items'] = $this->eventInfoPresenter->transformMany($paginationDTOMaker->getItems());
        return $paginateResult;
    }
}