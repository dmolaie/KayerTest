<?php


namespace Domains\Media\Services\Contracts\DTOs;


use Carbon\Carbon;

/**
 * Class MediaFilterDTO
 */
class MediaFilterDTO
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
     * @var string|null
     */
    protected $mediaInputStatus;
    /**
     * @var null|string
     */
    protected $mediaRealStatus;
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
    protected $type;
    /**
     * @var int|null
     */
    protected $paginationCount;
    /**
     * @var string
     */
    protected $sort = 'DESC';
    /**
     * @return string|null
     */
    public function getFirstTitle(): ?string
    {
        return $this->firstTitle;
    }

    /**
     * @param string|null $firstTitle
     * @return MediaFilterDTO
     */
    public function setFirstTitle(?string $firstTitle): MediaFilterDTO
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
     * @return MediaFilterDTO
     */
    public function setCreateDateStart(?string $createDateStart): MediaFilterDTO
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
     * @return MediaFilterDTO
     */
    public function setCreateDateEnd(?string $createDateEnd): MediaFilterDTO
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
     * @return MediaFilterDTO
     */
    public function setPublisherId(?int $publisherId): MediaFilterDTO
    {
        $this->publisherId = $publisherId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMediaInputStatus(): ?string
    {
        return $this->mediaInputStatus;
    }

    /**
     * @param null|string $mediaInputStatus
     * @return MediaFilterDTO
     */
    public function setMediaInputStatus(?string $mediaInputStatus): MediaFilterDTO
    {
        if(!$mediaInputStatus){
            return $this;
        }
        $this->mediaInputStatus = $mediaInputStatus;
        $this->mediaRealStatus = config('media.media_convert_to_real_status.' . $mediaInputStatus);

        if ($this->mediaInputStatus == config('media.media_publish_status')) {
            $this->maxPublishDate = Carbon::now()->format('Y-m-d H:i:s');
        } elseif ($this->mediaInputStatus == config('media.media_ready_to_publish_status')) {
            $this->minPublishDate = Carbon::now()->format('Y-m-d H:i:s');
        }
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMediaRealStatus(): ?string
    {
        return $this->mediaRealStatus;
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
     * @return MediaFilterDTO
     */
    public function setCategoryIds(?array $categoryIds): MediaFilterDTO
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
     * @return MediaFilterDTO
     */
    public function setProvinceId(?int $provinceId): MediaFilterDTO
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
     * @return MediaFilterDTO
     */
    public function setLanguage(?string $language): MediaFilterDTO
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
     * @return MediaFilterDTO
     */
    public function setSort(string $sort): MediaFilterDTO
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return MediaFilterDTO
     */
    public function setType(?string $type): MediaFilterDTO
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPaginationCount(): ?int
    {
        return $this->paginationCount;
    }

    /**
     * @param int|null $paginationCount
     * @return MediaFilterDTO
     */
    public function setPaginationCount(?int $paginationCount): MediaFilterDTO
    {
        $this->paginationCount = $paginationCount;
        return $this;
    }

}