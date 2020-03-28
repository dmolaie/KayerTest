<?php


namespace Domains\News\Http\Presenters;


use Carbon\Carbon;
use Domains\News\Services\Contracts\DTOs\NewsInfoDTO;

class NewsInfoPresenter
{
    public function transformMany(array $newsInfoDTOs): array
    {
        return array_map(function ($newsInfoDTO) {
            return $this->transform($newsInfoDTO);
        }, $newsInfoDTOs);
    }

    public function transform(NewsInfoDTO $newsInfoDTO)
    {
        return [
            'id'           => $newsInfoDTO->getId(),
            'first_title'  => $newsInfoDTO->getFirstTitle(),
            'second_title' => $newsInfoDTO->getSecondTitle(),
            'abstract'     => $newsInfoDTO->getAbstract(),
            'description'  => $newsInfoDTO->getDescription(),
            'category'     => $newsInfoDTO->getCategory() ? $newsInfoDTO->getCategory() : null,
            'publish_date' => strtotime($newsInfoDTO->getPublishDate()),
            'source_link'  => $newsInfoDTO->getSourceLink(),
            'status'       => $this->getStatus($newsInfoDTO),
            'is_created_by_user' => $this->isCreatedByUser($newsInfoDTO),
            'province'     => [
                'id'   => $newsInfoDTO->getProvince()->id,
                'name' => $newsInfoDTO->getProvince()->name,
            ],
            'publisher'    => [
                'id'        => $newsInfoDTO->getPublisher()->id,
                'name'      => $newsInfoDTO->getPublisher()->name,
                'last_name' => $newsInfoDTO->getPublisher()->last_name
            ],
            'editor'       => $newsInfoDTO->getEditor() ? [
                'id'        => $newsInfoDTO->getEditor()->id,
                'name'      => $newsInfoDTO->getEditor()->name,
                'last_name' => $newsInfoDTO->getEditor()->last_name
            ] : null,
            'language'     => $newsInfoDTO->getLanguage(),
            'relation_id'  => $newsInfoDTO->getRelationNewsId(),
            'image_paths'  => $newsInfoDTO->getAttachmentFiles() ?? []
        ];
    }

    private function getStatus(NewsInfoDTO $newsInfoDTO)
    {
        if ($newsInfoDTO->getStatus() != 'accept') {
            return [
                'fa' => trans('news::news.news_statuses.' . $newsInfoDTO->getStatus()),
                'en' => $newsInfoDTO->getStatus()
            ];
        }
        if (
        Carbon::parse($newsInfoDTO->getPublishDate())->lessThanOrEqualTo(Carbon::now())) {
            return [
                'fa' => trans('news::news.news_statuses.published'),
                'en' => 'published'
            ];

        }
        return [
            'fa' => trans('news::news.news_statuses.ready_to_publish'),
            'en' => 'ready_to_publish'
        ];


    }

    private function isCreatedByUser(NewsInfoDTO $newsInfoDTO)
    {
        if (!\Auth::user()) {
            return false;
        }
        if ($newsInfoDTO->getPublisher()->id == \Auth::user()->id) {
            return true;
        }
        return false;
    }
}