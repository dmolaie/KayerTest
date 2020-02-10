<?php

namespace Domains\User\Services\Contracts\DTOs;

/**
 * Class LoginAdminValueObject
 */
class UserLoginDTO
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

    /**
     * @var
     */
    protected $role;
    /**
     * @var string
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserLoginDTO
     */
    public function setName( string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     * @return UserLoginDTO
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
     * @return UserLoginDTO
     */
    public function setToken(string $token): UserLoginDTO
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
     * @return UserLoginDTO
     */
    public function setNationalCode(string $national_code): UserLoginDTO
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
     * @return UserLoginDTO
     */
    public function setPassword(string $password): UserLoginDTO
    {
        $this->password = $password;
        return $this;
    }
}