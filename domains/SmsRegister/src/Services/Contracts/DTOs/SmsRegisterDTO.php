<?php


namespace Domains\SmsRegister\Services\Contracts\DTOs;


/**
 * Class SmsRegisterDTO
 */
class SmsRegisterDTO
{
    /**
     * @var string
     */
    protected $mobileNumber;
    /**
     * @var string
     */
    protected $nationalCode;
    /**
     * @var array
     */
    protected $firstRequestContent;
    /**
     * @var array
     */
    protected $secondRequestContent;
    /**
     * @var string
     */
    protected $birthDate;

    /**
     * @return string
     */
    public function getMobileNumber(): string
    {
        return $this->mobileNumber;
    }

    /**
     * @param string $mobileNumber
     * @return SmsRegisterDTO
     */
    public function setMobileNumber(string $mobileNumber): SmsRegisterDTO
    {
        $this->mobileNumber = $mobileNumber;
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
     * @return SmsRegisterDTO
     */
    public function setNationalCode(string $nationalCode): SmsRegisterDTO
    {
        $this->nationalCode = $nationalCode;
        return $this;
    }

    /**
     * @return array
     */
    public function getFirstRequestContent(): array
    {
        return $this->firstRequestContent;
    }

    /**
     * @param array $firstRequestContent
     * @return SmsRegisterDTO
     */
    public function setFirstRequestContent(array $firstRequestContent): SmsRegisterDTO
    {
        $this->firstRequestContent = $firstRequestContent;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     * @return SmsRegisterDTO
     */
    public function setBirthDate(string $birthDate): SmsRegisterDTO
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return array
     */
    public function getSecondRequestContent(): array
    {
        return $this->secondRequestContent;
    }

    /**
     * @param array $secondRequestContent
     * @return SmsRegisterDTO
     */
    public function setSecondRequestContent(array $secondRequestContent): SmsRegisterDTO
    {
        $this->secondRequestContent = $secondRequestContent;
        return $this;
    }


}