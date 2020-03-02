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
        if(!$newsInputStatus){
            return $this;
        }
        $this->newsInputStatus = $newsInputStatus;
        $this->newsRealStatus = config('news.news_convert_to_real_status.' . $newsInputStatus);

        if ($this->newsInputStatus == config('news.news_publish_status')) {
            $this->maxPublishDate = Carbon::now()->format('Y-m-d h:m:s');
        } elseif ($this->newsInputStatus == config('news.news_ready_to_publish_status')) {
            $this->minPublishDate = Carbon::now()->format('Y-m-d h:m:s');
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
     * @return int|null
     */
    public function getProvinceId(): ?int
    {
        return $this->provinceId;
    }

    /**
     * @param int|null $provinceId
     * @return NewsFilterDTO
     */
    public function setProvinceId(?int $provinceId): NewsFilterDTO
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
     * @return NewsFilterDTO
     */
    public function setLanguage(?string $language): NewsFilterDTO
    {
        $this->language = $language;
        return $this;
    }
}