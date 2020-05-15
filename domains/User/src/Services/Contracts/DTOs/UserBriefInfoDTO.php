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
     * @var null|string
     */
    protected $identityNumber;
    /**
     * @var array
     */
    protected $roles;
    /**
     * @var string
     */
    protected $nationalCode;
    /**
     * @var array|null
     */
    protected $currentCity;
    /**
     * @var array|null
     */
    protected $currentProvince;
    /**
     * @var string|null
     */
    protected $jobTitle;
    /**
     * @var null|string
     */
    protected $createdAt;
    /**
     * @var null|string
     */
    protected $updatedAt;
    /**
     * @var null|array
     */
    protected $createdBy;
    /**
     * @var null|string
     */
    protected $uuid;

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     * @return UserBriefInfoDTO
     */
    public function setUuid(?string $uuid): UserBriefInfoDTO
    {
        $this->uuid = $uuid;
        return $this;
    }

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
     * @return null|string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param null|string $createdAt
     * @return UserBriefInfoDTO
     */
    public function setCreatedAt(?string $createdAt): UserBriefInfoDTO
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
    public function getNationalCode(): string
    {
        return $this->nationalCode;
    }

    /**
     * @param string $nationalCode
     * @return UserBriefInfoDTO
     */
    public function setNationalCode(string $nationalCode): UserBriefInfoDTO
    {
        $this->nationalCode = $nationalCode;
        return $this;
    }

    /**
     * @return array
     */
    public function getCurrentCity(): ?array
    {
        return $this->currentCity;
    }

    /**
     * @param array $currentCity
     * @return UserBriefInfoDTO
     */
    public function setCurrentCity(?array $currentCity): UserBriefInfoDTO
    {
        $this->currentCity = $currentCity;
        return $this;
    }

    /**
     * @return array
     */
    public function getCurrentProvince(): ?array
    {
        return $this->currentProvince;
    }

    /**
     * @param array $currentProvince
     * @return UserBriefInfoDTO
     */
    public function setCurrentProvince(?array $currentProvince): UserBriefInfoDTO
    {
        $this->currentProvince = $currentProvince;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    /**
     * @param string|null $jobTitle
     * @return UserBriefInfoDTO
     */
    public function setJobTitle(?string $jobTitle): UserBriefInfoDTO
    {
        $this->jobTitle = $jobTitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param null|string $updatedAt
     * @return UserBriefInfoDTO
     */
    public function setUpdatedAt(?string $updatedAt): UserBriefInfoDTO
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCreatedBy(): ?array
    {
        return $this->createdBy;
    }

    /**
     * @param array|null $createdBy
     * @return UserBriefInfoDTO
     */
    public function setCreatedBy(?array $createdBy): UserBriefInfoDTO
    {
        $this->createdBy = $createdBy;
        return $this;
    }


}