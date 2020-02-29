<?php

namespace Domains\User\Services\Contracts\DTOs;


/**
 * Class UserSearchDTO
 */
class UserSearchDTO
{
    /**
     * @var null|string
     */
    protected $name;
    /**
     * @var null|string
     */
    protected $nationalCode;
    /**
     * @var null|integer
     */
    protected $id;
    /**
     * @var null|integer
     */
    protected $roleId;
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return UserSearchDTO
     */
    public function setName(?string $name): UserSearchDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNationalCode(): ?string
    {
        return $this->nationalCode;
    }

    /**
     * @param string|null $nationalCode
     * @return UserSearchDTO
     */
    public function setNationalCode(?string $nationalCode): UserSearchDTO
    {
        $this->nationalCode = $nationalCode;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return UserSearchDTO
     */
    public function setId(?int $id): UserSearchDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    /**
     * @param int|null $roleId
     * @return UserSearchDTO
     */
    public function setRoleId(?int $roleId): UserSearchDTO
    {
        $this->roleId = $roleId;
        return $this;
    }

}