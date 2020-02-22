<?php


namespace Domains\User\Services;

use Domains\Role\Services\RoleServices;
use Domains\User\Exceptions\UserDoseNotHaveActiveRole;
use Domains\User\Exceptions\UserUnAuthorizedException;
use Domains\User\Repositories\UserRepository;
use Domains\User\Services\Contracts\DTOs\UserLoginDTO;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;
use Illuminate\Support\Facades\Auth;

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
     * @var UserRoleService
     */
    private $userRoleService;

    /**
     * UserService constructor.
     * @param RoleServices $roleServices
     * @param UserRepository $userRepository
     * @param UserRoleService $userRoleService
     */
    public function __construct(
        RoleServices $roleServices,
        UserRepository $userRepository,
        UserRoleService $userRoleService
    ) {

        $this->roleServices = $roleServices;
        $this->userRepository = $userRepository;
        $this->userRoleService = $userRoleService;
    }

    /**
     * @param UserLoginDTO $loginDTO
     * @return UserLoginDTO
     * @throws UserUnAuthorizedException
     * @throws UserDoseNotHaveActiveRole
     */
    public function loginWithApi(UserLoginDTO $loginDTO): UserLoginDTO
    {
        if (Auth::attempt(['national_code' => $loginDTO->getNationalCode(), 'password' => $loginDTO->getPassword()])) {
            $user = Auth::getLastAttempted();
            $userRoles =$this->userRoleService->getUserActiveRoles(Auth::user()->id);
            if(!$userRoles){
                throw new UserDoseNotHaveActiveRole(trans('user::response.user_dose_not_have_active_role'));
            }
            $loginDTO->setToken(Auth::user()->createToken('ehda')->accessToken);
            $loginDTO->setRole($userRoles[0]);
            return $loginDTO;
        }
        throw new UserUnAuthorizedException(trans('admin::response.authenticate.error_username_password'));
    }

    /**
     * @param UserRegisterInfoDTO $userRegisterInfoDTO
     * @return UserLoginDTO
     * @throws UserDoseNotHaveActiveRole
     */
    public function register(UserRegisterInfoDTO $userRegisterInfoDTO): UserLoginDTO
    {
        $user = $this->userRepository->createNewUser($userRegisterInfoDTO);
        $userRoles = $this->userRoleService->createOrUpdateUserRole(
            $user->id,
            $userRegisterInfoDTO->getRoleId(),
            $userRegisterInfoDTO->getRoleStatus()
        );
        if (!$userRoles){
            throw new UserDoseNotHaveActiveRole(trans('user::response.user_dose_not_have_active_role'));
        }
        \auth()->loginUsingId($user->id);
        $userLoginDTO = new UserLoginDTO();
        $userLoginDTO->setNationalCode($userRegisterInfoDTO->getNationalCode())
            ->setRole($userRoles[0])
            ->setToken($user->createToken('ehda')->accessToken)
            ->setName($user->name);
        return $userLoginDTO;
    }
}