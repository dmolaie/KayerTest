<?php


namespace Domains\User\Services;

use App\Http\Controllers\Auth\LoginController;
use Domains\Location\Services\CityServices;
use Domains\Location\Services\Contracts\DTOs\SearchCityDTO;
use Domains\Pagination\Services\Contracts\DTOs\DTOMakers\PaginationDTOMaker;
use Domains\Role\Entities\Role;
use Domains\Role\Services\RoleServices;
use Domains\User\Entities\User;
use Domains\User\Exceptions\UserDoseNotHaveActiveRole;
use Domains\User\Exceptions\UserUnAuthorizedException;
use Domains\User\Repositories\UserRepository;
use Domains\User\Services\Contracts\DTOs\DTOMakers\UserBriefInfoDTOMaker;
use Domains\User\Services\Contracts\DTOs\DTOMakers\UserFullInfoDTOMaker;
use Domains\User\Services\Contracts\DTOs\DTOMakers\UserInfoReportDTOMaker;
use Domains\User\Services\Contracts\DTOs\DTOMakers\UserRoleInfoDTOMaker;
use Domains\User\Services\Contracts\DTOs\UserAdditionalInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserBriefInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserChangeRoleDTO;
use Domains\User\Services\Contracts\DTOs\UserFullInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserLoginDTO;
use Domains\User\Services\Contracts\DTOs\UserProfileDTO;
use Domains\User\Services\Contracts\DTOs\UserRegisterInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserSearchDTO;
use Domains\User\Services\Contracts\DTOs\UsersRegisterReportDTO;
use Domains\User\Services\Contracts\DTOs\ValidationDataUserDTO;
use Illuminate\Pagination\LengthAwarePaginator;
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
     * @var UserBriefInfoDTOMaker
     */
    private $userBriefInfoDTOMaker;
    /**
     * @var PaginationDTOMaker
     */
    private $paginationDTOMaker;
    /**
     * @var UserRoleInfoDTOMaker
     */
    private $userRoleInfoDTOMaker;

    /**
     * UserService constructor.
     * @param RoleServices $roleServices
     * @param UserRepository $userRepository
     * @param UserFullInfoDTOMaker $userFullInfoDTOMaker
     * @param CityServices $cityServices
     * @param UserBriefInfoDTOMaker $userBriefInfoDTOMaker
     * @param PaginationDTOMaker $paginationDTOMaker
     * @param UserRoleInfoDTOMaker $userRoleInfoDTOMaker
     */
    public function __construct(
        RoleServices $roleServices,
        UserRepository $userRepository,
        UserFullInfoDTOMaker $userFullInfoDTOMaker,
        CityServices $cityServices,
        UserBriefInfoDTOMaker $userBriefInfoDTOMaker,
        PaginationDTOMaker $paginationDTOMaker,
        UserRoleInfoDTOMaker $userRoleInfoDTOMaker
    )
    {

        $this->roleServices = $roleServices;
        $this->userRepository = $userRepository;
        $this->userFullInfoDTOMaker = $userFullInfoDTOMaker;
        $this->cityServices = $cityServices;
        $this->userBriefInfoDTOMaker = $userBriefInfoDTOMaker;
        $this->paginationDTOMaker = $paginationDTOMaker;
        $this->userRoleInfoDTOMaker = $userRoleInfoDTOMaker;
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
        $status = [
            config('user.user_role_active_status'),
            config('user.user_role_pending_status'),
            config('user.user_role_wait_for_documents'),
            config('user.user_role_wait_for_exam'),
        ];
        $role = $this->userRepository->getUserRolesByStatus($user, $status)->first();

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
            ->setGender($user->gender)
            ->setLastName($user->last_name)
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
                'password' => $userRegisterInfoDTO->getPassword()
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
        $userAdditionalInfo->setCities($this->getCitiesInfo($user));
        $userFullInfoDTO = $this->userFullInfoDTOMaker
            ->convert($user, $userAdditionalInfo);
        return $userFullInfoDTO;
    }

    private function getCitiesInfo(User $user)
    {
        $citySearchDTO = new SearchCityDTO();
        $citySearchDTO = $user->city_of_work ? $citySearchDTO->addCityId($user->city_of_work) : $citySearchDTO;
        $citySearchDTO = $user->city_of_birth ? $citySearchDTO->addCityId($user->city_of_birth) : $citySearchDTO;
        $citySearchDTO = $user->current_city_id ? $citySearchDTO->addCityId($user->current_city_id) : $citySearchDTO;
        $citySearchDTO = $user->education_city_id ? $citySearchDTO->addCityId($user->education_city_id) : $citySearchDTO;
        $cities = $this->cityServices->searchCities($citySearchDTO);
        return $cities;
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
        $roleInfo = $this->roleServices->getRoleWithId($roleId);
        $user = $this->userRepository->addNewRoleToUser(
            $userId,
            $roleInfo,
            config('user.user_role_active_status')
        );
        return $this->userBriefInfoDTOMaker->convert($user);
    }

    public function getUserBaseInfo()
    {
        $user = Auth::user();
        return $this->userBriefInfoDTOMaker->convert($user);
    }

    public function getUserBaseInfoWithUuid($uuid)
    {
        return $this->userRepository->findByUuid($uuid);
    }

    public function changeUserRoleStatus(UserChangeRoleDTO $userChangeRoleDTO)
    {
        $roleInfo = $this->roleServices->getRoleWithId($userChangeRoleDTO->getRoleId());
        $user = $this->userRepository->addNewRoleToUser(
            $userChangeRoleDTO->getUserId(),
            $roleInfo,
            $userChangeRoleDTO->getRoleStatus()
        );
        return $this->userBriefInfoDTOMaker->convert($user);
    }

    public function getUserAllRoles(int $id)
    {
        $user = $this->userRepository->findOrFail($id);
        return $this->userRoleInfoDTOMaker->convertMany($user->roles);
    }

    public function getUserImportantActiveRoleInfo(int $userId)
    {
        $user = $this->userRepository->findOrFail($userId);

        $status = [
            config('user.user_role_active_status'),
        ];
        $role = $this->userRepository->getUserRolesByStatus($user, $status)->first();
        return $role ? $this->userRoleInfoDTOMaker->convert($role) : null;
    }

    public function userReport(UsersRegisterReportDTO $usersRegisterReportDTO)
    {
        $usersClient = [];
        $usersLegate = [];

        if ($usersRegisterReportDTO->isTypeClient() ) {
            $usersClient = $this->userRepository->getUserReport(config('user.client_role_type'), $usersRegisterReportDTO->getSort(), $usersRegisterReportDTO->getStatusClient(), $usersRegisterReportDTO->getRegisterFromClient(), $usersRegisterReportDTO->getRegisterEndClient(), $usersRegisterReportDTO->getPaginate());
        }

        if ($usersRegisterReportDTO->isTypeLegate()) {
            $usersLegate = $this->userRepository->getUserReport(config('user.legate_role_type'), $usersRegisterReportDTO->getSort(), $usersRegisterReportDTO->getStatusLegate(), $usersRegisterReportDTO->getRegisterFromLegate(), $usersRegisterReportDTO->getRegisterEndLegate(), $usersRegisterReportDTO->getPaginate());
        }

        if (!empty($usersClient) && !empty($usersLegate)) {
            $users = $usersClient->union($usersLegate)->paginate(10);
        } elseif (!empty($usersLegate)) {
            $users = $usersLegate->groupBy('id')->paginate(10);
        } elseif (!empty($usersClient)) {
            $users = $usersClient->groupBy('id')->paginate(10);
        }
        $users = new LengthAwarePaginator($users->forPage(1, $usersRegisterReportDTO->getPaginate()), $users->Total(), $usersRegisterReportDTO->getPaginate(), 1, ['lastPage' => $users->lastPage(), 'path' => $users->path()]);
        return $this->paginationDTOMaker->perform(
            $users,
            UserInfoReportDTOMaker::class
        );
    }


    public function allUserReport(UsersRegisterReportDTO $usersRegisterReportDTO)
    {
        $usersClient = [];
        $usersLegate = [];

        if ($usersRegisterReportDTO->isTypeClient() ) {
            $usersClient = $this->userRepository->getUserReport(config('user.client_role_type'), $usersRegisterReportDTO->getSort(), $usersRegisterReportDTO->getStatusClient(), $usersRegisterReportDTO->getRegisterFromClient(), $usersRegisterReportDTO->getRegisterEndClient(), $usersRegisterReportDTO->getPaginate());
        }

        if ($usersRegisterReportDTO->isTypeLegate()) {
            $usersLegate = $this->userRepository->getUserReport(config('user.legate_role_type'), $usersRegisterReportDTO->getSort(), $usersRegisterReportDTO->getStatusLegate(), $usersRegisterReportDTO->getRegisterFromLegate(), $usersRegisterReportDTO->getRegisterEndLegate(), $usersRegisterReportDTO->getPaginate());
        }

        if (!empty($usersClient) && !empty($usersLegate)) {
            $users = $usersClient->union($usersLegate);
        } elseif (!empty($usersLegate)) {
            $users = $usersLegate;
        } elseif (!empty($usersClient)) {
            $users = $usersClient;
        }

        $userInfoReportDTO = new UserInfoReportDTOMaker();
        $users = $users->orderBy('created_at', $usersRegisterReportDTO->getSort())
            ->groupBy('id')->get();

        return $userInfoReportDTO->convertMany($users);

    }

    public function getProvinceIds(int $userId)
    {
        $user = $this->userRepository->findOrFail($userId);

        $status = [
            config('user.user_role_active_status'),
        ];
        $roles = $this->userRepository->getUserRolesByStatus($user, $status);
        $provinceIds = [];
        foreach ($roles as $role) {
            $provinceIds[] = $role->province_id;
        }
        return in_array(null, $provinceIds, true) ? [] : array_unique($provinceIds);
    }
}

