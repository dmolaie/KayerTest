<?php


namespace Domains\Article\Services\Contracts\DTOs;


use Domains\User\Entities\User;


/**
 * Class ArticleEditDTO
 */
class ArticleEditDTO extends ArticleBaseSaveDTO
{
    /**
     * @var integer
     */
    protected $articleId;
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
     * @return ArticleEditDTO
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
     * @return ArticleEditDTO
     */
    public function setSecondTitle(?string $secondTitle): ArticleEditDTO
    {
        $this->secondTitle = $secondTitle;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getThirdTitle(): ?string
    {
        return $this->ThirdTitle;
    }

    /**
     * @param string|null $thirdTitle
     * @return ArticleEditDTO
     */
    public function setThirdTitle(?string $thirdTitle): ArticleEditDTO
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
     * @return ArticleEditDTO
     */
    public function setAbstract(?string $abstract): ArticleEditDTO
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
     * @return ArticleEditDTO
     */
    public function setDescription(?string $description): ArticleEditDTO
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
     * @return ArticleEditDTO
     */
    public function setCategories(?array $categories): ArticleEditDTO
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCategoryIsMain(): ?int
    {
        return $this->categoryIsMain;
    }

    /**
     * @param int|null $categoryIsMain
     * @return ArticleEditDTO
     */
    public function setCategoryIsMain(?int $categoryIsMain): ArticleEditDTO
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
     * @return ArticleEditDTO
     */
    public function setPublishDate(string $publishDate): ArticleEditDTO
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
     * @return ArticleEditDTO
     */
    public function setSlug(?string $slug): ArticleEditDTO
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
     * @return ArticleEditDTO
     */
    public function setProvinceId(?int $provinceId): ArticleEditDTO
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
     * @return ArticleEditDTO
     */
    public function setLanguage(string $language): ArticleEditDTO
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
     * @return ArticleEditDTO
     */
    public function setStatus(?string $status): ArticleEditDTO
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
     * @return ArticleEditDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): ArticleEditDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->articleId;
    }

    /**
     * @param int $articleId
     * @return ArticleEditDTO
     */
    public function setArticleId(int $articleId): ArticleEditDTO
    {
        $this->articleId = $articleId;
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
     * @return ArticleEditDTO
     */
    public function setEditor(User $editor): ArticleEditDTO
    {
        $this->editor = $editor;
        return $this;
    }

}