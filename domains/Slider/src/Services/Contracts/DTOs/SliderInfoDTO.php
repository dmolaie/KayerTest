<?php


namespace Domains\Slider\Services\Contracts\DTOs;


use Domains\Location\Entities\Province;
use Domains\User\Entities\User;

/**
 * Class SliderInfoDTO
 */
class SliderInfoDTO
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
     * @var null|string
     */
    protected $secondTitle;
    /**
     * @var null|string
     */
    protected $abstract;
    /**
     * @var null|string
     */
    protected $description;
    /**
     * @var null|array
     */
    protected $category;
    /**
     * @var string
     */
    protected $publishDate;
    /**
     * @var null|string
     */
    protected $sourceLink;
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
    protected $relationSliderId;
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
     * @return User|null
     */
    public function getEditor(): ?User
    {
        return $this->editor;
    }

    /**
     * @param User|null $editor
     * @return SliderInfoDTO
     */
    public function setEditor(?User $editor): SliderInfoDTO
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
     * @return SliderInfoDTO
     */
    public function setId(int $id): SliderInfoDTO
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
     * @return SliderInfoDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): SliderInfoDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRelationSliderId(): ?int
    {
        return $this->relationSliderId;
    }

    /**
     * @param int|null $relationSliderId
     * @return SliderInfoDTO
     */
    public function setRelationSliderId(?int $relationSliderId): SliderInfoDTO
    {
        $this->relationSliderId = $relationSliderId;
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
     * @return SliderInfoDTO
     */
    public function setFirstTitle(string $firstTitle): SliderInfoDTO
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
     * @return SliderInfoDTO
     */
    public function setSecondTitle(?string $secondTitle): SliderInfoDTO
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
     * @return SliderInfoDTO
     */
    public function setAbstract(?string $abstract): SliderInfoDTO
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
     * @return SliderInfoDTO
     */
    public function setDescription(?string $description): SliderInfoDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCategory():?array
    {
        return $this->category;
    }

    /**
     * @param array|null $category
     * @return SliderInfoDTO
     */
    public function setCategory(?array $category): SliderInfoDTO
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
     * @return SliderInfoDTO
     */
    public function setPublishDate(string $publishDate): SliderInfoDTO
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
     * @return SliderInfoDTO
     */
    public function setSourceLink(?string $sourceLink): SliderInfoDTO
    {
        $this->sourceLink = $sourceLink;
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
     * @return SliderInfoDTO
     */
    public function setStatus(string $status): SliderInfoDTO
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
     * @return SliderInfoDTO
     */
    public function setProvince(Province $province): SliderInfoDTO
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
     * @return SliderInfoDTO
     */
    public function setPublisher(User $publisher): SliderInfoDTO
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
     * @return SliderInfoDTO
     */
    public function setLanguage(string $language): SliderInfoDTO
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
     * @return SliderInfoDTO
     */
    public function setSlug(string $slug): SliderInfoDTO
    {
        $this->slug = $slug;
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
     * @return SliderInfoDTO
     */
    public function setUuid(string $uuid): SliderInfoDTO
    {
        $this->uuid = $uuid;
        return $this;
    }

}