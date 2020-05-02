<?php


namespace Domains\Media\Services\Contracts\DTOs;


use Domains\Location\Entities\Province;
use Domains\User\Entities\User;

/**
 * Class MediaInfoDTO
 */
class MediaInfoDTO
{
    /**
     * @var integer
     */
    protected $id;
    /**
     * @var string
     */
    protected $firstTitle;
    /**
     * @var null|array
     */
    protected $categories;
    /**
     * @var string
     */
    protected $publishDate;
    /**
     * @var null|string
     */
    protected $slug;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var null|Province
     */
    protected $province;
    /**
     * @var User
     */
    protected $publisher;
    /**
     * @var string
     */
    protected $language;
    /**
     * @var null|integer
     */
    protected $relationMediaId;
    /**
     * @var null|array
     */
    protected $attachmentFiles;
    /**
     * @var null|User
     */
    protected $editor;
    /**
     * @var string
     */
    protected $uuid;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string|null
     */
    protected $abstract;
    /**
     * @var string|null
     */
    protected $description;
    /**
     * @var null|array
     */
    protected $contentFiles;
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return MediaInfoDTO
     */
    public function setId(int $id): MediaInfoDTO
    {
        $this->id = $id;
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
     * @return MediaInfoDTO
     */
    public function setFirstTitle(string $firstTitle): MediaInfoDTO
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
     * @return MediaInfoDTO
     */
    public function setCategories(?array $categories): MediaInfoDTO
    {
        $this->categories = $categories;
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
     * @return MediaInfoDTO
     */
    public function setPublishDate(string $publishDate): MediaInfoDTO
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
     * @return MediaInfoDTO
     */
    public function setSlug(?string $slug): MediaInfoDTO
    {
        $this->slug = $slug;
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
     * @return MediaInfoDTO
     */
    public function setStatus(string $status): MediaInfoDTO
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Province|null
     */
    public function getProvince(): ?Province
    {
        return $this->province;
    }

    /**
     * @param Province|null $province
     * @return MediaInfoDTO
     */
    public function setProvince(?Province $province): MediaInfoDTO
    {
        $this->province = $province;
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
     * @return MediaInfoDTO
     */
    public function setPublisher(User $publisher): MediaInfoDTO
    {
        $this->publisher = $publisher;
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
     * @return MediaInfoDTO
     */
    public function setLanguage(string $language): MediaInfoDTO
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRelationMediaId(): ?int
    {
        return $this->relationMediaId;
    }

    /**
     * @param int|null $relationMediaId
     * @return MediaInfoDTO
     */
    public function setRelationMediaId(?int $relationMediaId): MediaInfoDTO
    {
        $this->relationMediaId = $relationMediaId;
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
     * @return MediaInfoDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): MediaInfoDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getEditor(): ?User
    {
        return $this->editor;
    }

    /**
     * @param User|null $editor
     * @return MediaInfoDTO
     */
    public function setEditor(?User $editor): MediaInfoDTO
    {
        $this->editor = $editor;
        return $this;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     * @return MediaInfoDTO
     */
    public function setUuid(string $uuid): MediaInfoDTO
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
     * @return MediaInfoDTO
     */
    public function setType(string $type): MediaInfoDTO
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string|null $abstract
     * @return MediaInfoDTO
     */
    public function setAbstract(?string $abstract): MediaInfoDTO
    {
        $this->abstract = $abstract;
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
     * @param string|null $description
     * @return MediaInfoDTO
     */
    public function setDescription(?string $description): MediaInfoDTO
    {
        $this->description = $description;
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
     * @return array|null
     */
    public function getContentFiles(): ?array
    {
        return $this->contentFiles;
    }

    /**
     * @param array|null $contentFiles
     * @return MediaInfoDTO
     */
    public function setContentFiles(?array $contentFiles): MediaInfoDTO
    {
        $this->contentFiles = $contentFiles;
        return $this;
    }


}