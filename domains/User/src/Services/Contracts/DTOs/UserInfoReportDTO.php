<?php


namespace Domains\User\Services\Contracts\DTOs;


/**
 * Class UserInfoReportDTO
 */
class UserInfoReportDTO
{
    /**
     * @var string
     */
    protected $nationalCode;

    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $dateOfBirth;

    /**
     * @var string
     */
    protected $mobile;

    /**
     * @var null|string
     */
    protected $email;

    /**
     * @return string
     */
    public function getNationalCode(): string
    {
        return $this->nationalCode;
    }

    /**
     * @param string $nationalCode
     * @return UserInfoReportDTO
     */
    public function setNationalCode(string $nationalCode): UserInfoReportDTO
    {
        $this->nationalCode = $nationalCode;
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
     * @return UserInfoReportDTO
     */
    public function setName(string $name): UserInfoReportDTO
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
     * @return UserInfoReportDTO
     */
    public function setLastName(string $lastName): UserInfoReportDTO
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string $dateOfBirth
     * @return UserInfoReportDTO
     */
    public function setDateOfBirth(string $dateOfBirth): UserInfoReportDTO
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobile(): string
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     * @return UserInfoReportDTO
     */
    public function setMobile(string $mobile): UserInfoReportDTO
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return UserInfoReportDTO
     */
    public function setEmail(?string $email): UserInfoReportDTO
    {
        $this->email = $email;
        return $this;
    }

}