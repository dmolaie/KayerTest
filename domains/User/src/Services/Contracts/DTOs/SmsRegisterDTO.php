<?php


namespace Domains\User\Services\Contracts\DTOs;


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
    protected $requestContent;
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
    public function getRequestContent(): array
    {
        return $this->requestContent;
    }

    /**
     * @param array $requestContent
     * @return SmsRegisterDTO
     */
    public function setRequestContent(array $requestContent): SmsRegisterDTO
    {
        $this->requestContent = $requestContent;
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


}