<?php

namespace Domains\User\Services\Contracts\DTOs;

use Domains\Location\Services\Contracts\DTOs\CityDTO;
use Domains\Location\Services\Contracts\DTOs\ProvinceDTO;

/**
 * Class UserBriefInfoDTO
 */
class UserBriefInfoDTO
{
    /**
     * @var string
     */
    protected $cardId;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $lastName;
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $createdAt;
    /**
     * @var null|string
     */
    protected $identityNumber;
    /**
     * @var array
     */
    protected $roles;
    /**
     * @var int
     */
    protected $nationalCode;
    /**
     * @var array
     */
    protected $currentCity;
    /**
     * @var array
     */
    protected $currentProvince;

    /**
     * @return string
     */
    public function getCardId(): string
    {
        return $this->cardId;
    }

    /**
     * @param string $cardId
     * @return UserBriefInfoDTO
     */
    public function setCardId(string $cardId): UserBriefInfoDTO
    {
        $this->cardId = $cardId;
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
     * @return UserBriefInfoDTO
     */
    public function setName(string $name): UserBriefInfoDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return UserBriefInfoDTO
     */
    public function setLastName(string $lastName): UserBriefInfoDTO
    {
        $this->lastName = $lastName;
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
     * @return UserBriefInfoDTO
     */
    public function setId(int $id): UserBriefInfoDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return UserBriefInfoDTO
     */
    public function setCreatedAt(string $createdAt): UserBriefInfoDTO
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIdentityNumber(): ?string
    {
        return $this->identityNumber;
    }

    /**
     * @param string|null $identityNumber
     * @return UserBriefInfoDTO
     */
    public function setIdentityNumber(?string $identityNumber): UserBriefInfoDTO
    {
        $this->identityNumber = $identityNumber;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     * @return UserBriefInfoDTO
     */
    public function setRoles(array $roles): UserBriefInfoDTO
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @return int
     */
    public function getNationalCode(): int
    {
        return $this->nationalCode;
    }

    /**
     * @param int $nationalCode
     * @return UserBriefInfoDTO
     */
    public function setNationalCode(int $nationalCode): UserBriefInfoDTO
    {
        $this->nationalCode = $nationalCode;
        return $this;
    }

    /**
     * @return array
     */
    public function getCurrentCity(): array
    {
        return $this->currentCity;
    }

    /**
     * @param array $currentCity
     * @return UserBriefInfoDTO
     */
    public function setCurrentCity(array $currentCity): UserBriefInfoDTO
    {
        $this->currentCity = $currentCity;
        return $this;
    }

    /**
     * @return array
     */
    public function getCurrentProvince(): array
    {
        return $this->currentProvince;
    }

    /**
     * @param array $currentProvince
     * @return UserBriefInfoDTO
     */
    public function setCurrentProvince(array $currentProvince): UserBriefInfoDTO
    {
        $this->currentProvince = $currentProvince;
        return $this;
    }


}