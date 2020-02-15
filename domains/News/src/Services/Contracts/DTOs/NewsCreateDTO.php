<?php


namespace Domains\News\Services\Contracts\DTOs;


use Domains\User\Entities\User;


/**
 * Class NewsCreateDTO
 */
class NewsCreateDTO
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
     * @var null|integer
     */
    protected $categoryId;
    /**
     * @var  string
     */
    protected $publishDate;
    /**
     * @var null|string
     */
    protected $sourceLink;
    /**
     * @var null|integer
     */
    protected $provinceId;
    /**
     * @var string
     */
    protected $language;
    /**
     * @var null|string
     */
    protected $status;
    /**
     * @var User
     */
    protected $editor;

    /**
     * @return string
     */
    public function getFirstTitle(): string
    {
        return $this->firstTitle;
    }

    /**
     * @param string $firstTitle
     * @return NewsCreateDTO
     */
    public function setFirstTitle(string $firstTitle): NewsCreateDTO
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
     * @return NewsCreateDTO
     */
    public function setSecondTitle(?string $secondTitle): NewsCreateDTO
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
     * @return NewsCreateDTO
     */
    public function setAbstract(?string $abstract): NewsCreateDTO
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
     * @return NewsCreateDTO
     */
    public function setDescription(?string $description): NewsCreateDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    /**
     * @param int|null $categoryId
     * @return NewsCreateDTO
     */
    public function setCategoryId(?int $categoryId): NewsCreateDTO
    {
        $this->categoryId = $categoryId;
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
     * @return NewsCreateDTO
     */
    public function setPublishDate(string $publishDate): NewsCreateDTO
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
     * @return NewsCreateDTO
     */
    public function setSourceLink(?string $sourceLink): NewsCreateDTO
    {
        $this->sourceLink = $sourceLink;
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
     * @return NewsCreateDTO
     */
    public function setProvinceId(?int $provinceId): NewsCreateDTO
    {
        $this->provinceId = $provinceId;
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
     * @return NewsCreateDTO
     */
    public function setLanguage(string $language): NewsCreateDTO
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return NewsCreateDTO
     */
    public function setStatus(?string $status): NewsCreateDTO
    {
        $this->status = $status;
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
     * @return NewsCreateDTO
     */
    public function setEditor(User $editor): NewsCreateDTO
    {
        $this->editor = $editor;
        return $this;
    }


}