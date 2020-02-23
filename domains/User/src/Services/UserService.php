<?php


namespace Domains\User\Services;

use Domains\Role\Entities\Role;
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
     * UserService constructor.
     * @param RoleServices $roleServices
     * @param UserRepository $userRepository
     */
    public function __construct(
        RoleServices $roleServices,
        UserRepository $userRepository
    ) {

        $this->roleServices = $roleServices;
        $this->userRepository = $userRepository;
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
            $role = $this->getUserImportantActiveRole($user->id);

            $loginDTO->setToken(Auth::user()->createToken('ehda')->accessToken);
            $loginDTO->setRole($role);
            $loginDTO->setId($user->id);
            return $loginDTO;
        }
        throw new UserUnAuthorizedException(trans('admin::response.authenticate.error_username_password'));
    }

    /**
     * @param int $userId
     * @return Role
     * @throws UserDoseNotHaveActiveRole
     */
    protected function getUserImportantActiveRole(int $userId): Role
    {
        $role = $this->userRepository->getActiveRoles($userId);
        if (!$role) {
            throw new UserDoseNotHaveActiveRole(trans('user::response.user_dose_not_have_active_role'));
        }
        return $role;
    }

    /**
     * @param UserRegisterInfoDTO $userRegisterInfoDTO
     * @return UserLoginDTO
     * @throws UserDoseNotHaveActiveRole
     */
    public function register(UserRegisterInfoDTO $userRegisterInfoDTO): UserLoginDTO
    {
        $user = $this->userRepository->createNewUser($userRegisterInfoDTO);
        $role = $this->getUserImportantActiveRole($user->id);
        \auth()->loginUsingId($user->id);
        $userLoginDTO = new UserLoginDTO();
        $userLoginDTO->setNationalCode($userRegisterInfoDTO->getNationalCode())
            ->setRole($role)
            ->setToken($user->createToken('ehda')->accessToken)
            ->setId($user->id)
            ->setName($user->name);
        return $userLoginDTO;

    }

    public function isUserAdmin(int $userId): bool
    {
        return $this->userRepository->isUserAdmin($userId);
    }
}