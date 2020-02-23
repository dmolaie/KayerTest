<?php


namespace Domains\Events\Repositories;

use Domains\Events\Entities\Events;
use Domains\Events\Services\Contracts\DTOs\EventsCreateDTO;

class EventsRepository
{
    protected $entityName = Events::class;

    public function create(EventsCreateDTO $eventsCreateDTO): Events
    {
        $events = new  $this->entityName;
        $events->title = $eventsCreateDTO->getTitle();
        $events->abstract = $eventsCreateDTO->getAbstract();
        $events->description = $eventsCreateDTO->getDescription();
        $events->category_id = $eventsCreateDTO->getCategoryId();
        $events->publish_date = $eventsCreateDTO->getPublishDate();
        $events->event_start_date = $eventsCreateDTO->getEventStartDate();
        $events->event_end_date = $eventsCreateDTO->getEventEndDate();
        $events->event_start_register_date = $eventsCreateDTO->getEventStartRegisterDate();
        $events->event_end_register_date = $eventsCreateDTO->getEventEndtRegisterDate();
        $events->location = $eventsCreateDTO->getLocation();
        $events->source_link_text = $eventsCreateDTO->getSourceLinkText();
        $events->source_link_image   = $eventsCreateDTO->getSourceLinkImage();
        $events->source_link_video = $eventsCreateDTO->getSourceLinkVideo();
        $events->status = $eventsCreateDTO->getStatus();
        $events->province_id = $eventsCreateDTO->getProvinceId();
        $events->publisher_id = $eventsCreateDTO->getPublisher()->id;
        $events->language = $eventsCreateDTO->getLanguage();
        $events->save();
        return $events;
    }
}