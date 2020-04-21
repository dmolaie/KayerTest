<?php


namespace Domains\News\Services\Contracts\DTOs;


use Carbon\Carbon;

/**
 * Class NewsFilterDTO
 */
class NewsFilterDTO
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
    protected $newsInputStatus;
    /**
     * @var string
     */
    protected $newsRealStatus;
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
     * @var array|null
     */
    protected $provinceIds;
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
     * @return NewsFilterDTO
     */
    public function setFirstTitle(?string $firstTitle): NewsFilterDTO
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
     * @return NewsFilterDTO
     */
    public function setCreateDateStart(?string $createDateStart): NewsFilterDTO
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
     * @return NewsFilterDTO
     */
    public function setCreateDateEnd(?string $createDateEnd): NewsFilterDTO
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
     * @return NewsFilterDTO
     */
    public function setPublisherId(?int $publisherId): NewsFilterDTO
    {
        $this->publisherId = $publisherId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNewsInputStatus(): ?string
    {
        return $this->newsInputStatus;
    }

    /**
     * @param null|string $newsInputStatus
     * @return NewsFilterDTO
     */
    public function setNewsInputStatus(?string $newsInputStatus): NewsFilterDTO
    {
        if (!$newsInputStatus) {
            return $this;
        }
        $this->newsInputStatus = $newsInputStatus;
        $this->newsRealStatus = config('news.news_convert_to_real_status.' . $newsInputStatus);

        if ($this->newsInputStatus == config('news.news_publish_status')) {
            $this->maxPublishDate = Carbon::now()->format('Y-m-d H:i:s');
        } elseif ($this->newsInputStatus == config('news.news_ready_to_publish_status')) {
            $this->minPublishDate = Carbon::now()->format('Y-m-d H:i:s');
        }
        return $this;
    }

    /**
     * @return null|string
     */
    public function getNewsRealStatus(): ?string
    {
        return $this->newsRealStatus;
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
     * @return NewsFilterDTO
     */
    public function setCategoryIds(?array $categoryIds): NewsFilterDTO
    {
        $this->categoryIds = $categoryIds;
        return $this;
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
     * @return NewsFilterDTO
     */
    public function addProvinceId(?int $provinceId): NewsFilterDTO
    {
        $this->provinceIds[] = $provinceId;
        return $this;
    }

    /**
     * @param array|null $provinceIds
     * @return NewsFilterDTO
     */
    public function setProvinceIds(?array $provinceIds): NewsFilterDTO
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
     * @return NewsFilterDTO
     */
    public function setLanguage(?string $language): NewsFilterDTO
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
     * @return NewsFilterDTO
     */
    public function setSort(string $sort): NewsFilterDTO
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return int
     */
    public function getPaginationCount(): int
    {
        return $this->paginationCount ?? config('news.news_paginate_count');
    }

    /**
     * @param int|null $paginationCount
     * @return NewsFilterDTO
     */
    public function setPaginationCount(?int $paginationCount): NewsFilterDTO
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
     * @return NewsFilterDTO
     */
    public function setSlug(?string $slug): NewsFilterDTO
    {
        $this->slug = $slug;
        return $this;
    }

}