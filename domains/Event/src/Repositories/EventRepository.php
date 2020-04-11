<?php


namespace Domains\Event\Repositories;

use Domains\Event\Entities\Event;
use Domains\Event\Services\Contracts\DTOs\EventCreateDTO;
use Domains\Event\Services\Contracts\DTOs\EventEditDTO;
use Domains\Event\Services\Contracts\DTOs\EventFilterDTO;

class EventRepository
{
    protected $entityName = Event::class;

    public function create(EventCreateDTO $eventCreateDTO): Event
    {
        $event = new  $this->entityName;
        $event->title = $eventCreateDTO->getTitle();
        $event->abstract = $eventCreateDTO->getAbstract();
        $event->description = $eventCreateDTO->getDescription();
        $event->publish_date = $eventCreateDTO->getPublishDate();
        $event->event_start_date = $eventCreateDTO->getEventStartDate();
        $event->event_end_date = $eventCreateDTO->getEventEndDate();
        $event->event_start_register_date = $eventCreateDTO->getEventStartRegisterDate();
        $event->event_end_register_date = $eventCreateDTO->getEventEndtRegisterDate();
        $event->location = $eventCreateDTO->getLocation();
        $event->source_link_text = $eventCreateDTO->getSourceLinkText();
        $event->source_link_image = $eventCreateDTO->getSourceLinkImage();
        $event->source_link_video = $eventCreateDTO->getSourceLinkVideo();
        $event->status = $eventCreateDTO->getStatus();
        $event->province_id = $eventCreateDTO->getProvinceId();
        $event->publisher_id = $eventCreateDTO->getPublisher()->id;
        $event->parent_id = $eventCreateDTO->getParentId();
        $event->language = $eventCreateDTO->getLanguage();
        $event->slug = $eventCreateDTO->getSlug();
        $event->save();
        if ($eventCreateDTO->getCategoryIds() || $eventCreateDTO->getCategoryIsMain()) {
            $mainCategory = $eventCreateDTO->getCategoryIsMain() ?? $eventCreateDTO->getCategoryIds()[0];
            $secondaryCategoryId = array_diff($eventCreateDTO->getCategoryIds() ?? [],
                [$mainCategory]);
            $event->categories()->attach($secondaryCategoryId, ['is_main' => false]);
            $event->categories()->attach([$mainCategory], ['is_main' => true]);
        }
        return $event;
    }

    public function editEvent(EventEditDTO $eventEditDTO): Event
    {
        $event = $this->findOrFail($eventEditDTO->getEventId());
        $event->title = $eventEditDTO->getTitle();
        $event->abstract = $eventEditDTO->getAbstract();
        $event->description = $eventEditDTO->getDescription();
        $event->publish_date = $eventEditDTO->getPublishDate();
        $event->event_start_date = $eventEditDTO->getEventStartDate();
        $event->event_end_date = $eventEditDTO->getEventEndDate();
        $event->event_start_register_date = $eventEditDTO->getEventStartRegisterDate();
        $event->event_end_register_date = $eventEditDTO->getEventEndtRegisterDate();
        $event->location = $eventEditDTO->getLocation();
        $event->source_link_text = $eventEditDTO->getSourceLinkText();
        $event->source_link_image = $eventEditDTO->getSourceLinkImage();
        $event->source_link_video = $eventEditDTO->getSourceLinkVideo();
        $event->status = $eventEditDTO->getStatus();
        $event->province_id = $eventEditDTO->getProvinceId();
        $event->language = $eventEditDTO->getLanguage();
        $event->slug = $eventEditDTO->getSlug() ?? $event->slug;
        $getDirty = $event->getDirty();
        if (!empty($getDirty)) {
            $event->save();
        }
        $event->categories()->sync([]);
        if ($eventEditDTO->getCategoryIsMain() || $eventEditDTO->getCategoryIds()) {
            $mainCategory = $eventEditDTO->getCategoryIsMain() ?? $eventEditDTO->getCategoryIds()[0];
            $secondaryCategoryId = array_diff($eventEditDTO->getCategoryIds() ?? [], [$mainCategory]);
            $event->categories()->attach($secondaryCategoryId, ['is_main' => false]);
            $event->categories()->attach([$mainCategory], ['is_main' => true]);
        }
        return $event;
    }

    public function findOrFail(int $id)
    {
        return $this->entityName::findOrFail($id);
    }

    function filter(EventFilterDTO $eventFilterDTO)
    {
        $baseQuery = $this->entityName
            ::when($eventFilterDTO->getEventRealStatus(), function ($query) use ($eventFilterDTO) {
                if ($eventFilterDTO->getEventRealStatus() == config('event.event_convert_to_real_status.delete')) {
                    return $query->onlyTrashed();
                }
                return $query->where('status', $eventFilterDTO->getEventRealStatus());
            })
            ->when($eventFilterDTO->getPublisherId(), function ($query) use ($eventFilterDTO) {
                return $query->where('publisher_id', $eventFilterDTO->getPublisherId());
            })
            ->when($eventFilterDTO->getSlug(), function ($query) use ($eventFilterDTO) {
                return $query->where('slug', $eventFilterDTO->getSlug());
            })
            ->when($eventFilterDTO->getFirstTitle(), function ($query) use ($eventFilterDTO) {
                return $query->where('title', 'like', '%' . $eventFilterDTO->getFirstTitle() . '%');
            })
            ->when($eventFilterDTO->getCreateDateEnd(), function ($query) use ($eventFilterDTO) {
                return $query->where('created_at', '<=', $eventFilterDTO->getCreateDateEnd());
            })
            ->when($eventFilterDTO->getCreateDateStart(), function ($query) use ($eventFilterDTO) {
                return $query->where('created_at', '>=', $eventFilterDTO->getCreateDateStart());
            })
            ->when($eventFilterDTO->getMaxPublishDate(), function ($query) use ($eventFilterDTO) {
                return $query->where('publish_date', '<=', $eventFilterDTO->getMaxPublishDate());
            })
            ->when($eventFilterDTO->getMinPublishDate(), function ($query) use ($eventFilterDTO) {
                return $query->where('publish_date', '>=', $eventFilterDTO->getMinPublishDate());
            })
            ->when($eventFilterDTO->getLanguage(), function ($query) use ($eventFilterDTO) {
                return $query->where('language', $eventFilterDTO->getLanguage());
            })
            ->when($eventFilterDTO->getCategoryIds(), function ($query) use ($eventFilterDTO) {
                return $query->whereHas('categories', function ($query) use ($eventFilterDTO) {
                    $query->whereIn('categories.id', $eventFilterDTO->getCategoryIds());
                });
            })
            ->when($eventFilterDTO->getProvinceId(), function ($query) use ($eventFilterDTO) {
                return $query->where('province_id', $eventFilterDTO->getProvinceId());

            })
            ->orderBy('created_at', $eventFilterDTO->getSort())
            ->paginate($eventFilterDTO->getPaginationCount());
        return $baseQuery;
    }

    public function destroyEvent(int $eventId)
    {
        return $this->entityName::where('id', '=', $eventId)->delete();
    }

    public function findOrFailUuid(string $uuid)
    {
        return $this->entityName::where('uuid', '=', $uuid)->firstOrFail();
    }

    public function changeStatus(int $eventId, string $status)
    {
        $event = $this->findOrFail($eventId);
        $event->status = $status;
        $getDirty = $event->getDirty();
        if (!empty($getDirty)) {
            $event->save();
        }
        return $event;
    }


}