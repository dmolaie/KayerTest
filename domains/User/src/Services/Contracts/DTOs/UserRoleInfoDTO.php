<?php


namespace Domains\User\Services\Contracts\DTOs;


/**
 * Class UserRoleInfoDTO
 */
class UserRoleInfoDTO
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var integer
     */
    protected $id;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var string
     */
    protected $label;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserRoleInfoDTO
     */
    public function setName(string $name): UserRoleInfoDTO
    {
        $this->name = $name;
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
     * @return UserRoleInfoDTO
     */
    public function setId(int $id): UserRoleInfoDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return UserRoleInfoDTO
     */
    public function setType(string $type): UserRoleInfoDTO
    {
        $this->type = $type;
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
     * @return UserRoleInfoDTO
     */
    public function setStatus(string $status): UserRoleInfoDTO
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return UserRoleInfoDTO
     */
    public function setLabel(string $label): UserRoleInfoDTO
    {
        $this->label = $label;
        return $this;
    }

}