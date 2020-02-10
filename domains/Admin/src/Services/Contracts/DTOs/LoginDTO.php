<?php

namespace Domains\Admin\Services\Contracts\LoginDTOs;

/**
 * Class LoginAdminValueObject
 */
class LoginDTO
{
    /**
     * @var string
     */
    protected $national_code;
    /**
     * @var string
     */
    protected $password;
    /**
     * @var string
     */
    protected $token;

    protected $role;

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $roleName
     * @return LoginDTO
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return LoginDTO
     */
    public function setToken(string $token): LoginDTO
    {
        $this->token = $token;
        return $this;
    }


    /**
     * @return string
     */
    public function getNationalCode(): string
    {
        return $this->national_code;
    }

    /**
     * @param string $national_code
     * @return LoginDTO
     */
    public function setNationalCode(string $national_code): LoginDTO
    {
        $this->national_code = $national_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return LoginDTO
     */
    public function setPassword(string $password): LoginDTO
    {
        $this->password = $password;
        return $this;
    }
}