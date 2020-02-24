<?php


namespace Domains\Events\Repositories;

use Domains\Events\Entities\Events;
use Domains\Events\Services\Contracts\DTOs\EventsCreateDTO;
use Domains\Events\Services\Contracts\DTOs\EventsEditDTO;
use Domains\Events\Services\Contracts\DTOs\EventsFilterDTO;

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
        $events->source_link_image = $eventsCreateDTO->getSourceLinkImage();
        $events->source_link_video = $eventsCreateDTO->getSourceLinkVideo();
        $events->status = $eventsCreateDTO->getStatus();
        $events->province_id = $eventsCreateDTO->getProvinceId();
        $events->publisher_id = $eventsCreateDTO->getPublisher()->id;
        $events->language = $eventsCreateDTO->getLanguage();
        $events->save();
        return $events;
    }

    public function editEvents(EventsEditDTO $eventsEditDTO): Events
    {
        $events = $this->findOrFail($eventsEditDTO->getEventsId());
        $events->title = $eventsEditDTO->getTitle();
        $events->abstract = $eventsEditDTO->getAbstract();
        $events->description = $eventsEditDTO->getDescription();
        $events->category_id = $eventsEditDTO->getCategoryId();
        $events->publish_date = $eventsEditDTO->getPublishDate();
        $events->event_start_date = $eventsEditDTO->getEventStartDate();
        $events->event_end_date = $eventsEditDTO->getEventEndDate();
        $events->event_start_register_date = $eventsEditDTO->getEventStartRegisterDate();
        $events->event_end_register_date = $eventsEditDTO->getEventEndtRegisterDate();
        $events->location = $eventsEditDTO->getLocation();
        $events->source_link_text = $eventsEditDTO->getSourceLinkText();
        $events->source_link_image = $eventsEditDTO->getSourceLinkImage();
        $events->source_link_video = $eventsEditDTO->getSourceLinkVideo();
        $events->status = $eventsEditDTO->getStatus();
        $events->province_id = $eventsEditDTO->getProvinceId();
        $events->language = $eventsEditDTO->getLanguage();
        $getDirty = $events->getDirty();
        if (!empty($getDirty)) {
            $events->save();
        }
        return $events;
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    function filter(EventsFilterDTO $eventsFilterDTO)
    {
        $baseQuery = $this->entityName::where('status', $eventsFilterDTO->getEventsRealStatus())
            ->when($eventsFilterDTO->getPublisherId(), function ($query) use ($eventsFilterDTO) {
                return $query->where('publisher_id', $eventsFilterDTO->getPublisherId());
            })
            ->when($eventsFilterDTO->getTitle(), function ($query) use ($eventsFilterDTO) {
                return $query->where('title', 'like', '%' . $eventsFilterDTO->getTitle() . '%');
            })
            ->when($eventsFilterDTO->getCreateDateEnd(), function ($query) use ($eventsFilterDTO) {
                return $query->where('created_at', '<=', $eventsFilterDTO->getCreateDateEnd());
            })
            ->when($eventsFilterDTO->getCreateDateStart(), function ($query) use ($eventsFilterDTO) {
                return $query->where('created_at', '>=', $eventsFilterDTO->getCreateDateStart());
            })
            ->when($eventsFilterDTO->getMaxPublishDate(), function ($query) use ($eventsFilterDTO) {
                return $query->where('publish_date', '<=', $eventsFilterDTO->getMaxPublishDate());
            })
            ->when($eventsFilterDTO->getMinPublishDate(), function ($query) use ($eventsFilterDTO) {
                return $query->where('publish_date', '>=', $eventsFilterDTO->getMinPublishDate());
            })
            ->paginate(config('events.events_paginate_count'));

        return $baseQuery;
    }

    public function destroyEvent(int $eventId)
    {
        return $this->entityName::where('id', '=', $eventId)->delete();
    }

}