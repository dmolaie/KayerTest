<?php


namespace Domains\Event\Services\Contracts\DTOs\DTOMakers;


use Domains\Attachment\Services\Contracts\DTOs\AttachmentGetInfoDTO;
use Domains\Attachment\Services\Contracts\DTOs\AttachmentInfoDTO;
use Domains\Event\Entities\Event;
use Domains\Event\Services\Contracts\DTOs\EventInfoDTO;

class EventInfoDTOMaker
{
    public function convertMany($eventsCollection, ?AttachmentGetInfoDTO $attachments = null)
    {
        return $eventsCollection->map(function ($event) use ($attachments) {
            return $this->convert($event, $attachments->getImages()[$event->id] ?? null);
        })->toArray();
    }

    public function convert(Event $event, ?AttachmentInfoDTO $attachment = null): EventInfoDTO
    {
        $EventInfoDTO = new EventInfoDTO();
        $EventInfoDTO->setTitle($event->title)
            ->setStatus($event->status)
            ->setId($event->id)
            ->setCategory($this->categories($event->categories))
            ->setSourceLinkText($event->source_link_text)
            ->setSourceLinkImage($event->source_link_image)
            ->setSourceLinkVideo($event->source_link_video)
            ->setLocation($event->location)
            ->setEventStartDate($event->event_start_date)
            ->setEventEndDate($event->event_end_date)
            ->setEventStartRegisterDate($event->event_start_register_date)
            ->setEventEndRegisterDate($event->event_end_register_date)
            ->setPublishDate($event->publish_date)
            ->setLanguage($event->language)
            ->setDescription($event->description)
            ->setAbstract($event->abstract)
            ->setDescription($event->description)
            ->setPublisher($event->publisher)
            ->setRelationEventId($this->getRelationEventId($event))
            ->setEditor($event->editor)
            ->setSlug($event->slug)
            ->setUuid($event->uuid)
        ->setAttachmentFiles($attachment ? $attachment->getPaths() : [])
            ->setProvince($event->province);
        return $EventInfoDTO;
    }

    private function getRelationEventId(Event $event)
    {
        $relationEvent = $event->parent ?? $event->child;
        return $relationEvent ? $relationEvent->id : null;
    }
    private function categories($categories)
    {
        return $categories->map(function ($category) {
            $data['name_en'] = $category->name_en;
            $data['name_fa'] = $category->name_fa;
            $data['id'] = $category->id;
            $data['is_main'] = $category->pivot->is_main ? true : false;
            return $data;
        })->toArray();
    }
}