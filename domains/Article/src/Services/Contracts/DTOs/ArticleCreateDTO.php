<?php


namespace Domains\Article\Services\Contracts\DTOs;

use Domains\User\Entities\User;


/**
 * Class ArticleCreateDTO
 */
class ArticleCreateDTO extends ArticleBaseSaveDTO
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
    public function getFirstTitle()
    {
        return $this->firstTitle;
    }

    /**
     * @param mixed $firstTitle
     * @return ArticleCreateDTO
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
     * @return ArticleCreateDTO
     */
    public function setSecondTitle(?string $secondTitle): ArticleCreateDTO
    {
        $this->secondTitle = $secondTitle;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getThirdTitle(): ?string
    {
        return $this->thirdTitle;
    }

    /**
     * @param string|null $thirdTitle
     * @return ArticleCreateDTO
     */
    public function setThirdTitle(?string $thirdTitle): ArticleCreateDTO
    {
        $this->thirdTitle = $thirdTitle;
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
     * @return ArticleCreateDTO
     */
    public function setAbstract(?string $abstract): ArticleCreateDTO
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
     * @return ArticleCreateDTO
     */
    public function setDescription(?string $description): ArticleCreateDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCategories(): ?array
    {
        return $this->categories;
    }

    /**
     * @param array|null $categories
     * @return ArticleCreateDTO
     */
    public function setCategories(?array $categories): ArticleCreateDTO
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCategoryIsMain(): ?array
    {
        return $this->categoryIsMain;
    }

    /**
     * @param array|null $categoryIsMain
     * @return ArticleCreateDTO
     */
    public function setCategoryIsMain(?array $categoryIsMain): ArticleCreateDTO
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
     * @return ArticleCreateDTO
     */
    public function setPublishDate(string $publishDate): ArticleCreateDTO
    {
        $this->publishDate = $publishDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     * @return ArticleCreateDTO
     */
    public function setSlug(?string $slug): ArticleCreateDTO
    {
        $this->slug = $slug;
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
     * @return ArticleCreateDTO
     */
    public function setProvinceId(?int $provinceId): ArticleCreateDTO
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
     * @return ArticleCreateDTO
     */
    public function setLanguage(string $language): ArticleCreateDTO
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
     * @return ArticleCreateDTO
     */
    public function setStatus(?string $status): ArticleCreateDTO
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
     * @return ArticleCreateDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): ArticleCreateDTO
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
     * @return ArticleCreateDTO
     */
    public function setPublisher(User $publisher): ArticleCreateDTO
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
     * @return ArticleCreateDTO
     */
    public function setParentId(?int $parentId): ArticleCreateDTO
    {
        $this->parentId = $parentId;
        return $this;
    }

}