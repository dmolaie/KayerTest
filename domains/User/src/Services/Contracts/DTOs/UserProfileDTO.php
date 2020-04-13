<?php


namespace Domains\User\Services\Contracts\DTOs;


class UserProfileDTO
{
    /**
     * @var boolean
     */
    protected $isLogin = false;
    /**
     * @var string|null
     */
    protected $userName;
    /**
     * @var array|null
     */
    protected $roles;

    /**
     * @return bool
     */
    public function isLogin(): bool
    {
        return $this->isLogin;
    }

    /**
     * @param bool $isLogin
     * @return UserProfileDTO
     */
    public function setIsLogin(bool $isLogin): UserProfileDTO
    {
        $this->isLogin = $isLogin;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->userName;
    }

    /**
     * @param string|null $userName
     * @return UserProfileDTO
     */
    public function setUserName(?string $userName): UserProfileDTO
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param array|null $roles
     * @return UserProfileDTO
     */
    public function setRoles(?array $roles): UserProfileDTO
    {
        $this->roles = $roles;
        return $this;
    }

    public function addRole($roleName)
    {
        $this->roles[] = $roleName;
        return $this;
    }

}