<?php


namespace Domains\User\Services;

use Illuminate\Support\Facades\Auth;
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

    /**
     * @param UserRegisterInfoDTO $userRegisterInfoDTO
     * @return UserLoginDTO
     */
    public function register(UserRegisterInfoDTO $userRegisterInfoDTO): UserLoginDTO
    {
        $user = $this->userRepository->createNewUser($userRegisterInfoDTO);
        \auth()->loginUsingId($user->id);
        $userLoginDTO = new UserLoginDTO();
        $userLoginDTO->setNationalCode($userRegisterInfoDTO->getNationalCode())
            ->setRole($user->role)
            ->setToken($user->createToken('ehda')->accessToken)
            ->setName($user->name);
        return $userLoginDTO;
    }
}