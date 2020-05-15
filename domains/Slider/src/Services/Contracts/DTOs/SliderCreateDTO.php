<?php


namespace Domains\Slider\Services\Contracts\DTOs;


use Domains\User\Entities\User;


/**
 * Class SliderCreateDTO
 */
class SliderCreateDTO extends SliderBaseSaveDTO
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
     * @return User
     */
    public function getPublisher(): User
    {
        return $this->publisher;
    }

    /**
     * @param User $publisher
     * @return SliderCreateDTO
     */
    public function setPublisher(User $publisher): SliderCreateDTO
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
     * @return SliderCreateDTO
     */
    public function setParentId(?int $parentId): SliderCreateDTO
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstTitle()
    {
        return $this->firstTitle;
    }

    /**
     * @param mixed $firstTitle
     * @return SliderCreateDTO
     */
    public function setFirstTitle($firstTitle)
    {
        $this->firstTitle = $firstTitle;
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
     * @return SliderCreateDTO
     */
    public function setPublishDate(string $publishDate): SliderCreateDTO
    {
        $this->publishDate = $publishDate;
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
     * @return SliderCreateDTO
     */
    public function setProvinceId(?int $provinceId): SliderCreateDTO
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
     * @return SliderCreateDTO
     */
    public function setLanguage(string $language): SliderCreateDTO
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
     * @return SliderCreateDTO
     */
    public function setStatus(?string $status): SliderCreateDTO
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
     * @return SliderCreateDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): SliderCreateDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

}