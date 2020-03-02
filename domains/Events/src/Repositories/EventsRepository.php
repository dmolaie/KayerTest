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
        $events->parent_id = $eventsCreateDTO->getParentId();
        $events->language = $eventsCreateDTO->getLanguage();
        $events->save();
        if ($eventsCreateDTO->getCategoryIds() || $eventsCreateDTO->getCategoryIsMain()) {
            $mainCategory = $eventsCreateDTO->getCategoryIsMain() ?? $eventsCreateDTO->getCategoryIds()[0];
            $secondaryCategoryId = array_diff($eventsCreateDTO->getCategoryIds() ?? [],
                [$mainCategory]);
            $events->categories()->attach($secondaryCategoryId, ['is_main' => false]);
            $events->categories()->attach([$mainCategory], ['is_main' => true]);
        }
        return $events;
    }

    public function editEvents(EventsEditDTO $eventsEditDTO): Events
    {
        $events = $this->findOrFail($eventsEditDTO->getEventsId());
        $events->title = $eventsEditDTO->getTitle();
        $events->abstract = $eventsEditDTO->getAbstract();
        $events->description = $eventsEditDTO->getDescription();
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
        $events->categories()->sync([]);
        if ($eventsEditDTO->getCategoryIsMain() || $eventsEditDTO->getCategoryIds()) {
            $mainCategory = $eventsEditDTO->getCategoryIsMain() ?? $eventsEditDTO->getCategoryIds()[0];
            $secondaryCategoryId = array_diff($eventsEditDTO->getCategoryIds() ?? [], [$mainCategory]);
            $events->categories()->attach($secondaryCategoryId, ['is_main' => false]);
            $events->categories()->attach([$mainCategory], ['is_main' => true]);
        }
        return $events;
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    function filter(EventsFilterDTO $eventsFilterDTO)
    {
        $baseQuery = $this->entityName
            ::when($eventsFilterDTO->getEventsRealStatus(), function ($query) use ($eventsFilterDTO) {
                return $query->where('status', $eventsFilterDTO->getEventsRealStatus());
            })
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
            ->when($eventsFilterDTO->getLanguage(), function ($query) use ($eventsFilterDTO) {
                return $query->where('language', $eventsFilterDTO->getLanguage());
            })
            ->when($eventsFilterDTO->getCategoryIds(), function ($query) use ($eventsFilterDTO) {
                return $query->whereHas('categories', function ($query) use ($eventsFilterDTO) {
                    $query->whereIn('categories.id', $eventsFilterDTO->getCategoryIds());
                });
            })
            ->when($eventsFilterDTO->getProvinceId(), function ($query) use ($eventsFilterDTO) {
                return $query->where('province_id', $eventsFilterDTO->getProvinceId());

            })
            ->paginate(config('events.events_paginate_count'));

        return $baseQuery;
    }

    public function destroyEvent(int $eventId)
    {
        return $this->entityName::where('id', '=', $eventId)->delete();
    }

}