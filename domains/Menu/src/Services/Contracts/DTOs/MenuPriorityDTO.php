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

}