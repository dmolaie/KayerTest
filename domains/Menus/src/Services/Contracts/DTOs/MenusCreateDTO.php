<?php


namespace Domains\Menus\Services\Contracts\DTOs;


use Domains\Menus\Entities\Menus;
use Domains\User\Entities\User;


/**
 * Class NewsCreateDTO
 */
class MenusCreateDTO extends MenusBaseSaveDTO
{
    /**
     * @var User
     */
    protected $publisher;

    /**
     * @var null|Menus
     */
    protected $parentId;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return MenusCreateDTO
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
     * @return MenusCreateDTO
     */
    public function setName(?string $name): MenusCreateDTO
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
     * @return MenusCreateDTO
     */
    public function setAlias(?string $alias): MenusCreateDTO
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
     * @param array|null $type
     * @return MenusCreateDTO
     */
    public function setType(?array $type): MenusCreateDTO
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
     * @return MenusCreateDTO
     */
    public function setLink(?array $link): MenusCreateDTO
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLanguage(): int
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     * @return MenusCreateDTO
     */
    public function setLanguage($language): MenusCreateDTO
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
     * @return MenusCreateDTO
     */
    public function setPublishDate(string $publishDate): MenusCreateDTO
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
     * @param User $publisher
     * @return MenusCreateDTO
     */
    public function setPublisher(User $publisher): MenusCreateDTO
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
     * @return MenusCreateDTO
     */
    public function setParentId(?int $parentId): MenusCreateDTO
    {
        $this->parentId = $parentId;
        return $this;
    }



}