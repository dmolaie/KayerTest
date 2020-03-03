<?php


namespace Domains\Event\Services\Contracts\DTOs;



use Domains\User\Entities\User;


/**
 * Class NewsCreateDTO
 */
class EventCreateDTO extends EventBaseSaveDTO
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
     * @return EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setAbstract(?string $abstract): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setDescription(?string $description): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setCategoryIds(?array $categoryIds): EventCreateDTO
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }

    /**
     * @return null|int
     */
    public function getCategoryIsMain(): ?int
    {
        return $this->categoryIsMain;
    }

    /**
     * @param null|int $categoryIsMain
     * @return EventCreateDTO
     */
    public function setCategoryIsMain(?int $categoryIsMain): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setPublishDate(string $publishDate): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setEventStartDate(string $eventStartDate): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setEventEndDate(string $eventEndDate): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setEventStartRegisterDate(string $eventStartRegisterDate): EventCreateDTO
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
     * @param string $eventEndRegisterDate
     * @return EventCreateDTO
     */
    public function setEventEndRegisterDate(string $eventEndRegisterDate): EventCreateDTO
    {
        $this->eventEndRegisterDate = $eventEndRegisterDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param $location
     * @return EventCreateDTO
     */
    public function setLocation($location) : EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setSourceLinkText(?string $sourceLinkText): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setSourceLinkImage(?string $sourceLinkImage): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setSourceLinkVideo(?string $sourceLinkVideo): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setProvinceId(?int $provinceId): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setLanguage(string $language): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setStatus(?string $status): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setPublisher(User $publisher): EventCreateDTO
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
     * @return EventCreateDTO
     */
    public function setParentId(?int $parentId): EventCreateDTO
    {
        $this->parentId = $parentId;
        return $this;
    }

}