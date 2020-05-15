<?php


namespace Domains\Slider\Services\Contracts\DTOs;


use Carbon\Carbon;

/**
 * Class SliderFilterDTO
 */
class SliderFilterDTO
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
    protected $sliderInputStatus;
    /**
     * @var string
     */
    protected $sliderRealStatus;
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
    protected $provinceIds;
    /**
     * @var string|null
     */
    protected $language;
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
     * @return SliderFilterDTO
     */
    public function setFirstTitle(?string $firstTitle): SliderFilterDTO
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
     * @return SliderFilterDTO
     */
    public function setCreateDateStart(?string $createDateStart): SliderFilterDTO
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
     * @return SliderFilterDTO
     */
    public function setCreateDateEnd(?string $createDateEnd): SliderFilterDTO
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
     * @return SliderFilterDTO
     */
    public function setPublisherId(?int $publisherId): SliderFilterDTO
    {
        $this->publisherId = $publisherId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSliderInputStatus(): ?string
    {
        return $this->sliderInputStatus;
    }

    /**
     * @param null|string $sliderInputStatus
     * @return SliderFilterDTO
     */
    public function setSliderInputStatus(?string $sliderInputStatus): SliderFilterDTO
    {
        if (!$sliderInputStatus) {
            return $this;
        }
        $this->sliderInputStatus = $sliderInputStatus;
        $this->sliderRealStatus = config('slider.slider_convert_to_real_status.' . $sliderInputStatus);

        if ($this->sliderInputStatus == config('slider.slider_publish_status')) {
            $this->maxPublishDate = Carbon::now()->format('Y-m-d H:i:s');
        } elseif ($this->sliderInputStatus == config('slider.slider_ready_to_publish_status')) {
            $this->minPublishDate = Carbon::now()->format('Y-m-d H:i:s');
        }
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSliderRealStatus(): ?string
    {
        return $this->sliderRealStatus;
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
    public function getProvinceIds(): ?array
    {
        return $this->provinceIds;
    }

    /**
     * @param int|null $provinceId
     * @return SliderFilterDTO
     */
    public function addProvinceId(?int $provinceId): SliderFilterDTO
    {
        $this->provinceIds[] = $provinceId;
        return $this;
    }

    /**
     * @param array|null $provinceIds
     * @return SliderFilterDTO
     */
    public function setProvinceIds(?array $provinceIds): SliderFilterDTO
    {
        $this->provinceIds = $provinceIds;
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
     * @return SliderFilterDTO
     */
    public function setLanguage(?string $language): SliderFilterDTO
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
     * @return SliderFilterDTO
     */
    public function setSort(string $sort): SliderFilterDTO
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaginationCount(): int
    {
        return $this->paginationCount ?? config('slider.slider_paginate_count');
    }

    /**
     * @param int|null $paginationCount
     * @return SliderFilterDTO
     */
    public function setPaginationCount(?int $paginationCount): SliderFilterDTO
    {
        $this->paginationCount = $paginationCount;
        return $this;
    }

}