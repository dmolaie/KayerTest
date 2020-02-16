<?php


namespace Domains\News\src\Services\Contracts\DTOs;


use Domains\Location\Entities\Province;
use Domains\User\Entities\User;

/**
 * Class NewsInfoDTO
 */
class NewsInfoDTO
{
    /**
     * @var string
     */
    protected $firstTitle;
    /**
     * @var null|string
     */
    protected $secondTitle;
    /**
     * @var null|string
     */
    protected $abstract;
    /**
     * @var null|string
     */
    protected $description;
    /**
     * @var null|string
     */
    protected $category;
    /**
     * @var string
     */
    protected $publishDate;
    /**
     * @var null|string
     */
    protected $sourceLink;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var Province
     */
    protected $province;
    /**
     * @var User
     */
    protected $editor;
    /**
     * @var string
     */
    protected $language;
    /**
     * @var null|integer
     */
    protected $relationNewsId;

    /**
     * @return int|null
     */
    public function getRelationNewsId(): ?int
    {
        return $this->relationNewsId;
    }

    /**
     * @param int|null $relationNewsId
     * @return NewsInfoDTO
     */
    public function setRelationNewsId(?int $relationNewsId): NewsInfoDTO
    {
        $this->relationNewsId = $relationNewsId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstTitle(): string
    {
        return $this->firstTitle;
    }

    /**
     * @param string $firstTitle
     * @return NewsInfoDTO
     */
    public function setFirstTitle(string $firstTitle): NewsInfoDTO
    {
        $this->firstTitle = $firstTitle;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSecondTitle(): ?string
    {
        return $this->secondTitle;
    }

    /**
     * @param string|null $secondTitle
     * @return NewsInfoDTO
     */
    public function setSecondTitle(?string $secondTitle): NewsInfoDTO
    {
        $this->secondTitle = $secondTitle;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    /**
     * @param string|null $abstract
     * @return NewsInfoDTO
     */
    public function setAbstract(?string $abstract): NewsInfoDTO
    {
        $this->abstract = $abstract;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return NewsInfoDTO
     */
    public function setDescription(?string $description): NewsInfoDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * @param string|null $category
     * @return NewsInfoDTO
     */
    public function setCategory(?string $category): NewsInfoDTO
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublishDate(): string
    {
        return $this->publishDate;
    }

    /**
     * @param string $publishDate
     * @return NewsInfoDTO
     */
    public function setPublishDate(string $publishDate): NewsInfoDTO
    {
        $this->publishDate = $publishDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSourceLink(): ?string
    {
        return $this->sourceLink;
    }

    /**
     * @param string|null $sourceLink
     * @return NewsInfoDTO
     */
    public function setSourceLink(?string $sourceLink): NewsInfoDTO
    {
        $this->sourceLink = $sourceLink;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return NewsInfoDTO
     */
    public function setStatus(string $status): NewsInfoDTO
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Province
     */
    public function getProvince(): Province
    {
        return $this->province;
    }

    /**
     * @param Province $province
     * @return NewsInfoDTO
     */
    public function setProvince(Province $province): NewsInfoDTO
    {
        $this->province = $province;
        return $this;
    }

    /**
     * @return User
     */
    public function getEditor(): User
    {
        return $this->editor;
    }

    /**
     * @param User $editor
     * @return NewsInfoDTO
     */
    public function setEditor(User $editor): NewsInfoDTO
    {
        $this->editor = $editor;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return NewsInfoDTO
     */
    public function setLanguage(string $language): NewsInfoDTO
    {
        $this->language = $language;
        return $this;
    }
}