<?php


namespace Domains\Event\Services\Contracts\DTOs;


use Domains\User\Entities\User;


/**
 * Class EventEditDTO
 */
class EventEditDTO extends EventBaseSaveDTO
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
     * @return EventEditDTO
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
     * @return EventEditDTO
     */
    public function setAbstract(?string $abstract): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setDescription(?string $description): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setCategoryIds(?array $categoryIds): EventEditDTO
    {
        $this->categoryIds = $categoryIds;
        return $this;
    }

    /**
     * @return null|int
     */
    public function getCategoryIsMain():?int
    {
        return $this->categoryIsMain;
    }

    /**
     * @param null|int $categoryIsMain
     * @return EventEditDTO
     */
    public function setCategoryIsMain(?int $categoryIsMain): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setPublishDate(string $publishDate): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setEventStartDate(string $eventStartDate): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setEventEndDate(string $eventEndDate): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setEventStartRegisterDate(string $eventStartRegisterDate): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setEventEndRegisterDate(string $eventEndRegisterDate): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setLocation($location): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setSourceLinkText(?string $sourceLinkText): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setSourceLinkImage(?string $sourceLinkImage): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setSourceLinkVideo(?string $sourceLinkVideo): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setProvinceId(?int $provinceId): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setLanguage(string $language): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setStatus(?string $status): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): EventEditDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

    /**
     * @return int
     */
    public function getEventId(): int
    {
        return $this->eventId;
    }

    /**
     * @param int $eventId
     * @return EventEditDTO
     */
    public function setEventId(int $eventId): EventEditDTO
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
     * @return EventEditDTO
     */
    public function setEditor(User $editor): EventEditDTO
    {
        $this->editor = $editor;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param null|string $slug
     * @return EventEditDTO
     */
    public function setSlug(?string $slug): EventEditDTO
    {
        $this->slug = $slug;
        return $this;
    }


}