<?php


namespace Domains\News\Services\Contracts\DTOs;


use Domains\User\Entities\User;


/**
 * Class NewsCreateDTO
 */
class NewsCreateDTO extends NewsBaseSaveDTO
{
    /**
     * @var User
     */
    protected $publisher;
    /**
     * @var null|integer
     */
    protected $parentId;

    /**
     * @return mixed
     */
    public function getFirstTitle()
    {
        return $this->firstTitle;
    }

    /**
     * @param mixed $firstTitle
     * @return NewsCreateDTO
     */
    public function setFirstTitle($firstTitle)
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
     * @return array|null
     */
    public function getCategoryIds(): ?array
    {
        return $this->categoryIds;
    }

    /**
     * @param array|null $categoryIds
     * @return NewsCreateDTO
     */
    public function setCategoryIds(?array $categoryIds): NewsCreateDTO
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryIsMain(): ?int
    {
        return $this->categoryIsMain;
    }

    /**
     * @param null|int $categoryIsMain
     * @return NewsCreateDTO
     */
    public function setCategoryIsMain(?int $categoryIsMain): NewsCreateDTO
    {
        $this->categoryIsMain = $categoryIsMain;
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
     * @return array|null
     */
    public function getAttachmentFiles(): ?array
    {
        return $this->attachmentFiles;
    }

    /**
     * @param array|null $attachmentFiles
     * @return NewsCreateDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): NewsCreateDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

    /**
     * @return User
     */
    public function getPublisher(): User
    {
        return $this->publisher;
    }

    /**
     * @param User $publisher
     * @return NewsCreateDTO
     */
    public function setPublisher(User $publisher): NewsCreateDTO
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @param int|null $parentId
     * @return NewsCreateDTO
     */
    public function setParentId(?int $parentId): NewsCreateDTO
    {
        $this->parentId = $parentId;
        return $this;
    }


}