<?php


namespace Domains\NationalAuthentication\Services\Contracts\DTOs;

/**
 * Class NationalAuthenticationRequestDTO
 */
class NationalAuthenticationRequestDTO
{
    /**
     * @var string
     */
    protected $birthDate;
    /**
     * @var string
     */
    protected $nationalCode;
    /**
     * @var string
     */
    protected $mobileNumber;

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     * @return NationalAuthenticationRequestDTO
     */
    public function setBirthDate(string $birthDate): NationalAuthenticationRequestDTO
    {
        $this->birthDate = $birthDate;
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
     * @return NationalAuthenticationRequestDTO
     */
    public function setNationalCode(string $nationalCode): NationalAuthenticationRequestDTO
    {
        $this->nationalCode = $nationalCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobileNumber(): string
    {
        return $this->mobileNumber;
    }

    /**
     * @param string $mobileNumber
     * @return NationalAuthenticationRequestDTO
     */
    public function setMobileNumber(string $mobileNumber): NationalAuthenticationRequestDTO
    {
        $this->mobileNumber = $mobileNumber;
        return $this;
    }


}