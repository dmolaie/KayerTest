<?php


namespace Domains\Event\Http\Presenters;


use Carbon\Carbon;
use Domains\Event\Services\Contracts\DTOs\EventInfoDTO;

class EventInfoPresenter
{
    public function transformMany(array $eventInfoDTOs): array
    {
        return array_map(function ($eventInfoDTO) {
            return $this->transform($eventInfoDTO);
        }, $eventInfoDTOs);
    }

    public function transform(EventInfoDTO $eventInfoDTO)
    {
        return [
            'id'                        => $eventInfoDTO->getId(),
            'title'                     => $eventInfoDTO->getTitle(),
            'abstract'                  => $eventInfoDTO->getAbstract(),
            'description'               => $eventInfoDTO->getDescription(),
            'category'                  => $eventInfoDTO->getCategory() ? $eventInfoDTO->getCategory() : null,
            'publish_date'              => strtotime($eventInfoDTO->getPublishDate()),
            'event_start_date'          => strtotime($eventInfoDTO->getEventStartDate()),
            'event_end_date'            => strtotime($eventInfoDTO->getEventEndDate()),
            'event_start_register_date' => strtotime($eventInfoDTO->getEventStartRegisterDate()),
            'event_end_register_date'   => strtotime($eventInfoDTO->getEventEndRegisterDate()),
            'source_link_test'          => $eventInfoDTO->getSourceLinkText(),
            'source_link_image'         => $eventInfoDTO->getSourceLinkImage(),
            'source_link_video'         => $eventInfoDTO->getSourceLinkVideo(),
            'location'                  => $eventInfoDTO->getLocation(),
            'status'                    => $this->getStatus($eventInfoDTO),
            'province'                  => [
                'id'   => $eventInfoDTO->getProvince()->id,
                'name' => $eventInfoDTO->getProvince()->name,
            ],
            'publisher'                 => [
                'id'        => $eventInfoDTO->getPublisher()->id,
                'name'      => $eventInfoDTO->getPublisher()->name,
                'last_name' => $eventInfoDTO->getPublisher()->last_name
            ],
            'editor'                    => $eventInfoDTO->getEditor() ? [
                'id'        => $eventInfoDTO->getEditor()->id,
                'name'      => $eventInfoDTO->getEditor()->name,
                'last_name' => $eventInfoDTO->getEditor()->last_name
            ] : null,
            'language'                  => $eventInfoDTO->getLanguage(),
            'relation_id'               => $eventInfoDTO->getRelationEventId(),
            'image_paths'               => $eventInfoDTO->getAttachmentFiles() ?? [],
            'slug'                      => $eventInfoDTO->getSlug()
        ];
    }

    private function getStatus(EventInfoDTO $eventInfoDTO)
    {
        if ($eventInfoDTO->getStatus() != 'accept') {
            return [
                'fa' => trans('event::event.event_statuses.' . $eventInfoDTO->getStatus()),
                'en' => $eventInfoDTO->getStatus()
            ];
        }
        if (Carbon::parse($eventInfoDTO->getPublishDate())->lessThanOrEqualTo(Carbon::now())) {
            return [
                'fa' => trans('event::event.event_statuses.published'),
                'en' => 'published'
            ];

        }
        return [
            'fa' => trans('event::event.event_statuses.ready_to_publish'),
            'en' => 'ready_to_publish'
        ];
    }
}