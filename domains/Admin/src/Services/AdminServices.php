<?php

namespace Domains\Admin\Services;


use Domains\Admin\Services\Contracts\LoginDTOs\LoginDTO;
use Domains\User\Services\UserService;

class AdminServices
{
    protected $userService;
    protected $loginTransformer;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(LoginDTO $loginDTO): LoginDTO
    {
        return $this->userService->loginWithApi($loginDTO);
    }
}