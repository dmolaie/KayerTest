<?php


namespace Domains\User\Services;

use Domains\Location\Services\CityServices;
use Domains\Location\Services\Contracts\DTOs\SearchCityDTO;
use Domains\Location\Services\Contracts\DTOs\SearchProvinceDTO;
use Domains\Location\Services\ProvinceService;
use Domains\Role\Entities\Role;
use Domains\Role\Services\RoleServices;
use Domains\User\Entities\User;
use Domains\User\Exceptions\UserDoseNotHaveActiveRole;
use Domains\User\Exceptions\UserUnAuthorizedException;
use Domains\User\Repositories\UserRepository;
use Domains\User\Services\Contracts\DTOs\DTOMakers\UserFullInfoDTOMaker;
use Domains\User\Services\Contracts\DTOs\UserAdditionalInfoDTO;
use Domains\User\Services\Contracts\DTOs\UserFullInfoDTO;
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
     * UserService constructor.
     * @param RoleServices $roleServices
     * @param UserRepository $userRepository
     * @param UserFullInfoDTOMaker $userFullInfoDTOMaker
     * @param CityServices $cityServices
     * @param ProvinceService $provinceService
     */
    public function __construct(
        RoleServices $roleServices,
        UserRepository $userRepository,
        UserFullInfoDTOMaker $userFullInfoDTOMaker,
        CityServices $cityServices,
        ProvinceService $provinceService
    ) {

        $this->roleServices = $roleServices;
        $this->userRepository = $userRepository;
        $this->userFullInfoDTOMaker = $userFullInfoDTOMaker;
        $this->cityServices = $cityServices;
        $this->provinceService = $provinceService;
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
        $cities = $this->cityServices->searchCities($citySearchDTO);
        return $cities;
    }

    private function getProvincesInfo(User $user)
    {
        $provinceSearchDTO = new SearchProvinceDTO();
        $provinceSearchDTO = $user->province_of_work ? $provinceSearchDTO->addProvinceId($user->province_of_birth) : $provinceSearchDTO;
        $provinceSearchDTO = $user->province_of_birth ? $provinceSearchDTO->addProvinceId($user->province_of_birth) : $provinceSearchDTO;
        $provinceSearchDTO = $user->current_province_id ? $provinceSearchDTO->addProvinceId($user->current_province_id) : $provinceSearchDTO;
        return $this->provinceService->searchProvinces($provinceSearchDTO);
    }
}