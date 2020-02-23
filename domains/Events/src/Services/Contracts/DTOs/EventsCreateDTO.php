<?php


namespace Domains\Events\Services\Contracts\DTOs;


use Domains\User\Entities\User;


/**
 * Class NewsCreateDTO
 */
class EventsCreateDTO extends EventsBaseSaveDTO
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return EventsCreateDTO
     */
    public function setTitle($title)
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
     * @return EventsCreateDTO
     */
    public function setAbstract(?string $abstract): EventsCreateDTO
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
     * @return EventsCreateDTO
     */
    public function setDescription(?string $description): EventsCreateDTO
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
     * @return EventsCreateDTO
     */
    public function setCategoryId(?int $categoryId): EventsCreateDTO
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
     * @return EventsCreateDTO
     */
    public function setPublishDate(string $publishDate): EventsCreateDTO
    {
        $this->publishDate = $publishDate;
        return $this;
    }


    /**
     * @return string
     */
    public function getEventStartDate(): string
    {
        return $this->eventStartDate;
    }

    /**
     * @param string $eventStartDate
     * @return EventsCreateDTO
     */
    public function setEventStartDate(string $eventStartDate): EventsCreateDTO
    {
        $this->eventStartDate = $eventStartDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventEndDate(): string
    {
        return $this->eventEndDate;
    }

    /**
     * @param string $eventEndDate
     * @return EventsCreateDTO
     */
    public function setEventEndDate(string $eventEndDate): EventsCreateDTO
    {
        $this->eventEndDate = $eventEndDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventStartRegisterDate(): string
    {
        return $this->eventStartRegisterDate;
    }

    /**
     * @param string $eventStartRegisterDate
     * @return EventsCreateDTO
     */
    public function setEventStartRegisterDate(string $eventStartRegisterDate): EventsCreateDTO
    {
        $this->eventStartRegisterDate = $eventStartRegisterDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getEventEndtRegisterDate(): string
    {
        return $this->eventEndRegisterDate;
    }

    /**
     * @param string $eventEndDate
     * @return EventsCreateDTO
     */
    public function setEventEndRegisterDate(string $eventEndRegisterDate): EventsCreateDTO
    {
        $this->eventEndRegisterDate = $eventEndRegisterDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     * @return EventsCreateDTO
     */
    public function setLocation($location)
    {
        $this->location = $location;
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
     * @return EventsCreateDTO
     */
    public function setSourceLinkText(?string $sourceLinkText): EventsCreateDTO
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
     * @return EventsCreateDTO
     */
    public function setSourceLinkImage(?string $sourceLinkImage): EventsCreateDTO
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
     * @return EventsCreateDTO
     */
    public function setSourceLinkVideo(?string $sourceLinkVideo): EventsCreateDTO
    {
        $this->sourceLinkVideo = $sourceLinkVideo;
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
     * @return EventsCreateDTO
     */
    public function setProvinceId(?int $provinceId): EventsCreateDTO
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
     * @return EventsCreateDTO
     */
    public function setLanguage(string $language): EventsCreateDTO
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
     * @return EventsCreateDTO
     */
    public function setStatus(?string $status): EventsCreateDTO
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
     * @return EventsCreateDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): EventsCreateDTO
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
     * @return EventsCreateDTO
     */
    public function setPublisher(User $publisher): EventsCreateDTO
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
     * @return EventsCreateDTO
     */
    public function setParentId(?int $parentId): EventsCreateDTO
    {
        $this->parentId = $parentId;
        return $this;
    }

}