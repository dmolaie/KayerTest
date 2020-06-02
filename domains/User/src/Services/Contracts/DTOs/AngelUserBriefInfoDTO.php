<?php

namespace Domains\User\Services\Contracts\DTOs;

use Domains\Location\Services\Contracts\DTOs\CityDTO;
use Domains\Location\Services\Contracts\DTOs\ProvinceDTO;

/**
 * Class UserBriefInfoDTO
 */
class AngelUserBriefInfoDTO
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
    protected $nationalCode;
    /**
     * @var null|int
     */
    protected $yearDeath;

    /**
     * @return int|null
     */
    public function getYearDeath()
    {
        return $this->yearDeath;
    }

    /**
     * @param int|null $yearDeath
     * @return AngelUserBriefInfoDTO
     */
    public function setYearDeath($yearDeath)
    {
        $this->yearDeath = $yearDeath;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     * @return AngelUserBriefInfoDTO
     */
    public function setUuid(?string $uuid): AngelUserBriefInfoDTO
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
     * @return AngelUserBriefInfoDTO
     */
    public function setCardId(string $cardId): AngelUserBriefInfoDTO
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
     * @return AngelUserBriefInfoDTO
     */
    public function setName(string $name): AngelUserBriefInfoDTO
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
     * @return AngelUserBriefInfoDTO
     */
    public function setLastName(string $lastName): AngelUserBriefInfoDTO
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
     * @return AngelUserBriefInfoDTO
     */
    public function setId(int $id): AngelUserBriefInfoDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalCode(): string
    {
        return $this->nationalCode;
    }

    /**
     * @param string $nationalCode
     */
    public function setNationalCode(string $nationalCode): void
    {
        $this->nationalCode = $nationalCode;
    }
}