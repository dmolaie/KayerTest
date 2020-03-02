<?php


namespace Domains\Events\Services\Contracts\DTOs;


use Carbon\Carbon;

/**
 * Class NewsFilterDTO
 */
class EventsFilterDTO
{
    /**
     * @var string|null
     */
    protected $title;
    /**
     * @var string|null
     */
    protected $createDateStart;
    /**
     * @var string|null
     */
    protected $createDateEnd;
    /**
     * @var integer|null
     */
    protected $publisherId;
    /**
     * @var null|string
     */
    protected $eventsInputStatus;
    /**
     * @var null|string
     */
    protected $eventsRealStatus;
    /**
     * @var string|null
     */
    protected $minPublishDate;
    /**
     * @var string|null
     */
    protected $maxPublishDate;
    /**
     * @var array|null
     */
    protected $categoryIds;
    /**
     * @var int|null
     */
    protected $provinceId;
    /**
     * @var string|null
     */
    protected $language;

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return EventsFilterDTO
     */
    public function setTitle(?string $title): EventsFilterDTO
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreateDateStart(): ?string
    {
        return $this->createDateStart;
    }

    /**
     * @param string|null $createDateStart
     * @return EventsFilterDTO
     */
    public function setCreateDateStart(?string $createDateStart): EventsFilterDTO
    {
        $this->createDateStart = $createDateStart;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCreateDateEnd(): ?string
    {
        return $this->createDateEnd;
    }

    /**
     * @param string|null $createDateEnd
     * @return EventsFilterDTO
     */
    public function setCreateDateEnd(?string $createDateEnd): EventsFilterDTO
    {
        $this->createDateEnd = $createDateEnd;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPublisherId(): ?int
    {
        return $this->publisherId;
    }

    /**
     * @param int|null $publisherId
     * @return EventsFilterDTO
     */
    public function setPublisherId(?int $publisherId): EventsFilterDTO
    {
        $this->publisherId = $publisherId;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventsInputStatus(): string
    {
        return $this->eventsInputStatus;
    }

    /**
     * @param null|string $eventsInputStatus
     * @return EventsFilterDTO
     */
    public function setEventsInputStatus(?string $eventsInputStatus): EventsFilterDTO
    {
        if (!$eventsInputStatus) {
            return $this;
        }
        $this->eventsInputStatus = $eventsInputStatus;
        $this->eventsRealStatus = config('events.events_convert_to_real_status.' . $eventsInputStatus);

        if ($this->eventsInputStatus == config('events.events_publish_status')) {
            $this->maxPublishDate = Carbon::now()->format('Y-m-d h:m:s');
        } elseif ($this->eventsInputStatus == config('events.events_ready_to_publish_status')) {
            $this->minPublishDate = Carbon::now()->format('Y-m-d h:m:s');
        }
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEventsRealStatus(): ?string
    {
        return $this->eventsRealStatus;
    }

    /**
     * @return string|null
     */
    public function getMinPublishDate(): ?string
    {
        return $this->minPublishDate;
    }

    /**
     * @return string|null
     */
    public function getMaxPublishDate(): ?string
    {
        return $this->maxPublishDate;
    }

    /**
     * @return array|null
     */
    public function getCategoryIds(): ?array
    {
        return $this->categoryIds;
    }

    /**
     * @param array|null $categoryIds
     * @return EventsFilterDTO
     */
    public function setCategoryIds(?array $categoryIds): EventsFilterDTO
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getProvinceId(): ?int
    {
        return $this->provinceId;
    }

    /**
     * @param int|null $provinceId
     * @return EventsFilterDTO
     */
    public function setProvinceId(?int $provinceId): EventsFilterDTO
    {
        $this->provinceId = $provinceId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     * @return EventsFilterDTO
     */
    public function setLanguage(?string $language): EventsFilterDTO
    {
        $this->language = $language;
        return $this;
    }

}