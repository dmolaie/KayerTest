<?php


namespace Domains\Menus\Services\Contracts\DTOs;

use Domains\Category\Entities\Category;
use Domains\Location\Entities\Province;
use Domains\User\Entities\User;

/**
 * Class MenusInfoDTO
 */
class MenusInfoDTO
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var null|string
     */
    protected $title;

    /**
     * @var null|string
     */
    protected $name;

    /**
     * @var null|string
     */
    protected $alias;

    /**
     * @var null|string
     */
    protected $type;

    /**
     * @var null|string
     */
    protected $language;

    /**
     * @var null|string
     */
    protected $publishDate;

    /**
     * @var null|integer
     */
    protected $editorId;

    /**
     * @var null|integer
     */
    protected $publisher;

    /**
     * @var null|integer
     */
    protected $parentId;

    /**
     * @var null|string
     */
    protected $link;

    /**
     * @var null|User
     */
    protected $editor;

    /**
     * @return User|null
     */
    public function getEditor(): ?User
    {
        return $this->editor;
    }

    /**
     * @param User|null $editor
     * @return MenusInfoDTO
     */
    public function setEditor(?User $editor): MenusInfoDTO
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
     * @return MenusInfoDTO
     */
    public function setId(int $id): MenusInfoDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return MenusInfoDTO
     */
    public function setTitle(?string $title): MenusInfoDTO
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return MenusInfoDTO
     */
    public function setName(?string $name): MenusInfoDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAlias(): ?string
    {
        return $this->alias;
    }

    /**
     * @param string|null $alias
     * @return MenusInfoDTO
     */
    public function setAlias(?string $alias): MenusInfoDTO
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return MenusInfoDTO
     */
    public function setType(?string $type): MenusInfoDTO
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     * @return MenusInfoDTO
     */
    public function setLanguage(?string $language): MenusInfoDTO
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPublishDate(): ?string
    {
        return $this->publishDate;
    }

    /**
     * @param string|null $publishDate
     * @return MenusInfoDTO
     */
    public function setPublishDate(?string $publishDate): MenusInfoDTO
    {
        $this->publishDate = $publishDate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getEditorId(): ?int
    {
        return $this->editorId;
    }

    /**
     * @param int|null $editorId
     * @return MenusInfoDTO
     */
    public function setEditorId(?int $editorId): MenusInfoDTO
    {
        $this->editorId = $editorId;
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
     * @return MenusInfoDTO
     */
    public function setPublisher(User $publisher): MenusInfoDTO
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentid;
    }

    /**
     * @param int|null $parentId
     * @return MenusInfoDTO
     */
    public function setParentId(?int $parentId): MenusInfoDTO
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @param string|null $link
     * @return MenusInfoDTO
     */
    public function setLink(?string $link): MenusInfoDTO
    {
        $this->link = $link;
        return $this;
    }

}