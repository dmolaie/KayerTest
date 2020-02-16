<?php


namespace Domains\User\Services;

use Illuminate\Support\Facades\Auth;
use Domains\Admin\Services\Contracts\LoginDTOs\LoginDTO;
use Domains\Admin\Services\Contracts\DTOs\AdminLoginDTO;
use Domains\Role\Services\RoleServices;
use Domains\User\Repositories\UserRepository;
use Domains\User\Services\Contracts\DTOs\UserLoginDTO;
use Domains\User\Exceptions\UserUnAuthorizedException;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;

class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var RoleServices
    */
    private $roleServices;

    /**
     * UserService constructor.
     * @param RoleServices $roleServices
     * @param UserRepository $userRepository
     */
    public function __construct(RoleServices $roleServices, UserRepository $userRepository)
    {

        $this->roleServices = $roleServices;
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserLoginDTO $loginDTO
     * @return UserLoginDTO
     * @throws UserUnAuthorizedException
     */
    public function loginWithApi(UserLoginDTO $loginDTO): UserLoginDTO
    {
        if (Auth::attempt(['national_code' => $loginDTO->getNationalCode(), 'password' => $loginDTO->getPassword()])) {
            $user = Auth::getLastAttempted();
            $loginDTO->setToken(Auth::user()->createToken('ehda')->accessToken);
            $loginDTO->setRole(Auth::user()->role);
            return $loginDTO;
        }
        throw new UserUnAuthorizedException(trans('admin::response.authenticate.error_username_password'));
    }

}