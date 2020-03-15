<?php


namespace Domains\Menu\Services\Contracts\DTOs;


/**
 * Class MenuPriorityDTO
 */
class MenuPriorityDTO
{
    /**
     * @var integer
     */
    protected $id;
    /**
     * @var integer
     */
    protected $priority;
    /**
     * @var integer|null
     */
    protected $parentId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return MenuPriorityDTO
     */
    public function setId(int $id): MenuPriorityDTO
    {
        $this->id = $id;
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
     * @return MenuPriorityDTO
     */
    public function setPriority(int $priority): MenuPriorityDTO
    {
        $this->priority = $priority;
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
     * @return MenuPriorityDTO
     */
    public function setParentId(?int $parentId): MenuPriorityDTO
    {
        $this->parentId = $parentId;
        return $this;
    }

}