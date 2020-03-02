<?php


namespace Domains\Events\Services\Contracts\DTOs\DTOMakers;


use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Events\Entities\Events;
use Domains\Events\Services\Contracts\DTOs\EventsInfoDTO;

class EventsInfoDTOMaker
{
    public function convertMany($eventCollection, ?AttachmentGetInfoDTO $attachments = null)
    {
        return $eventCollection->map(function ($event) use ($attachments) {
            return $this->convert($event, $attachments->getImages()[$event->id] ?? null);
        })->toArray();
    }

    public function convert(Events $events, ?AttachmentInfoDTO $attachment = null): EventsInfoDTO
    {
        $EventsInfoDTO = new EventsInfoDTO();
        $EventsInfoDTO->setTitle($events->title)
            ->setStatus($events->status)
            ->setId($events->id)
            ->setCategory($this->categories($events->categories))
            ->setSourceLinkText($events->source_link_text)
            ->setSourceLinkImage($events->source_link_image)
            ->setSourceLinkVideo($events->source_link_video)
            ->setLocation($events->location)
            ->setEventStartDate($events->event_start_date)
            ->setEventEndDate($events->event_end_date)
            ->setEventStartRegisterDate($events->event_start_register_date)
            ->setEventEndRegisterDate($events->event_end_register_date)
            ->setPublishDate($events->publish_date)
            ->setLanguage($events->language)
            ->setDescription($events->description)
            ->setAbstract($events->abstract)
            ->setDescription($events->description)
            ->setPublisher($events->publisher)
            ->setRelationEventId($this->getRelationEventId($events))
            ->setEditor($events->editor)
            ->setAttachmentFiles($attachment ? $attachment->getPaths() : [])
            ->setProvince($events->province);
        return $EventsInfoDTO;
    }

    private function getRelationEventId(Events $events)
    {
        $relationEvent = $events->parent ?? $events->child;
        return $relationEvent ? $relationEvent->id : null;
    }
    private function categories($categories)
    {
        return $categories->map(function ($category) {
            $data['name_en'] = $category->name_en;
            $data['id'] = $category->id;
            $data['is_main'] = $category->pivot->is_main ? true : false;
            return $data;
        })->toArray();
    }
}