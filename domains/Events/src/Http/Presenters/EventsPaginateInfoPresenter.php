<?php


namespace Domains\Events\Http\Presenters;


use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Presenters\Http\Presenters\PaginateInfoPresenter;

class EventsPaginateInfoPresenter
{
    /**
     * @var PaginateInfoPresenter
     */
    private $paginateInfoPresenter;

    /**
     * @var EventsInfoPresenter
     */
    private $eventsInfoPresenter;

    public function __construct(PaginateInfoPresenter $paginateInfoPresenter, EventsInfoPresenter $eventsInfoPresenter)
    {
        $this->paginateInfoPresenter = $paginateInfoPresenter;
        $this->eventsInfoPresenter = $eventsInfoPresenter;
    }

    public function transform(PaginationDTOMaker $paginationDTOMaker)
    {
        $paginateResult = $this->paginateInfoPresenter->transform($paginationDTOMaker);
        $paginateResult['items'] = $this->eventsInfoPresenter->transformMany($paginationDTOMaker->getItems());
        return $paginateResult;
    }
}