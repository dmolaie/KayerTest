<?php


namespace Domains\User\Services;

use App\Http\Controllers\Auth\LoginController;
use Domains\Location\Services\CityServices;
use Domains\Location\Services\Contracts\DTOs\SearchCityDTO;
use Domains\Location\Services\Contracts\DTOs\SearchProvinceDTO;
use Domains\Location\Services\ProvinceService;
use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Role\Entities\Role;
use Domains\Role\Services\RoleServices;
use Domains\User\Entities\User;
use Domains\User\Exceptions\UserDoseNotHaveActiveRole;
use Domains\User\Exceptions\UserUnAuthorizedException;
use Domains\User\Repositories\UserRepository;
use Domains\User\Services\Contracts\DTOs\DTOMakers\UserBriefInfoDTOMaker;
use Domains\User\Services\Contracts\DTOs\DTOMakers\UserFullInfoDTOMaker;
use Domains\User\Services\Contracts\DTOs\UserAdditionalInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserBriefInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserChangeRoleDTO;
use Domains\User\Services\Contracts\DTOs\UserFullInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserLoginDTO;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserSearchDTO;
use Domains\User\Services\Contracts\DTOs\ValidationDataUserDTO;
use Domains\User\src\Services\Contracts\DTOs\UserProfileDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * @var UserFullInfoDTOMaker
     */
    private $userFullInfoDTOMaker;
    /**
     * @var CityServices
     */
    private $cityServices;
    /**
     * @var ProvinceService
     */
    private $provinceService;
    /**
     * @var UserBriefInfoDTOMaker
     */
    private $userBriefInfoDTOMaker;
    /**
     * @var PaginationDTOMaker
     */
    private $paginationDTOMaker;

    /**
     * UserService constructor.
     * @param RoleServices $roleServices
     * @param UserRepository $userRepository
     * @param UserFullInfoDTOMaker $userFullInfoDTOMaker
     * @param CityServices $cityServices
     * @param ProvinceService $provinceService
     * @param UserBriefInfoDTOMaker $userBriefInfoDTOMaker
     * @param PaginationDTOMaker $paginationDTOMaker
     */
    public function __construct(
        RoleServices $roleServices,
        UserRepository $userRepository,
        UserFullInfoDTOMaker $userFullInfoDTOMaker,
        CityServices $cityServices,
        ProvinceService $provinceService,
        UserBriefInfoDTOMaker $userBriefInfoDTOMaker,
        PaginationDTOMaker $paginationDTOMaker
    ) {

        $this->roleServices = $roleServices;
        $this->userRepository = $userRepository;
        $this->userFullInfoDTOMaker = $userFullInfoDTOMaker;
        $this->cityServices = $cityServices;
        $this->provinceService = $provinceService;
        $this->userBriefInfoDTOMaker = $userBriefInfoDTOMaker;
        $this->paginationDTOMaker = $paginationDTOMaker;
    }

    /**
     * @param $request
     * @param UserLoginDTO $loginDTO
     * @return UserLoginDTO
     * @throws UserDoseNotHaveActiveRole
     * @throws UserUnAuthorizedException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function loginWithApi($request, UserLoginDTO $loginDTO): UserLoginDTO
    {
        $loginController = new LoginController();
        $loginController->login($request);

        if (\auth()->check() && \auth()->user()->is_active) {
            $user = \auth()->user();
            $role = $this->getUserImportantActiveOrPendingRole($user);
            $loginDTO->setToken(Auth::user()->createToken('ehda')->accessToken);
            $loginDTO->setRole($role);
            $loginDTO->setId($user->id);
            $loginDTO->setCardId($user->card_id);
            Auth::login($user, true);
            return $loginDTO;
        }
        $loginController->logout($request);
        throw new UserUnAuthorizedException(trans('admin::response.authenticate.error_username_password'));
    }

    /**
     * @param User $user
     * @return Role
     * @throws UserDoseNotHaveActiveRole
     */
    protected function getUserImportantActiveOrPendingRole($user): Role
    {
        $role = $this->userRepository->getActiveAndPendingRoles($user);

        if (!$role) {
            throw new UserDoseNotHaveActiveRole(trans('user::response.user_dose_not_have_active_role'));
        }
        return $role;
    }

    /**
     * @param UserRegisterInfoDTO $userRegisterInfoDTO
     * @return UserLoginDTO
     * @throws UserDoseNotHaveActiveRole
     * @throws UserUnAuthorizedException
     */
    public function register(UserRegisterInfoDTO $userRegisterInfoDTO): UserLoginDTO
    {
        $userRegisterInfoDTO->setRoleId($this->getRoleId($userRegisterInfoDTO));
        $user = $this->userRepository->createOrUpdateUser(
            $userRegisterInfoDTO,
            $this->getUser($userRegisterInfoDTO));
        $role = $this->getUserImportantActiveOrPendingRole($user);
        Auth::login($user, true);
        $userLoginDTO = new UserLoginDTO();
        $userLoginDTO->setNationalCode($userRegisterInfoDTO->getNationalCode())
            ->setRole($role)
            ->setToken($user->createToken('ehda')->accessToken)
            ->setId($user->id)
            ->setCardId($user->card_id)
            ->setName($user->name);
        return $userLoginDTO;

    }

    private function getRoleId(UserRegisterInfoDTO $userRegisterInfoDTO)
    {
        if ($userRegisterInfoDTO->getRoleType() == config('user.legate_role_type')) {
            return $this->roleServices->getRoleWithRoleType(
                $userRegisterInfoDTO->getRoleType(),
                $userRegisterInfoDTO->getCurrentProvinceId())->getId();
        }
        return $this->roleServices->getRoleWithRoleType($userRegisterInfoDTO->getRoleType())->getId();

    }

    private function getUser(UserRegisterInfoDTO $userRegisterInfoDTO)
    {
        $user = $this->userRepository->findByNationalCode($userRegisterInfoDTO->getNationalCode());
        if (!$user || Auth::attempt([
                'national_code' => $userRegisterInfoDTO->getNationalCode(),
                'password'      => $userRegisterInfoDTO->getPassword()
            ])) {
            return $user;
        }
        throw new UserUnAuthorizedException(trans('user::response.authenticate.error_username_password'));

    }

    public function isUserAdmin(int $userId): bool
    {
        return $this->userRepository->isUserAdmin($userId);
    }

    public function getUserFullInfo(int $userId): UserFullInfoDTO
    {
        $user = $this->userRepository->findOrFail($userId);
        $userAdditionalInfo = new UserAdditionalInfoDTO();
        $userAdditionalInfo->setCities($this->getCitiesInfo($user))
            ->setProvinces($this->getProvincesInfo($user));
        $userFullInfoDTO = $this->userFullInfoDTOMaker
            ->convert($user, $userAdditionalInfo);
        return $userFullInfoDTO;
    }

    private function getCitiesInfo(User $user)
    {
        $citySearchDTO = new SearchCityDTO();
        $citySearchDTO = $user->city_of_work ? $citySearchDTO->addCityId($user->city_of_birth) : $citySearchDTO;
        $citySearchDTO = $user->city_of_birth ? $citySearchDTO->addCityId($user->city_of_birth) : $citySearchDTO;
        $citySearchDTO = $user->current_city_id ? $citySearchDTO->addCityId($user->current_city_id) : $citySearchDTO;
        $citySearchDTO = $user->education_city_id ? $citySearchDTO->addCityId($user->education_city_id) : $citySearchDTO;
        $cities = $this->cityServices->searchCities($citySearchDTO);
        return $cities;
    }

    private function getProvincesInfo(User $user)
    {
        $provinceSearchDTO = new SearchProvinceDTO();
        $provinceSearchDTO = $user->province_of_work ? $provinceSearchDTO->addProvinceId($user->province_of_birth) : $provinceSearchDTO;
        $provinceSearchDTO = $user->province_of_birth ? $provinceSearchDTO->addProvinceId($user->province_of_birth) : $provinceSearchDTO;
        $provinceSearchDTO = $user->current_province_id ? $provinceSearchDTO->addProvinceId($user->current_province_id) : $provinceSearchDTO;
        $provinceSearchDTO = $user->education_province_id ? $provinceSearchDTO->addProvinceId($user->education_province_id) : $provinceSearchDTO;
        return $this->provinceService->searchProvinces($provinceSearchDTO);
    }

    public function editUserInfo(int $userId, UserRegisterInfoDTO $userEditDTO)
    {
        $user = $this->userRepository->editUserInfo($userId, $userEditDTO);
        return $this->userBriefInfoDTOMaker->convert($user);
    }

    public function filterUsers(UserSearchDTO $userSearchDTO): PaginationDTOMaker
    {
        $users = $this->userRepository->searchUser($userSearchDTO);
        return $this->paginationDTOMaker->perform(
            $users,
            UserBriefInfoDTOMaker::class
        );
    }

    public function ValidateUserWithRole(ValidationDataUserDTO $validationDataUserDTO)
    {
        $roleId = $this->roleServices->getRoleWithRoleType($validationDataUserDTO->getRoleType())->getId();

        return $this->userRepository->checkUserHasSpecialRole(
            $validationDataUserDTO->getNationalCode(),
            $roleId
        );
    }

    public function getProfileInfo(): UserProfileDTO
    {
        $userProfileDTO = new UserProfileDTO();
        if ($user = Auth::user()) {
            $userProfileDTO->setIsLogin(true)
                ->setUserName($user->name);
            $roles = $this->userRepository->getUserRoles($user);
            foreach ($roles as $role) {
                $userProfileDTO->addRole($role->name);
            }
        }
        return $userProfileDTO;

    }

    public function changePasswordByAdmin(int $userId, string $password)
    {
        $this->userRepository->changePassword($userId, $password);
        return;
    }

    public function registerByAdmin(UserRegisterInfoDTO $createUserRegisterDTO)
    {
        $createUserRegisterDTO->setRoleId($this->getRoleId($createUserRegisterDTO));
        $existUser = $this->userRepository->findByNationalCode($createUserRegisterDTO->getNationalCode());
        if (!$existUser && !$createUserRegisterDTO->getPassword()) {
            $createUserRegisterDTO->setPassword($createUserRegisterDTO->getMobile());
        }
        $user = $this->userRepository->createOrUpdateUser(
            $createUserRegisterDTO,
            $existUser);
        return $this->userBriefInfoDTOMaker->convert($user);
    }

    public function changePassword(int $userId, string $password, string $currentPassword)
    {
        $user = $this->userRepository->findOrFail($userId);
        if (Hash::check($currentPassword, $user->password)) {
            $this->userRepository->changePassword($userId, $password);
            return;
        }
        throw new UserUnAuthorizedException(trans('user::response.authenticate.error_password'));
    }

    public function addNewRoleToUser(int $userId, int $roleId): UserBriefInfoDTO
    {
        $user = $this->userRepository->addNewRoleToUser(
            $userId,
            $roleId,
            config('user.user_role_active_status')
        );
        return $this->userBriefInfoDTOMaker->convert($user);
    }

    public function getUserBaseInfo()
    {
        $user = Auth::user();
        return $this->userBriefInfoDTOMaker->convert($user);
    }

    public function changeUserRoleStatus(UserChangeRoleDTO $userChangeRoleDTO)
    {
        $user = $this->userRepository->addNewRoleToUser(
            $userChangeRoleDTO->getUserId(),
            $userChangeRoleDTO->getRoleId(),
            $userChangeRoleDTO->getRoleStatus()
        );
        return $this->userBriefInfoDTOMaker->convert($user);
    }
}