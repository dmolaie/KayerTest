<?php

namespace Domains\Admin\Services;


use Domains\User\Services\Contracts\DTOs\UserLoginDTO;
use Domains\User\Services\UserService;

class AdminServices
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login($request,UserLoginDTO $loginDTO): UserLoginDTO
    {
        return $this->userService->loginWithApi($request,$loginDTO);
    }
}