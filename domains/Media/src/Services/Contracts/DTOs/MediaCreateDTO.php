<?php


namespace Domains\Media\Services\Contracts\DTOs;

use Domains\User\Entities\User;


/**
 * Class MediaCreateDTO
 */
class MediaCreateDTO extends MediaBaseSaveDTO
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
     * @return MediaCreateDTO
     */
    public function setFirstTitle($firstTitle)
    {
        $this->firstTitle = $firstTitle;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCategories(): ?array
    {
        return $this->categories;
    }

    /**
     * @param array|null $categories
     * @return MediaCreateDTO
     */
    public function setCategories(?array $categories): MediaCreateDTO
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCategoryIsMain(): ?int
    {
        return $this->categoryIsMain;
    }

    /**
     * @param int|null $categoryIsMain
     * @return MediaCreateDTO
     */
    public function setCategoryIsMain(?int $categoryIsMain): MediaCreateDTO
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
     * @return MediaCreateDTO
     */
    public function setPublishDate(string $publishDate): MediaCreateDTO
    {
        $this->publishDate = $publishDate;
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
     * @return MediaCreateDTO
     */
    public function setSlug(?string $slug): MediaCreateDTO
    {
        $this->slug = $slug;
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
     * @return MediaCreateDTO
     */
    public function setProvinceId(?int $provinceId): MediaCreateDTO
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
     * @return MediaCreateDTO
     */
    public function setLanguage(string $language): MediaCreateDTO
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
     * @return MediaCreateDTO
     */
    public function setStatus(?string $status): MediaCreateDTO
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
     * @return MediaCreateDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): MediaCreateDTO
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
     * @return MediaCreateDTO
     */
    public function setPublisher(User $publisher): MediaCreateDTO
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
     * @return MediaCreateDTO
     */
    public function setParentId(?int $parentId): MediaCreateDTO
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     * @return MediaCreateDTO
     */
    public function setUuid(?string $uuid): MediaCreateDTO
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return MediaCreateDTO
     */
    public function setType(string $type): MediaCreateDTO
    {
        $this->type = $type;
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
     * @return MediaCreateDTO
     */
    public function setAbstract(?string $abstract): MediaCreateDTO
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
     * @return MediaCreateDTO
     */
    public function setDescription(?string $description): MediaCreateDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getContentFiles(): ?array
    {
        return $this->contentFiles;
    }

    /**
     * @param array|null $contentFiles
     * @return MediaCreateDTO
     */
    public function setContentFiles(?array $contentFiles): MediaCreateDTO
    {
        $this->contentFiles = $contentFiles;
        return $this;
    }

}