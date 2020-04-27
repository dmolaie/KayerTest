<?php


namespace Domains\Media\Services\Contracts\DTOs;


use Domains\User\Entities\User;


/**
 * Class MediaEditDTO
 */
class MediaEditDTO extends MediaBaseSaveDTO
{
    /**
     * @var integer
     */
    protected $mediaId;
    /**
     * @var User
     */
    protected $editor;

    /**
     * @return mixed
     */
    public function getFirstTitle()
    {
        return $this->firstTitle;
    }

    /**
     * @param mixed $firstTitle
     * @return MediaEditDTO
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
     * @return MediaEditDTO
     */
    public function setCategories(?array $categories): MediaEditDTO
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
     * @return MediaEditDTO
     */
    public function setCategoryIsMain(?int $categoryIsMain): MediaEditDTO
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
     * @return MediaEditDTO
     */
    public function setPublishDate(string $publishDate): MediaEditDTO
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
     * @return MediaEditDTO
     */
    public function setSlug(?string $slug): MediaEditDTO
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
     * @return MediaEditDTO
     */
    public function setProvinceId(?int $provinceId): MediaEditDTO
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
     * @return MediaEditDTO
     */
    public function setLanguage(string $language): MediaEditDTO
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
     * @return MediaEditDTO
     */
    public function setStatus(?string $status): MediaEditDTO
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
     * @return MediaEditDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): MediaEditDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

    /**
     * @return int
     */
    public function getMediaId(): int
    {
        return $this->mediaId;
    }

    /**
     * @param int $mediaId
     * @return MediaEditDTO
     */
    public function setMediaId(int $mediaId): MediaEditDTO
    {
        $this->mediaId = $mediaId;
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
     * @return MediaEditDTO
     */
    public function setEditor(User $editor): MediaEditDTO
    {
        $this->editor = $editor;
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
     * @return MediaEditDTO
     */
    public function setType(string $type): MediaEditDTO
    {
        $this->type = $type;
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
     * @return MediaEditDTO
     */
    public function setUuid(?string $uuid): MediaEditDTO
    {
        $this->uuid = $uuid;
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
     * @return MediaEditDTO
     */
    public function setAbstract(?string $abstract): MediaEditDTO
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
     * @return MediaEditDTO
     */
    public function setDescription(?string $description): MediaEditDTO
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
     * @return MediaEditDTO
     */
    public function setContentFiles(?array $contentFiles): MediaEditDTO
    {
        $this->contentFiles = $contentFiles;
        return $this;
    }


}