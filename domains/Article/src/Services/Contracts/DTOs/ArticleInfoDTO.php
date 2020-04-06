<?php


namespace Domains\Article\Services\Contracts\DTOs;


use Domains\Category\Entities\Category;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;

/**
 * Class ArticleInfoDTO
 */
class ArticleInfoDTO
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
    protected $thirdTitle;
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
    protected $categories;
    /**
     * @var string
     */
    protected $publishDate;
    /**
     * @var null|string
     */
    protected $slug;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var null|Province
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
    protected $relationArticleId;
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
    protected $uuid;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ArticleInfoDTO
     */
    public function setId(int $id): ArticleInfoDTO
    {
        $this->id = $id;
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
     * @return ArticleInfoDTO
     */
    public function setFirstTitle(string $firstTitle): ArticleInfoDTO
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
     * @return ArticleInfoDTO
     */
    public function setSecondTitle(?string $secondTitle): ArticleInfoDTO
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
     * @return ArticleInfoDTO
     */
    public function setThirdTitle(?string $thirdTitle): ArticleInfoDTO
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
     * @return ArticleInfoDTO
     */
    public function setAbstract(?string $abstract): ArticleInfoDTO
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
     * @return ArticleInfoDTO
     */
    public function setDescription(?string $description): ArticleInfoDTO
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
     * @return ArticleInfoDTO
     */
    public function setCategories(?array $categories): ArticleInfoDTO
    {
        $this->categories = $categories;
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
     * @return ArticleInfoDTO
     */
    public function setPublishDate(string $publishDate): ArticleInfoDTO
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
     * @return ArticleInfoDTO
     */
    public function setSlug(?string $slug): ArticleInfoDTO
    {
        $this->slug = $slug;
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
     * @return ArticleInfoDTO
     */
    public function setStatus(string $status): ArticleInfoDTO
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return null|Province
     */
    public function getProvince(): ?Province
    {
        return $this->province;
    }

    /**
     * @param null|Province $province
     * @return ArticleInfoDTO
     */
    public function setProvince(?Province $province): ArticleInfoDTO
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
     * @return ArticleInfoDTO
     */
    public function setPublisher(User $publisher): ArticleInfoDTO
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
     * @return ArticleInfoDTO
     */
    public function setLanguage(string $language): ArticleInfoDTO
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRelationArticleId(): ?int
    {
        return $this->relationArticleId;
    }

    /**
     * @param int|null $relationArticleId
     * @return ArticleInfoDTO
     */
    public function setRelationArticleId(?int $relationArticleId): ArticleInfoDTO
    {
        $this->relationArticleId = $relationArticleId;
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
     * @return ArticleInfoDTO
     */
    public function setAttachmentFiles(?array $attachmentFiles): ArticleInfoDTO
    {
        $this->attachmentFiles = $attachmentFiles;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getEditor(): ?User
    {
        return $this->editor;
    }

    /**
     * @param User|null $editor
     * @return ArticleInfoDTO
     */
    public function setEditor(?User $editor): ArticleInfoDTO
    {
        $this->editor = $editor;
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
     * @return ArticleInfoDTO
     */
    public function setUuid(string $uuid): ArticleInfoDTO
    {
        $this->uuid = $uuid;
        return $this;
    }

}