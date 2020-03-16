<?php


namespace Domains\Menu\Services\Contracts\DTOs;

use Domains\User\Entities\User;
use Menu;

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
    protected $parent;

    /**
     * @var null|array
     */
    protected $child;


    /**
     * @var null|string
     */
    protected $link;

    /**
     * @var null|User
     */
    protected $editor;

    /**
     * @var boolean
     */
    protected $active;

    /**
     * @var int
     */
    protected $priority;
    /**
     * @var int|null
     */
    protected $menuableId;
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
     * @return object
     */
    public function getParent(): ?object
    {
        return $this->parent;
    }

    /**
     * @param object|null $parent
     * @return MenusInfoDTO
     */
    public function setParent(?object $parent): MenusInfoDTO
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getChild():array
    {
        return $this->child;
    }

    /**
     * @param array|null $child
     * @return MenusInfoDTO
     */
    public function setChild( $child): MenusInfoDTO
    {
        $this->child = $child;
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

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return MenusInfoDTO
     */
    public function setActive(bool $active): MenusInfoDTO
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     * @return MenusInfoDTO
     */
    public function setPriority(int $priority): MenusInfoDTO
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMenuableId(): ?int
    {
        return $this->menuableId;
    }

    /**
     * @param int|null $menuableId
     * @return MenusInfoDTO
     */
    public function setMenuableId(?int $menuableId): MenusInfoDTO
    {
        $this->menuableId = $menuableId;
        return $this;
    }

}