<?php


namespace Domains\User\Services\Contracts\DTOs;


/**
 * Class UserRegisterInfoDTO
 */
class ValidationDataUserDTO
{
    /**
     * @var string
     */
    protected $nationalCode;
    /**
     * @var integer
     */
    protected $roleId;
    /**
     * @var string
     */
    protected $roleType;
    /**
     * @return string
     */
    public function getNationalCode(): string
    {
        return $this->nationalCode;
    }

    /**
     * @param string $nationalCode
     * @return ValidationDataUserDTO
     */
    public function setNationalCode(string $nationalCode): ValidationDataUserDTO
    {
        $this->nationalCode = $nationalCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @param int $roleId
     * @return ValidationDataUserDTO
     */
    public function setRoleId(int $roleId): ValidationDataUserDTO
    {
        $this->roleId = $roleId;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoleType(): string
    {
        return $this->roleType;
    }

    /**
     * @param string $roleType
     * @return ValidationDataUserDTO
     */
    public function setRoleType(string $roleType): ValidationDataUserDTO
    {
        $this->roleType = $roleType;
        return $this;
    }

}