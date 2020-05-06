<?php


namespace Domains\Payment\Services\Contracts\DTOs;


use Domains\Donation\Services\Contracts\DTOs\DonationBaseSaveDTO;
use Domains\User\Entities\User;


/**
 * Class NewsCreateDTO
 */
class DonationCreateDTO extends DonationBaseSaveDTO
{
    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string|null $fullName
     * @return DonationCreateDTO
     */
    public function setFullName(?string $fullName): DonationCreateDTO
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return DonationCreateDTO
     */
    public function setPhone(?string $phone): DonationCreateDTO
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNationalCode(): ?int
    {
        return $this->nationalCode;
    }

    /**
     * @param int|null $nationalCode
     * @return DonationCreateDTO
     */
    public function setNationalCode(?int $nationalCode): DonationCreateDTO
    {
        $this->nationalCode = $nationalCode;
        return $this;
    }

    /**
     * @return string |null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string |null $type
     * @return DonationCreateDTO
     */
    public function setType(?string $type): DonationCreateDTO
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param int|null $amount
     * @return DonationCreateDTO
     */
    public function setAmount(?int $amount): DonationCreateDTO
    {
        $this->amount = $amount;
        return $this;
    }

}