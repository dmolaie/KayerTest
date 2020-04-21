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
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $cardId;
    /**
     * @var string
     */
    protected $gender;
    /**
     * @var string
     */
    protected $lastName;
    /**
     * @return string
     */
    public function getCardId(): string
    {
        return $this->cardId;
    }

    /**
     * @param string $cardId
     * @return UserLoginDTO
     */
    public function setCardId(string $cardId): UserLoginDTO
    {
        $this->cardId = $cardId;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return UserLoginDTO
     */
    public function setId(int $id): UserLoginDTO
    {
        $this->id = $id;
        return $this;
    }

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

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return UserLoginDTO
     */
    public function setGender(string $gender): UserLoginDTO
    {
        $this->gender = $gender;
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
     * @return UserLoginDTO
     */
    public function setLastName(string $lastName): UserLoginDTO
    {
        $this->lastName = $lastName;
        return $this;
    }

}