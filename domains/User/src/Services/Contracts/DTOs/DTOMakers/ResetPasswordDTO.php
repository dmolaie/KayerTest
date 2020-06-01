<?php


namespace Domains\User\Services\Contracts\DTOs\DTOMakers;


/**
 * Class ResetPasswordDTO
 */
class ResetPasswordDTO
{
    /**
     * @var string
     */
    protected $password;
    /**
     * @var integer
     */
    protected $token;
    /**
     * @var string
     */
    protected $nationalCode;
    /**
     * @var string
     */
    protected $mobile;

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return ResetPasswordDTO
     */
    public function setPassword(string $password): ResetPasswordDTO
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return int
     */
    public function getToken(): int
    {
        return $this->token;
    }

    /**
     * @param int $token
     * @return ResetPasswordDTO
     */
    public function setToken(int $token): ResetPasswordDTO
    {
        $this->token = $token;
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
     * @return ResetPasswordDTO
     */
    public function setNationalCode(string $nationalCode): ResetPasswordDTO
    {
        $this->nationalCode = $nationalCode;
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
     * @return ResetPasswordDTO
     */
    public function setMobile(string $mobile): ResetPasswordDTO
    {
        $this->mobile = $mobile;
        return $this;
    }

}