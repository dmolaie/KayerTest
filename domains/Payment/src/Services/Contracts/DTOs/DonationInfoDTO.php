<?php

namespace Domains\Payment\Services\Contracts\DTOs;


class DonationInfoDTO
{
    /**
     * @var null|string
     */
    protected $fullName;

    /**
     * @var null|string
     */
    protected $phone;
    /**
     * @var null|integer
     */
    protected $nationalCode;
    /**
     * @var null|integer
     */
    protected $type;
    /**
     * @var null|integer
     */
    protected $amount;

    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * @param string|null $fullName
     * @return DonationInfoDTO
     */
    public function setFullName(?string $fullName): DonationInfoDTO
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
     * @return DonationInfoDTO
     */
    public function setPhone(?string $phone): DonationInfoDTO
    {
        $this->phone = $phone;
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
     * @return DonationInfoDTO
     */
    public function setNationalCode(?string $nationalCode): DonationInfoDTO
    {
        $this->nationalCode = $nationalCode;
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
     * @param string|null $type
     * @return DonationInfoDTO
     */
    public function setType(?string $type): DonationInfoDTO
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
     * @return DonationInfoDTO
     */
    public function setAmount(?int $amount): DonationInfoDTO
    {
        $this->amount = $amount;
        return $this;
    }

}