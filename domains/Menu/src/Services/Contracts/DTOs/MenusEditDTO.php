<?php


namespace Domains\Menu\Services\Contracts\DTOs;


use Domains\Menu\Entities\Menus;
use Domains\User\Entities\User;
use phpDocumentor\Reflection\Types\Boolean;


/**
 * Class NewsCreateDTO
 */
class MenusEditDTO extends MenusBaseSaveDTO
{
    /**
     * @var User
     */
    protected $publisher;

   /**
     * @var User
     */
    protected $editor;

    /**
     * @var null|Menus
     */
    protected $parentId;

    /**
     * @var null|int
     */
    protected $menuId;

    /**
     * @var null|boolean
     */
    protected $active;

    /**
     * @return Menus|null
     */
    public function getMenuId(): ?int
    {
        return $this->menuId;
    }

    /**
     * @param int|null $menuId
     * @return MenusEditDTO
     */
    public function setMenuId(?int $menuId): MenusEditDTO
    {
        $this->menuId = $menuId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return MenusEditDTO
     */
    public function setTitle($title)
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
     * @return MenusEditDTO
     */
    public function setName(?string $name): MenusEditDTO
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
     * @return MenusEditDTO
     */
    public function setAlias(?string $alias): MenusEditDTO
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
     * @return MenusEditDTO
     */
    public function setType(?string $type): MenusEditDTO
    {
        $this->type = $type;
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
     * @param array|null $link
     * @return MenusEditDTO
     */
    public function setLink(?array $link): MenusEditDTO
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     * @return MenusEditDTO
     */
    public function setLanguage(?string $language): MenusEditDTO
    {
        $this->language = $language;
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
     * @return MenusEditDTO
     */
    public function setPublishDate(string $publishDate): MenusEditDTO
    {
        $this->publishDate = $publishDate;
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
     * @param User $editor
     * @return MenusEditDTO
     */
    public function setPublisher(User $editor): MenusEditDTO
    {
        $this->publisher = $editor;
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
     * @return MenusEditDTO
     */
    public function setEditor(User $editor): MenusEditDTO
    {
        $this->editor = $editor;
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
     * @return MenusEditDTO
     */
    public function setParentId(?int $parentId): MenusEditDTO
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getManuableId(): ?int
    {
        return $this->categoryId;
    }

    /**
     * @param int|null $categoryId
     * @return MenusEditDTO
     */
    public function setManuableId(?int $categoryId): MenusEditDTO
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * @param int|null $priority
     * @return MenusEditDTO
     */
    public function setPriority(?int $priority): MenusEditDTO
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return boolean|null
     */
    public function getActive(): ?Boolean
    {
        return $this->active;
    }

    /**
     * @param boolean|null $active
     * @return MenusEditDTO
     */
    public function setActive(?boolean $active): MenusEditDTO
    {
        $this->active = $active;
        return $this;
    }

}