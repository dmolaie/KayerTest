<?php


namespace Domains\Event\Services\Contracts\DTOs;


use Carbon\Carbon;

/**
 * Class EventFilterDTO
 */
class EventFilterDTO
{
    /**
     * @var string|null
     */
    protected $firstTitle;
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
    protected $eventInputStatus;
    /**
     * @var string
     */
    protected $eventRealStatus;
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
     * @var string|null
     */
    protected $slug;
    /**
     * @var string
     */
    protected $sort = 'DESC';
    /**
     * @var int|null
     */
    protected $paginationCount;

    /**
     * @return string|null
     */
    public function getFirstTitle(): ?string
    {
        return $this->firstTitle;
    }

    /**
     * @param string|null $firstTitle
     * @return EventFilterDTO
     */
    public function setFirstTitle(?string $firstTitle): EventFilterDTO
    {
        $this->firstTitle = $firstTitle;
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
     * @return EventFilterDTO
     */
    public function setCreateDateStart(?string $createDateStart): EventFilterDTO
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
     * @return EventFilterDTO
     */
    public function setCreateDateEnd(?string $createDateEnd): EventFilterDTO
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
     * @return EventFilterDTO
     */
    public function setPublisherId(?int $publisherId): EventFilterDTO
    {
        $this->publisherId = $publisherId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEventInputStatus(): ?string
    {
        return $this->eventInputStatus;
    }

    /**
     * @param null|string $eventInputStatus
     * @return EventFilterDTO
     */
    public function setEventInputStatus(?string $eventInputStatus): EventFilterDTO
    {
        if (!$eventInputStatus) {
            return $this;
        }
        $this->eventInputStatus = $eventInputStatus;
        $this->eventRealStatus = config('event.event_convert_to_real_status.' . $eventInputStatus);

        if ($this->eventInputStatus == config('event.event_publish_status')) {
            $this->maxPublishDate = Carbon::now()->format('Y-m-d H:i:s');
        } elseif ($this->eventInputStatus == config('event.event_ready_to_publish_status')) {
            $this->minPublishDate = Carbon::now()->format('Y-m-d H:i:s');
        }
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEventRealStatus(): ?string
    {
        return $this->eventRealStatus;
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
     * @return EventFilterDTO
     */
    public function setCategoryIds(?array $categoryIds): EventFilterDTO
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
     * @return EventFilterDTO
     */
    public function setProvinceId(?int $provinceId): EventFilterDTO
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
     * @return EventFilterDTO
     */
    public function setLanguage(?string $language): EventFilterDTO
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getSort(): string
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     * @return EventFilterDTO
     */
    public function setSort(string $sort): EventFilterDTO
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaginationCount(): int
    {
        return $this->paginationCount ?? config('event.event_paginate_count');
    }

    /**
     * @param int|null $paginationCount
     * @return EventFilterDTO
     */
    public function setPaginationCount(?int $paginationCount): EventFilterDTO
    {
        $this->paginationCount = $paginationCount;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     * @return EventFilterDTO
     */
    public function setSlug(?string $slug): EventFilterDTO
    {
        $this->slug = $slug;
        return $this;
    }

}