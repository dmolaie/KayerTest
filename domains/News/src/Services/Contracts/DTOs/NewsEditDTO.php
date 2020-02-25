<?php


namespace Domains\News\Services\Contracts\DTOs;


use Domains\User\Entities\User;


/**
 * Class NewsEditDTO
 */
class NewsEditDTO extends NewsBaseSaveDTO
{
    /**
     * @var integer
     */
    protected $newsId;
    /**
     * @var User
     */
    protected $editor;

    /**
     * @return mixed
     */
    public function getFirstTitle()
    {
        return $this->firstTitle;
    }

    /**
     * @param mixed $firstTitle
     * @return NewsEditDTO
     */
    public function setFirstTitle($firstTitle)
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
     * @return NewsEditDTO
     */
    public function setSecondTitle(?string $secondTitle): NewsEditDTO
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
     * @return NewsEditDTO
     */
    public function setAbstract(?string $abstract): NewsEditDTO
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
     * @return NewsEditDTO
     */
    public function setDescription(?string $description): NewsEditDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCategoryId(): ?array
    {
        return $this->categoryId;
    }

    /**
     * @param int|null $categoryId
     * @return NewsEditDTO
     */
    public function setCategoryId(?array $categoryId): NewsEditDTO
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
     * @return NewsEditDTO
     */
    public function setCategoryIsMain($categoryIsMain): NewsEditDTO
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
     * @return NewsEditDTO
     */
    public function setPublishDate(string $publishDate): NewsEditDTO
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
     * @return NewsEditDTO
     */
    public function setSourceLink(?string $sourceLink): NewsEditDTO
    {
        $this->sourceLink = $sourceLink;
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
     * @return NewsEditDTO
     */
    public function setProvinceId(?int $provinceId): NewsEditDTO
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
     * @return NewsEditDTO
     */
    public function setLanguage(string $language): NewsEditDTO
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
     * @return NewsEditDTO
     */
    public function setStatus(?string $status): NewsEditDTO
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
     * @return NewsEditDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): NewsEditDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

    /**
     * @return int
     */
    public function getNewsId(): int
    {
        return $this->newsId;
    }

    /**
     * @param int $newsId
     * @return NewsEditDTO
     */
    public function setNewsId(int $newsId): NewsEditDTO
    {
        $this->newsId = $newsId;
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
     * @return NewsEditDTO
     */
    public function setEditor(User $editor): NewsEditDTO
    {
        $this->editor = $editor;
        return $this;
    }


}