<?php


namespace Domains\Events\Services\Contracts\DTOs;

use Domains\Category\Entities\Category;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;

/**
 * Class NewsInfoDTO
 */
class EventsInfoDTO
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
     * @return User|null
     */
    public function getEditor(): ?User
    {
        return $this->editor;
    }

    /**
     * @param User|null $editor
     * @return EventsInfoDTO
     */
    public function setEditor(?User $editor): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setId(int $id): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setRelationEventId(?int $relationEventId): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setTitle(string $title): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setAbstract(?string $abstract): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setDescription(?string $description): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setCategory($category): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setPublishDate(string $publishDate): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setSourceLink(?string $sourceLink): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setSourceLinkText(?string $sourceLinkText): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setSourceLinkImage(?string $sourceLinkImage): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setSourceLinkVideo(?string $sourceLinkVideo): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setStatus(string $status): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setProvince(Province $province): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setPublisher(User $publisher): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setEventStartDate(?string $eventStartDate): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setEventEndDate(?string $eventEndDate): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setEventStartRegisterDate(?string $eventStartRegisterDate): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setEventEndRegisterDate(?string $eventEndRegisterDate): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setLocation(?string $location): EventsInfoDTO
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
     * @return EventsInfoDTO
     */
    public function setLanguage(string $language): EventsInfoDTO
    {
        $this->language = $language;
        return $this;
    }
}