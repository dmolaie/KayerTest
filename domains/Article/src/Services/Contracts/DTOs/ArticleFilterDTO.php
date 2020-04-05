<?php


namespace Domains\Article\Services\Contracts\DTOs;


use Carbon\Carbon;

/**
 * Class ArticleFilterDTO
 */
class ArticleFilterDTO
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
    protected $articleInputStatus;
    /**
     * @var null|string
     */
    protected $articleRealStatus;
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
     * @return ArticleFilterDTO
     */
    public function setFirstTitle(?string $firstTitle): ArticleFilterDTO
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
     * @return ArticleFilterDTO
     */
    public function setCreateDateStart(?string $createDateStart): ArticleFilterDTO
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
     * @return ArticleFilterDTO
     */
    public function setCreateDateEnd(?string $createDateEnd): ArticleFilterDTO
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
     * @return ArticleFilterDTO
     */
    public function setPublisherId(?int $publisherId): ArticleFilterDTO
    {
        $this->publisherId = $publisherId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getArticleInputStatus(): ?string
    {
        return $this->articleInputStatus;
    }

    /**
     * @param null|string $articleInputStatus
     * @return ArticleFilterDTO
     */
    public function setArticleInputStatus(?string $articleInputStatus): ArticleFilterDTO
    {
        if(!$articleInputStatus){
            return $this;
        }
        $this->articleInputStatus = $articleInputStatus;
        $this->articleRealStatus = config('article.article_convert_to_real_status.' . $articleInputStatus);

        if ($this->articleInputStatus == config('article.article_publish_status')) {
            $this->maxPublishDate = Carbon::now()->format('Y-m-d H:m:s');
        } elseif ($this->articleInputStatus == config('article.article_ready_to_publish_status')) {
            $this->minPublishDate = Carbon::now()->format('Y-m-d H:m:s');
        }
        return $this;
    }

    /**
     * @return null|string
     */
    public function getArticleRealStatus(): ?string
    {
        return $this->articleRealStatus;
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
     * @return ArticleFilterDTO
     */
    public function setCategoryIds(?array $categoryIds): ArticleFilterDTO
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
     * @return ArticleFilterDTO
     */
    public function setProvinceId(?int $provinceId): ArticleFilterDTO
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
     * @return ArticleFilterDTO
     */
    public function setLanguage(?string $language): ArticleFilterDTO
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
     * @return ArticleFilterDTO
     */
    public function setSort(string $sort): ArticleFilterDTO
    {
        $this->sort = $sort;
        return $this;
    }

}