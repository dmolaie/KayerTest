<?php


namespace Domains\Role\Services\Contracts\DTOs;


/**
 * Class RoleInfoDTO
 */
class RoleInfoDTO
{
    /**
     * @var integer
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $label;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var null|array
     */
    protected $province;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return RoleInfoDTO
     */
    public function setId(int $id): RoleInfoDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return RoleInfoDTO
     */
    public function setName(string $name): RoleInfoDTO
    {
        $this->name = $name;
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
     * @return RoleInfoDTO
     */
    public function setLabel(string $label): RoleInfoDTO
    {
        $this->label = $label;
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
     * @return RoleInfoDTO
     */
    public function setType(string $type): RoleInfoDTO
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return null|array
     */
    public function getProvince(): ?array
    {
        return $this->province;
    }

    /**
     * @param null|array $province
     * @return RoleInfoDTO
     */
    public function setProvince(?array $province): RoleInfoDTO
    {
        $this->province = $province;
        return $this;
    }

}