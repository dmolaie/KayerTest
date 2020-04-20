<?php


namespace Domains\Event\Services\Contracts\DTOs;

use Domains\Category\Entities\Category;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;

/**
 * Class EventInfoDTO
 */
class EventInfoDTO
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var null|string
     */
    protected $abstract;

    /**
     * @var null|string
     */
    protected $description;

    /**
     * @var null|Category
     */
    protected $category;

    /**
     * @var string
     */
    protected $publishDate;

    /**
     * @var null|string
     */
    protected $eventStartDate;

    /**
     * @var null|string
     */
    protected $eventEndDate;

    /**
     * @var null|string
     */
    protected $eventStartRegisterDate;

    /**
     * @var null|string
     */
    protected $eventEndRegisterDate;

    /**
     * @var null|string
     */
    protected $location;

    /**
     * @var null|string
     */
    protected $sourceLinkText;


    /**
     * @var null|string
     */
    protected $sourceLinkImage;

    /**
     * @var null|string
     */
    protected $sourceLinkVideo;

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
    protected $publisher;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var null|integer
     */
    protected $relationEventId;

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
    protected $slug;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     * @return EventInfoDTO
     */
    public function setUuid(string $uuid): EventInfoDTO
    {
        $this->uuid = $uuid;
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
     * @return EventInfoDTO
     */
    public function setEditor(?User $editor): EventInfoDTO
    {
        $this->editor = $editor;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return EventInfoDTO
     */
    public function setId(int $id): EventInfoDTO
    {
        $this->id = $id;
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
     * @return EventInfoDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): EventInfoDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRelationEventId(): ?int
    {
        return $this->relationEventId;
    }

    /**
     * @param int|null $relationEventId
     * @return EventInfoDTO
     */
    public function setRelationEventId(?int $relationEventId): EventInfoDTO
    {
        $this->relationEventId = $relationEventId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return EventInfoDTO
     */
    public function setTitle(string $title): EventInfoDTO
    {
        $this->title = $title;
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
     * @return EventInfoDTO
     */
    public function setAbstract(?string $abstract): EventInfoDTO
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
     * @return EventInfoDTO
     */
    public function setDescription(?string $description): EventInfoDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Category|null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     * @return EventInfoDTO
     */
    public function setCategory($category): EventInfoDTO
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
     * @return EventInfoDTO
     */
    public function setPublishDate(string $publishDate): EventInfoDTO
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
     * @return EventInfoDTO
     */
    public function setSourceLink(?string $sourceLink): EventInfoDTO
    {
        $this->sourceLink = $sourceLink;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSourceLinkText(): ?string
    {
        return $this->sourceLinkText;
    }

    /**
     * @param string|null $sourceLinkText
     * @return EventInfoDTO
     */
    public function setSourceLinkText(?string $sourceLinkText): EventInfoDTO
    {
        $this->sourceLinkText = $sourceLinkText;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSourceLinkImage(): ?string
    {
        return $this->sourceLinkImage;
    }

    /**
     * @param string|null $sourceLinkImage
     * @return EventInfoDTO
     */
    public function setSourceLinkImage(?string $sourceLinkImage): EventInfoDTO
    {
        $this->sourceLinkImage = $sourceLinkImage;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSourceLinkVideo(): ?string
    {
        return $this->sourceLinkVideo;
    }

    /**
     * @param string|null $sourceLinkVideo
     * @return EventInfoDTO
     */
    public function setSourceLinkVideo(?string $sourceLinkVideo): EventInfoDTO
    {
        $this->sourceLinkVideo = $sourceLinkVideo;
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
     * @return EventInfoDTO
     */
    public function setStatus(string $status): EventInfoDTO
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
     * @return EventInfoDTO
     */
    public function setProvince(Province $province): EventInfoDTO
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
     * @return EventInfoDTO
     */
    public function setPublisher(User $publisher): EventInfoDTO
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEventStartDate(): ?string
    {
        return $this->eventStartDate;
    }

    /**
     * @param string|null $eventStartDate
     * @return EventInfoDTO
     */
    public function setEventStartDate(?string $eventStartDate): EventInfoDTO
    {
        $this->eventStartDate = $eventStartDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEventEndDate(): ?string
    {
        return $this->eventEndDate;
    }

    /**
     * @param string|null $eventEndDate
     * @return EventInfoDTO
     */
    public function setEventEndDate(?string $eventEndDate): EventInfoDTO
    {
        $this->eventEndDate = $eventEndDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEventStartRegisterDate(): ?string
    {
        return $this->eventStartRegisterDate;
    }

    /**
     * @param string|null $eventStartRegisterDate
     * @return EventInfoDTO
     */
    public function setEventStartRegisterDate(?string $eventStartRegisterDate): EventInfoDTO
    {
        $this->eventStartRegisterDate = $eventStartRegisterDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEventEndRegisterDate(): ?string
    {
        return $this->eventEndRegisterDate;
    }

    /**
     * @param string|null $eventEndRegisterDate
     * @return EventInfoDTO
     */
    public function setEventEndRegisterDate(?string $eventEndRegisterDate): EventInfoDTO
    {
        $this->eventEndRegisterDate = $eventEndRegisterDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string|null $location
     * @return EventInfoDTO
     */
    public function setLocation(?string $location): EventInfoDTO
    {
        $this->location = $location;
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
     * @return EventInfoDTO
     */
    public function setLanguage(string $language): EventInfoDTO
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return EventInfoDTO
     */
    public function setSlug(string $slug): EventInfoDTO
    {
        $this->slug = $slug;
        return $this;
    }

}