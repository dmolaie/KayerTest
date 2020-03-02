<?php


namespace Domains\Events\Http\Presenters;


use Carbon\Carbon;
use Domains\Events\Services\Contracts\DTOs\EventsInfoDTO;

class EventsInfoPresenter
{
    public function transformMany(array $eventsInfoDTOs): array
    {
        return array_map(function ($eventsInfoDTO) {
            return $this->transform($eventsInfoDTO);
        }, $eventsInfoDTOs);
    }

    public function transform(EventsInfoDTO $eventsInfoDTO)
    {
        return [
            'id' => $eventsInfoDTO->getId(),
            'title' => $eventsInfoDTO->getTitle(),
            'abstract' => $eventsInfoDTO->getAbstract(),
            'description' => $eventsInfoDTO->getDescription(),
            'category' => $eventsInfoDTO->getCategory() ? $eventsInfoDTO->getCategory() : null,
            'publish_date' => strtotime($eventsInfoDTO->getPublishDate()),
            'event_start_date' => strtotime($eventsInfoDTO->getEventStartDate()),
            'event_end_date' => strtotime($eventsInfoDTO->getEventEndDate()),
            'event_start_register_date' => strtotime($eventsInfoDTO->getEventStartRegisterDate()),
            'event_end_register_date' => strtotime($eventsInfoDTO->getEventEndRegisterDate()),
            'source_link_test' => $eventsInfoDTO->getSourceLinkText(),
            'source_link_image' => $eventsInfoDTO->getSourceLinkImage(),
            'source_link_video' => $eventsInfoDTO->getSourceLinkVideo(),
            'location' => $eventsInfoDTO->getLocation(),
            'status' => $this->getStatus($eventsInfoDTO),
            'province' => [
                'id' => $eventsInfoDTO->getProvince()->id,
                'name' => $eventsInfoDTO->getProvince()->name,
            ],
            'publisher' => [
                'id' => $eventsInfoDTO->getPublisher()->id,
                'name' => $eventsInfoDTO->getPublisher()->name,
                'last_name' => $eventsInfoDTO->getPublisher()->last_name
            ],
            'editor' => $eventsInfoDTO->getEditor() ? [
                'id' => $eventsInfoDTO->getEditor()->id,
                'name' => $eventsInfoDTO->getEditor()->name,
                'last_name' => $eventsInfoDTO->getEditor()->last_name
            ] : null,
            'language' => $eventsInfoDTO->getLanguage(),
            'relation_id' => $eventsInfoDTO->getRelationEventId(),
            'image_paths' => $eventsInfoDTO->getAttachmentFiles() ?? []
        ];
    }

    private function getStatus(EventsInfoDTO $eventsInfoDTO)
    {
        $status = [
            'fa' => trans('events::events.events_statuses.' . $eventsInfoDTO->getStatus()),
            'en' => $eventsInfoDTO->getStatus()
        ];
        if ($eventsInfoDTO->getStatus() == 'accept' && $eventsInfoDTO->getPublishDate() <= Carbon::now()) {
            $status = [
                'fa' => trans('events::events.events_statuses.published'),
                'en' => 'published'
            ];

        }
        return $status;
    }
}