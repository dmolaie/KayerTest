<?php


namespace Domains\Events\Services\Contracts\DTOs;


use Domains\User\Entities\User;


/**
 * Class NewsEditDTO
 */
class EventsEditDTO extends EventsBaseSaveDTO
{
    /**
     * @var integer
     */
    protected $eventId;

    /**
     * @var User
     */
    protected $editor;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setAbstract(?string $abstract): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setDescription(?string $description): EventsEditDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param int|null $categoryId
     * @return EventsEditDTO
     */
    public function setCategoryId($categoryId): EventsEditDTO
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryIsMain()
    {
        return $this->categoryIsMain;
    }

    /**
     * @param mixed $categoryIsMain
     * @return EventsEditDTO
     */
    public function setCategoryIsMain($categoryIsMain): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setPublishDate(string $publishDate): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setEventStartDate(string $eventStartDate): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setEventEndDate(string $eventEndDate): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setEventStartRegisterDate(string $eventStartRegisterDate): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setEventEndRegisterDate(string $eventEndRegisterDate): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setLocation($location): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setSourceLinkText(?string $sourceLinkText): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setSourceLinkImage(?string $sourceLinkImage): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setSourceLinkVideo(?string $sourceLinkVideo): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setProvinceId(?int $provinceId): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setLanguage(string $language): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setStatus(?string $status): EventsEditDTO
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
     * @return EventsEditDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): EventsEditDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

    /**
     * @return int
     */
    public function getEventsId(): int
    {
        return $this->eventId;
    }

    /**
     * @param int $eventId
     * @return EventsEditDTO
     */
    public function setEventsId(int $eventId): EventsEditDTO
    {
        $this->eventId = $eventId;
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
     * @return EventsEditDTO
     */
    public function setEditor(User $editor): EventsEditDTO
    {
        $this->editor = $editor;
        return $this;
    }


}