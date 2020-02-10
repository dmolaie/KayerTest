<?php


namespace Domains\User\Services;


use Domains\Admin\Services\Contracts\LoginDTOs\LoginDTO;
use Domains\Role\Services\RoleServices;
use Domains\User\Exceptions\UserUnAuthorizedException;
use Illuminate\Support\Facades\Auth;

class UserService
{
    /**
     * @var RoleServices
     */
    protected $roleServices;

    public function __construct(RoleServices $roleServices)
    {

        $this->roleServices = $roleServices;
    }

    /**
     * @param LoginDTO $loginDTO
     * @return LoginDTO
     * @throws \Exception
     */
    public function loginWithApi(LoginDTO $loginDTO): LoginDTO
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