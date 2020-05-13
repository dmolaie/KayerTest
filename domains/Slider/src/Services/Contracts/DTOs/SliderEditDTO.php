<?php


namespace Domains\Slider\Services\Contracts\DTOs;


use Domains\User\Entities\User;


/**
 * Class SliderEditDTO
 */
class SliderEditDTO extends SliderBaseSaveDTO
{
    /**
     * @var integer
     */
    protected $sliderId;
    /**
     * @var User
     */
    protected $editor;

    /**
     * @return int
     */
    public function getSliderId(): int
    {
        return $this->sliderId;
    }

    /**
     * @param int $sliderId
     * @return SliderEditDTO
     */
    public function setSliderId(int $sliderId): SliderEditDTO
    {
        $this->sliderId = $sliderId;
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
     * @return SliderEditDTO
     */
    public function setEditor(User $editor): SliderEditDTO
    {
        $this->editor = $editor;
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
     * @return SliderEditDTO
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
     * @return SliderEditDTO
     */
    public function setPublishDate(string $publishDate): SliderEditDTO
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
     * @return SliderEditDTO
     */
    public function setProvinceId(?int $provinceId): SliderEditDTO
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
     * @return SliderEditDTO
     */
    public function setLanguage(string $language): SliderEditDTO
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
     * @return SliderEditDTO
     */
    public function setStatus(?string $status): SliderEditDTO
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
     * @return SliderEditDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): SliderEditDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

}