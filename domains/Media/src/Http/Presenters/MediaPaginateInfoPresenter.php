<?php


namespace Domains\Media\Http\Presenters;


use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Presenters\Http\Presenters\PaginateInfoPresenter;

class MediaPaginateInfoPresenter
{
    /**
     * @var PaginateInfoPresenter
     */
    private $paginateInfoPresenter;
    /**
     * @var MediaInfoPresenter
     */
    private $mediaInfoPresenter;

    public function __construct(
        PaginateInfoPresenter $paginateInfoPresenter,
        MediaInfoPresenter $mediaInfoPresenter
    ) {

        $this->paginateInfoPresenter = $paginateInfoPresenter;
        $this->mediaInfoPresenter = $mediaInfoPresenter;
    }

    public function transform(PaginationDTOMaker $paginationDTOMaker)
    {
        $paginateResult = $this->paginateInfoPresenter->transform($paginationDTOMaker);
        $paginateResult['items'] = $this->mediaInfoPresenter->transformMany(
            $paginationDTOMaker->getItems()
        );
        return $paginateResult;
    }
}