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
}