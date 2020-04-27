<?php


namespace Domains\Media\Http\Presenters;


use Carbon\Carbon;
use Domains\Media\Services\Contracts\DTOs\MediaInfoDTO;

class MediaInfoPresenter
{
    public function transformMany(array $mediaInfoDTOs): array
    {
        return array_map(function ($mediaInfoDTO) {
            return $this->transform($mediaInfoDTO);
        }, $mediaInfoDTOs);
    }

    public function transform(MediaInfoDTO $mediaInfoDTO)
    {
        return [
            'id'                 => $mediaInfoDTO->getId(),
            'first_title'        => $mediaInfoDTO->getFirstTitle(),
            'description'        => $mediaInfoDTO->getDescription(),
            'abstract'           => $mediaInfoDTO->getAbstract(),
            'first_title'        => $mediaInfoDTO->getFirstTitle(),
            'categories'         => $mediaInfoDTO->getCategories(),
            'publish_date'       => strtotime($mediaInfoDTO->getPublishDate()),
            'slug'               => $mediaInfoDTO->getSlug(),
            'status'             => $this->getStatus($mediaInfoDTO),
            'is_created_by_user' => $this->isCreatedByUser($mediaInfoDTO),
            'type'               => $mediaInfoDTO->getType(),
            'province'           => $mediaInfoDTO->getProvince() ? [
                'id'   => $mediaInfoDTO->getProvince()->id,
                'name' => $mediaInfoDTO->getProvince()->name,
            ] : null,
            'publisher'          => [
                'id'        => $mediaInfoDTO->getPublisher()->id,
                'name'      => $mediaInfoDTO->getPublisher()->name,
                'last_name' => $mediaInfoDTO->getPublisher()->last_name
            ],
            'editor'             => $mediaInfoDTO->getEditor() ? [
                'id'        => $mediaInfoDTO->getEditor()->id,
                'name'      => $mediaInfoDTO->getEditor()->name,
                'last_name' => $mediaInfoDTO->getEditor()->last_name
            ] : null,
            'language'           => $mediaInfoDTO->getLanguage(),
            'relation_id'        => $mediaInfoDTO->getRelationMediaId(),
            'image_paths'        => $mediaInfoDTO->getAttachmentFiles() ?? [],
            'content_paths'        => $mediaInfoDTO->getContentFiles() ?? []
        ];
    }

    private function getStatus(MediaInfoDTO $mediaInfoDTO)
    {
        if ($mediaInfoDTO->getStatus() != 'accept') {
            return [
                'fa' => trans('media::media.media_statuses.' . $mediaInfoDTO->getStatus()),
                'en' => $mediaInfoDTO->getStatus()
            ];
        }

        if (
        Carbon::parse($mediaInfoDTO->getPublishDate())->lessThanOrEqualTo(Carbon::now())) {
            return [
                'fa' => trans('media::media.media_statuses.published'),
                'en' => 'published'
            ];

        }
        return [
            'fa' => trans('media::media.media_statuses.ready_to_publish'),
            'en' => 'ready_to_publish'
        ];

    }

    private function isCreatedByUser(MediaInfoDTO $mediaInfoDTO)
    {
        if (!\Auth::user()) {
            return false;
        }
        if ($mediaInfoDTO->getPublisher()->id == \Auth::user()->id) {
            return true;
        }
        return false;

    }
}