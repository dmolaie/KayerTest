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
     * @var array
     */
    protected $thirdRequestContent;
    /**
     * @var string
     */
    protected $birthDate;
    /**
     * @var string
     */
    protected $channelType;
    /**
     * @var string
     */
    protected $content;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $lastName;

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
     * @return null|array
     */
    public function getFirstRequestContent(): ?array
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
    public function getSecondRequestContent(): ?array
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

    /**
     * @return string
     */
    public function getChannelType(): string
    {
        return $this->channelType;
    }

    /**
     * @param string $channelType
     * @return SmsRegisterDTO
     */
    public function setChannelType(string $channelType): SmsRegisterDTO
    {
        $this->channelType = $channelType;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return SmsRegisterDTO
     */
    public function setContent(string $content): SmsRegisterDTO
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return array
     */
    public function getThirdRequestContent(): ?array
    {
        return $this->thirdRequestContent;
    }

    /**
     * @param array $thirdRequestContent
     * @return SmsRegisterDTO
     */
    public function setThirdRequestContent(array $thirdRequestContent): SmsRegisterDTO
    {
        $this->thirdRequestContent = $thirdRequestContent;
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
     * @return SmsRegisterDTO
     */
    public function setName(string $name): SmsRegisterDTO
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
     * @return SmsRegisterDTO
     */
    public function setLastName(string $lastName): SmsRegisterDTO
    {
        $this->lastName = $lastName;
        return $this;
    }


}